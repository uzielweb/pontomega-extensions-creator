<?php
namespace Pontomega\Component\ExtensionsCreator\Administrator\Generator;

use Joomla\String\StringHelper;

defined('_JEXEC') or die;

class ComponentGenerator extends BaseGenerator
{
    public function generate()
    {
        $element       = $this->registry->get('element');             // com_example
        $name          = substr($element, 4);                         // example
        $vendor        = $this->registry->get('vendor', 'Pontomega'); // Default to Pontomega
        $namespace     = $vendor . '\\Component\\' . ucfirst($name);  // MyCompany\Component\Example
        $componentName = ucfirst($name);

        $replacements = [
            'element'          => $element,
            'name'             => ucfirst($name),
            'namespace'        => $namespace,
            'slashedNamespace' => '\\' . $namespace, // For strings that need double backslashes in PHP code
            'componentName'    => $componentName,
            'version'          => $this->registry->get('version', '1.0.0'),
            'description'      => $this->registry->get('description', ''),
            'author'           => $this->registry->get('author', 'Pontomega'),
            'creationDate'     => date('Y-m-d'),
            'copyright'        => $this->registry->get('copyright', '(C) ' . date('Y') . ' Pontomega. All rights reserved.'),
            'license'          => $this->registry->get('license', 'GNU General Public License version 2 or later; see LICENSE.txt'),
            'authorEmail'      => $this->registry->get('authorEmail', 'admin@pontomega.com.br'),
            'authorUrl'        => $this->registry->get('authorUrl', 'www.pontomega.com.br'),
        ];

        // Base Path for the new component
        // For now, generating in a 'output' folder in the component root
        $basePath = JPATH_COMPONENT_ADMINISTRATOR . '/output/' . $element;
        if (! defined('JPATH_COMPONENT_ADMINISTRATOR')) {
            $basePath = __DIR__ . '/../../output/' . $element;
        }

        // Generate Manifest
        $manifestContent = $this->getTemplate('component/manifest.xml');
        $manifestContent = $this->replaceTags($manifestContent, $replacements);
        $this->createFile($basePath . '/' . $name . '.xml', $manifestContent);

        // Generate Admin Service Provider
        $providerContent = $this->getTemplate('component/provider.php');
        $providerContent = $this->replaceTags($providerContent, $replacements);
        $this->createFile($basePath . '/admin/services/provider.php', $providerContent);

                                                                   // Generate Site Structure (Required for installation)
        $this->createFile($basePath . '/site/src/index.html', ''); // Empty file to ensure folder creation
        $this->createFile($basePath . '/site/tmpl/index.html', '');

                                                                  // Generate Views
        $views      = $this->registry->get('views', 'dashboard'); // Default to dashboard if empty, comma separated
        $viewsArray = explode(',', $views);

        foreach ($viewsArray as $view) {
            $view = trim($view);
            if (empty($view)) {
                continue;
            }

            $viewName         = ucfirst($view);
            $viewReplacements = array_merge($replacements, ['viewName' => $viewName]);

            // View Class
            $viewContent = $this->getTemplate('component/view.php');
            $viewContent = $this->replaceTags($viewContent, $viewReplacements);
            $this->createFile($basePath . '/admin/src/View/' . $viewName . '/HtmlView.php', $viewContent);

            // Layout File
            $layoutContent = $this->getTemplate('component/default.php');
            $layoutContent = $this->replaceTags($layoutContent, $viewReplacements);
            $this->createFile($basePath . '/admin/tmpl/' . strtolower($view) . '/default.php', $layoutContent);
        }

                                                           // Generate Tables
        $tables      = $this->registry->get('tables', ''); // Comma separated list of table names (e.g., items, categories)
        $tablesArray = explode(',', $tables);

        foreach ($tablesArray as $table) {
            $table = trim($table);
            if (empty($table)) {
                continue;
            }

            $tableName         = ucfirst($table);
            $tableReplacements = array_merge($replacements, ['tableName' => $tableName]);

            $tableContent = $this->getTemplate('component/table.php');
            $tableContent = $this->replaceTags($tableContent, $tableReplacements);
            $this->createFile($basePath . '/admin/src/Table/' . $tableName . 'Table.php', $tableContent);

            // Also add SQL file for installation?
            // For now, let's just scaffold the Table class. SQL generation is complex.
        }

        return true;
    }

    protected function getTemplate($name)
    {
        $path = JPATH_COMPONENT_ADMINISTRATOR . '/tmpl/generator/' . $name;

        if (! defined('JPATH_COMPONENT_ADMINISTRATOR')) {
            $path = __DIR__ . '/../../tmpl/generator/' . $name;
        }

        if (file_exists($path)) {
            return file_get_contents($path);
        }

        return '';
    }
}