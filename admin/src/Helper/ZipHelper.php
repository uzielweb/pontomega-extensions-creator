<?php
namespace Pontomega\Component\ExtensionsCreator\Administrator\Helper;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ZipArchive;

defined('_JEXEC') or die;

class ZipHelper
{
    public static function createZip($source, $destination)
    {
        if (! extension_loaded('zip') || ! file_exists($source)) {
            return false;
        }

        $zip = new ZipArchive();
        if (! $zip->open($destination, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
            return false;
        }

        $source = str_replace('\\', '/', realpath($source));

        if (is_dir($source) === true) {
            $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);

            foreach ($files as $file) {
                $file = str_replace('\\', '/', $file);

                // Ignore "." and ".." folders
                if (in_array(substr($file, strrpos($file, '/') + 1), ['.', '..'])) {
                    continue;
                }

                $realFile = realpath($file);
                $realFile = str_replace('\\', '/', $realFile);

                if (is_dir($realFile) === true) {
                    $zip->addEmptyDir(str_replace($source . '/', '', $realFile . '/'));
                } else if (is_file($realFile) === true) {
                    $zip->addFile($realFile, str_replace($source . '/', '', $realFile));
                }
            }
        } else if (is_file($source) === true) {
            $zip->addFile($source, basename($source));
        }

        return $zip->close();
    }
}
