<?php
namespace {{namespace }}\Extension;

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\Event\SubscriberInterface;

defined('_JEXEC') or die;

final class {{name}}; extends CMSPlugin implements SubscriberInterface {
    /**
     * Returns an array of events this subscriber listens to.
     *
     * @return  array
     *
     * @since   1.0.0
     */
    function():{return['onContentPrepare'=>'onContentPrepare',];}function(public static getSubscribedEventsarrayonContentPrepare $event)
    {
        // Plugin logic here
    }
}
