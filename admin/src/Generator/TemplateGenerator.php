<?php
namespace Pontomega\Component\ExtensionsCreator\Administrator\Generator;

defined('_JEXEC') or die;

class TemplateGenerator extends BaseGenerator
{
    public function generate()
    {
        $element = $this->registry->get('element'); // tpl_example
        if (strpos($element, 'tpl_') !== 0) {
            $element = 'tpl_' . $element;
            $this->registry->set('element', $element);
        }
        $client = $this->registry->get('client', 'site'); // site or admin
        $name   = substr($element, 4);                    // example

        $replacements = [
            'element'      => $element,
            'name'         => ucfirst($name),
            'upperName'    => strtoupper($name),
            'client'       => $client,
            'version'      => $this->registry->get('version', '1.0.0'),
            'description'  => $this->registry->get('description', ''),
            'author'       => $this->registry->get('author', 'Pontomega'),
            'creationDate' => date('Y-m-d'),
            'copyright'    => $this->registry->get('copyright', '(C) ' . date('Y') . ' Pontomega. All rights reserved.'),
            'license'      => $this->registry->get('license', 'GNU General Public License version 2 or later; see LICENSE.txt'),
            'authorEmail'  => $this->registry->get('authorEmail', 'admin@pontomega.com.br'),
            'authorUrl'    => $this->registry->get('authorUrl', 'www.pontomega.com.br'),
        ];

        // Base Path
        $basePath = JPATH_COMPONENT_ADMINISTRATOR . '/output/' . $element;
        if (! defined('JPATH_COMPONENT_ADMINISTRATOR')) {
            $basePath = __DIR__ . '/../../output/' . $element;
        }

        // Generate Manifest
        $manifestContent = $this->getTemplate('template/templateDetails.xml');
        $manifestContent = $this->replaceTags($manifestContent, $replacements);
        $this->createFile($basePath . '/templateDetails.xml', $manifestContent);

        // Generate Index File
        $indexContent = $this->getTemplate('template/index.php');
        $indexContent = $this->replaceTags($indexContent, $replacements);
        $this->createFile($basePath . '/index.php', $indexContent);

        // Create folders
        $this->createFile($basePath . '/css/template.css', '/* CSS for ' . $element . ' */');
        $this->createFile($basePath . '/js/template.js', '// JS for ' . $element);
        $this->createFile($basePath . '/images/index.html', '');

        return true;
    }
}
