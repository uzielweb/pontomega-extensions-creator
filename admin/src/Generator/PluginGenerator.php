<?php
namespace Pontomega\Component\ExtensionsCreator\Administrator\Generator;

defined('_JEXEC') or die;

class PluginGenerator extends BaseGenerator
{
    public function generate()
    {
        $element = $this->registry->get('element');                 // plg_system_example
        $group   = $this->registry->get('group', 'system');         // system, content, etc
        $name    = substr($element, strlen('plg_' . $group . '_')); // example

        // If input was just 'example' and group 'system', construct element
        if (strpos($element, 'plg_') !== 0) {
            $name    = $element;
            $element = 'plg_' . $group . '_' . $name;
        }

        $vendor = $this->registry->get('vendor', 'Pontomega');

        $replacements = [
            'element'      => $element,
            'name'         => ucfirst($name),
            'lowerName'    => strtolower($name),
            'group'        => $group,
            'version'      => $this->registry->get('version', '1.0.0'),
            'description'  => $this->registry->get('description', ''),
            'author'       => $this->registry->get('author', 'Pontomega'),
            'creationDate' => date('Y-m-d'),
            'copyright'    => $this->registry->get('copyright', '(C) ' . date('Y') . ' Pontomega. All rights reserved.'),
            'license'      => $this->registry->get('license', 'GNU General Public License version 2 or later; see LICENSE.txt'),
            'authorEmail'  => $this->registry->get('authorEmail', 'admin@pontomega.com.br'),
            'authorUrl'    => $this->registry->get('authorUrl', 'www.pontomega.com.br'),
            // Namespace: Vendor\Plugin\System\Example
            'namespace'    => $vendor . '\\Plugin\\' . ucfirst($group) . '\\' . ucfirst($name),
        ];

        // Base Path
        $basePath = JPATH_COMPONENT_ADMINISTRATOR . '/output/' . $element;
        if (! defined('JPATH_COMPONENT_ADMINISTRATOR')) {
            $basePath = __DIR__ . '/../../output/' . $element;
        }

        // Generate Manifest
        $manifestContent = $this->getTemplate('plugin/manifest.xml');
        $manifestContent = $this->replaceTags($manifestContent, $replacements);
        $this->createFile($basePath . '/' . $element . '.xml', $manifestContent);

        // Generate Main PHP File
        $mainContent = $this->getTemplate('plugin/plugin.php');
        $mainContent = $this->replaceTags($mainContent, $replacements);
        $this->createFile($basePath . '/' . strtolower($name) . '.php', $mainContent);

        // Generate Service Provider
        $providerContent = $this->getTemplate('plugin/provider.php');
        $providerContent = $this->replaceTags($providerContent, $replacements);
        $this->createFile($basePath . '/services/provider.php', $providerContent);

        return true;
    }
}
