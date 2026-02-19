<?php

    defined('_JEXEC') or die;

    use Joomla\CMS\HTML\HTMLHelper;
    use Joomla\CMS\Language\Text;
    use Joomla\CMS\Router\Route;

?>
<form action="<?php echo Route::_('index.php?option=com_extensionscreator'); ?>" method="post" name="adminForm" id="adminForm">
	<div class="card">
		<div class="card-header bg-primary text-white">
			<h3 class="card-title mb-0"><span class="icon-bricks" aria-hidden="true"></span> <?php echo Text::_('COM_EXTENSIONSCREATOR_CREATE_TEMPLATE'); ?></h3>
		</div>
		<div class="card-body">
			<fieldset class="options-form">
				<legend class="visually-hidden"><?php echo Text::_('COM_EXTENSIONSCREATOR_CREATE_TEMPLATE'); ?></legend>

				<div class="mb-3">
					<label for="jform_element" class="form-label"><?php echo Text::_('COM_EXTENSIONSCREATOR_ELEMENT'); ?> (e.g., tpl_example) <span class="text-danger">*</span></label>
					<div class="input-group">
						<span class="input-group-text">tpl_</span>
						<input type="text" name="jform[element]" id="jform_element" class="form-control" required placeholder="example">
					</div>
					<div class="form-text">The internal name of your template.</div>
				</div>

				<div class="mb-3">
					<label for="jform_client" class="form-label"><?php echo Text::_('COM_EXTENSIONSCREATOR_CLIENT'); ?></label>
					<select name="jform[client]" id="jform_client" class="form-select">
						<option value="site"><?php echo Text::_('COM_EXTENSIONSCREATOR_CLIENT_SITE'); ?></option>
						<option value="administrator"><?php echo Text::_('COM_EXTENSIONSCREATOR_CLIENT_ADMINISTRATOR'); ?></option>
					</select>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="mb-3">
							<label for="jform_version" class="form-label"><?php echo Text::_('COM_EXTENSIONSCREATOR_VERSION'); ?></label>
							<input type="text" name="jform[version]" id="jform_version" class="form-control" value="1.0.0">
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-3">
							<label for="jform_author" class="form-label"><?php echo Text::_('COM_EXTENSIONSCREATOR_AUTHOR'); ?></label>
							<input type="text" name="jform[author]" id="jform_author" class="form-control" value="Pontomega">
						</div>
					</div>
				</div>

				<div class="mb-3">
					<label for="jform_description" class="form-label"><?php echo Text::_('COM_EXTENSIONSCREATOR_DESCRIPTION'); ?></label>
					<textarea name="jform[description]" id="jform_description" class="form-control" rows="3"></textarea>
				</div>

				<div class="mb-3">
					<label for="jform_copyright" class="form-label"><?php echo Text::_('COM_EXTENSIONSCREATOR_COPYRIGHT'); ?></label>
					<input type="text" name="jform[copyright]" id="jform_copyright" class="form-control" value="(C) <?php echo date('Y'); ?> Pontomega">
				</div>
			</fieldset>
		</div>
		<div class="card-footer text-end">
			<a href="index.php?option=com_extensionscreator" class="btn btn-secondary"><?php echo Text::_('JCANCEL'); ?></a>
			<button type="submit" class="btn btn-primary"><?php echo Text::_('COM_EXTENSIONSCREATOR_GENERATE'); ?></button>
		</div>
	</div>

	<input type="hidden" name="type" value="template">
	<input type="hidden" name="task" value="generator.generate">
	<?php echo HTMLHelper::_('form.token'); ?>
</form>