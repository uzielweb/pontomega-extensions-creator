<?php

defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;

/** @var Joomla\Registry\Registry $params */

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');

require ModuleHelper::getLayoutPath('{{element}}', $params->get('layout', 'default'));
