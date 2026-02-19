<?php

defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;

/** @var Joomla\Registry\Registry $params */

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');

// Example of content preparation (if you have content to parse)
if ($params->get('prepare_content', 0)) {
    // $content = \Joomla\CMS\HTML\HTMLHelper::_('content.prepare', $content);
}

require ModuleHelper::getLayoutPath('{{element}}', $params->get('layout', 'default'));
