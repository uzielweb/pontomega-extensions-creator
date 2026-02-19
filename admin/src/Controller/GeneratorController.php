<?php
namespace Pontomega\Component\ExtensionsCreator\Administrator\Controller;

use Joomla\CMS\MVC\Controller\BaseController;
use Joomla\Registry\Registry;
use Pontomega\Component\ExtensionsCreator\Administrator\Generator\ComponentGenerator;
use Pontomega\Component\ExtensionsCreator\Administrator\Generator\ModuleGenerator;
use Pontomega\Component\ExtensionsCreator\Administrator\Generator\PluginGenerator;
use Pontomega\Component\ExtensionsCreator\Administrator\Generator\TemplateGenerator;
use Pontomega\Component\ExtensionsCreator\Administrator\Helper\ZipHelper;

defined('_JEXEC') or die;

class GeneratorController extends BaseController
{
    public function generate()
    {
        // Check token
        $this->checkToken();

        $app   = $this->getApplication();
        $input = $app->getInput();
        $data  = $input->get('jform', [], 'array');
        $type  = $input->get('type', 'component');

        $registry = new Registry($data);
        $element  = '';

        try {
            switch ($type) {
                case 'component':
                    $generator = new ComponentGenerator($registry);
                    $generator->generate();
                    $element = $registry->get('element');
                    break;
                case 'module':
                    $generator = new ModuleGenerator($registry);
                    $generator->generate();
                    $element = $registry->get('element');
                    break;
                case 'plugin':
                    $generator = new PluginGenerator($registry);
                    $generator->generate();
                    $element = $registry->get('element');
                    break;
                case 'template':
                    $generator = new TemplateGenerator($registry);
                    $generator->generate();
                    $element = $registry->get('element');
                    break;
                default:
                    throw new \Exception('Invalid type');
            }

            // Base path where generation happens
            if (defined('JPATH_COMPONENT_ADMINISTRATOR')) {
                $basePath = JPATH_COMPONENT_ADMINISTRATOR . '/output/' . $element;
                $zipPath  = JPATH_COMPONENT_ADMINISTRATOR . '/output/' . $element . '.zip';
            } else {
                // Fallback for CLI/Testing (though Controller won't run in CLI usually)
                $basePath = __DIR__ . '/../../output/' . $element;
                $zipPath  = __DIR__ . '/../../output/' . $element . '.zip';
            }

            // Create Zip
            if (ZipHelper::createZip($basePath, $zipPath)) {
                // Download the file
                if (file_exists($zipPath)) {
                    // Clean buffer to avoid corrupt zip
                    if (ob_get_level()) {
                        ob_end_clean();
                    }

                    header('Content-Description: File Transfer');
                    header('Content-Type: application/zip');
                    header('Content-Disposition: attachment; filename="' . basename($zipPath) . '"');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($zipPath));
                    readfile($zipPath);

                    // Cleanup zip file
                    unlink($zipPath);

                    // We should probably keep the generated folder or delete it?
                    // For now, keep it for debugging or future reference.

                    exit;
                }
            }

            $message = 'Error creating zip file for element: ' . $element;
            $this->setRedirect('index.php?option=com_extensionscreator&view=' . $type, $message, 'error');

        } catch (\Exception $e) {
            $this->setRedirect('index.php?option=com_extensionscreator&view=' . $type, $e->getMessage(), 'error');
        }
    }
}
