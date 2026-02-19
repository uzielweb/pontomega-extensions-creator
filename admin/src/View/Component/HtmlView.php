<?php
namespace Pontomega\Component\ExtensionsCreator\Administrator\View\Component;

use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use Joomla\CMS\Toolbar\ToolbarHelper;

defined('_JEXEC') or die;

class HtmlView extends BaseHtmlView
{
    protected $form;

    public function display($tpl = null)
    {
        // Load form (we'll implement loadForm logic or just use direct HTML for now, but Form is better)
        // For simplicity/speed in this MVP, we might hardcode the HTML form in the layout or create an XML form.
        // Let's assume we use XML forms for standard Joomla feel.
        //$this->form = $this->get('Form');
        // Actually, let's just pass data to view.

        $this->addToolbar();

        return parent::display($tpl);
    }

    protected function addToolbar()
    {
        ToolbarHelper::title('Create Component', 'bricks');
        ToolbarHelper::save('generator.generate', 'Generate');
        ToolbarHelper::cancel('display.display', 'Cancel');
    }
}
