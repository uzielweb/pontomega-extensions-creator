<?php
namespace Pontomega\Component\ExtensionsCreator\Administrator\Generator;

use Joomla\Filesystem\File;
use Joomla\Filesystem\Folder;
use Joomla\Registry\Registry;

defined('_JEXEC') or die;

abstract class BaseGenerator
{
    protected $registry;

    public function __construct(Registry $registry)
    {
        $this->registry = $registry;
    }

    abstract public function generate();

    protected function createFile($path, $content)
    {
        if (! Folder::exists(dirname($path))) {
            Folder::create(dirname($path));
        }

        return File::write($path, $content);
    }

    protected function getTemplate($name)
    {
        // Logic to load template files
        $path = JPATH_COMPONENT_ADMINISTRATOR . '/tmpl/generator/' . $name;

        if (! defined('JPATH_COMPONENT_ADMINISTRATOR')) {
            $path = __DIR__ . '/../../tmpl/generator/' . $name;
        }

        if (File::exists($path)) {
            return file_get_contents($path);
        }

        return '';
    }

    protected function replaceTags($content, $tags)
    {
        foreach ($tags as $key => $value) {
            $content = str_replace('{{' . $key . '}}', $value, $content);
        }

        return $content;
    }
}
