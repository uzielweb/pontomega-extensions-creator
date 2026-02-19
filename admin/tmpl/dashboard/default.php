<?php

    defined('_JEXEC') or die;

    use Joomla\CMS\Language\Text;
    use Joomla\CMS\Router\Route;

?>
<div class="row">
	<div class="col-md-12">
		<h1><?php echo Text::_('COM_EXTENSIONSCREATOR'); ?></h1>
		<p class="lead"><?php echo Text::_('COM_EXTENSIONSCREATOR_XML_DESCRIPTION'); ?></p>

		<div class="card-columns">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title"><?php echo Text::_('COM_EXTENSIONSCREATOR_CREATE_COMPONENT'); ?></h5>
					<p class="card-text"><?php echo Text::_('COM_EXTENSIONSCREATOR_CREATE_COMPONENT_DESC'); ?></p>
					<a href="index.php?option=com_extensionscreator&view=component" class="btn btn-primary"><?php echo Text::_('COM_EXTENSIONSCREATOR_CREATE_COMPONENT'); ?></a>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<h5 class="card-title"><?php echo Text::_('COM_EXTENSIONSCREATOR_CREATE_MODULE'); ?></h5>
					<p class="card-text"><?php echo Text::_('COM_EXTENSIONSCREATOR_CREATE_MODULE_DESC'); ?></p>
					<a href="index.php?option=com_extensionscreator&view=module" class="btn btn-primary"><?php echo Text::_('COM_EXTENSIONSCREATOR_CREATE_MODULE'); ?></a>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<h5 class="card-title"><?php echo Text::_('COM_EXTENSIONSCREATOR_CREATE_PLUGIN'); ?></h5>
					<p class="card-text"><?php echo Text::_('COM_EXTENSIONSCREATOR_CREATE_PLUGIN_DESC'); ?></p>
					<a href="index.php?option=com_extensionscreator&view=plugin" class="btn btn-primary"><?php echo Text::_('COM_EXTENSIONSCREATOR_CREATE_PLUGIN'); ?></a>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<h5 class="card-title"><?php echo Text::_('COM_EXTENSIONSCREATOR_CREATE_TEMPLATE'); ?></h5>
					<p class="card-text"><?php echo Text::_('COM_EXTENSIONSCREATOR_CREATE_TEMPLATE_DESC'); ?></p>
					<a href="index.php?option=com_extensionscreator&view=template" class="btn btn-primary"><?php echo Text::_('COM_EXTENSIONSCREATOR_CREATE_TEMPLATE'); ?></a>
				</div>
			</div>
		</div>
	</div>
</div>
