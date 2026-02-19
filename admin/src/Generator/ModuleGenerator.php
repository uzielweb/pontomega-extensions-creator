<?php
namespace Pontomega\Component\ExtensionsCreator\Administrator\Generator;

defined('_JEXEC') or die;

class ModuleGenerator extends BaseGenerator
{
    public function generate()
    {
        $element = $this->registry->get('element');        // mod_example
        $name    = substr($element, 4);                    // example
        $client  = $this->registry->get('client', 'site'); // site or admin
        $vendor  = $this->registry->get('vendor', 'Pontomega');

        $replacements = [
            'element'      => $element,
            'name'         => ucfirst($name),
            'lowerName'    => strtolower($name),
            'version'      => $this->registry->get('version', '1.0.0'),
            'description'  => $this->registry->get('description', ''),
            'author'       => $this->registry->get('author', 'Pontomega'),
            'creationDate' => date('Y-m-d'),
            'copyright'    => $this->registry->get('copyright', '(C) ' . date('Y') . ' Pontomega. All rights reserved.'),
            'license'      => $this->registry->get('license', 'GNU General Public License version 2 or later; see LICENSE.txt'),
            'authorEmail'  => $this->registry->get('authorEmail', 'admin@pontomega.com.br'),
            'authorUrl'    => $this->registry->get('authorUrl', 'www.pontomega.com.br'),
            'client'       => $client,
            // For namespace we might want Vendor\Module\Example\Site or Administrator
            'namespace'    => $vendor . '\\Module\\' . ucfirst($name) . '\\' . ucfirst($client),
        ];

        // Base Path
        $basePath = JPATH_COMPONENT_ADMINISTRATOR . '/output/' . $element;
        if (! defined('JPATH_COMPONENT_ADMINISTRATOR')) {
            $basePath = __DIR__ . '/../../output/' . $element;
        }

        // Generate Manifest
        $manifestContent = $this->getTemplate('module/manifest.xml');
        $manifestContent = $this->replaceTags($manifestContent, $replacements);
        $this->createFile($basePath . '/' . $element . '.xml', $manifestContent);

        // Generate Main PHP File
        $mainContent = $this->getTemplate('module/module.php');
        $mainContent = $this->replaceTags($mainContent, $replacements);
        $this->createFile($basePath . '/' . $element . '.php', $mainContent);

        // Generate Service Provider
        $providerContent = $this->getTemplate('module/provider.php');
        $providerContent = $this->replaceTags($providerContent, $replacements);
        $this->createFile($basePath . '/services/provider.php', $providerContent);

        // Generate Default Layout
        $layoutContent = $this->getTemplate('module/default.php');
        $this->createFile($basePath . '/tmpl/default.php', $layoutContent);

        // Ensure src folder exists
        $this->createFile($basePath . '/src/index.html', '');

        return true;
    }
}
