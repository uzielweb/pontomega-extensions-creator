<?php
namespace Pontomega\Component\ExtensionsCreator\Site\Controller;

use Joomla\CMS\MVC\Controller\BaseController;

defined('_JEXEC') or die;

class DisplayController extends BaseController
{
    protected $default_view = 'extensionscreator';

    public function display($cachable = false, $urlparams = [])
    {
        return parent::display($cachable, $urlparams);
    }
}
