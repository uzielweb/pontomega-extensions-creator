<?php
namespace Pontomega\Component\ExtensionsCreator\Administrator\View\Template;

use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use Joomla\CMS\Toolbar\ToolbarHelper;

defined('_JEXEC') or die;

class HtmlView extends BaseHtmlView
{
    public function display($tpl = null)
    {
        $this->addToolbar();
        return parent::display($tpl);
    }

    protected function addToolbar()
    {
        ToolbarHelper::title('Create Template', 'bricks');
        ToolbarHelper::save('generator.generate', 'Generate');
        ToolbarHelper::cancel('display.display', 'Cancel');
    }
}
