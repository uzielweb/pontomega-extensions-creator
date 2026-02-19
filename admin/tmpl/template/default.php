<?php

    defined('_JEXEC') or die;

    use Joomla\CMS\HTML\HTMLHelper;
    use Joomla\CMS\Router\Route;

?>
<form action="<?php echo Route::_('index.php?option=com_extensionscreator'); ?>" method="post" name="adminForm" id="adminForm">
	<div class="row">
		<div class="col-md-6">
			<fieldset class="options-form">
				<legend>Template Details</legend>

				<div class="mb-3">
					<label for="jform_element" class="form-label">Element (e.g., tpl_example)</label>
					<input type="text" name="jform[element]" id="jform_element" class="form-control" required>
				</div>

				<div class="mb-3">
					<label for="jform_client" class="form-label">Client</label>
					<select name="jform[client]" id="jform_client" class="form-select">
						<option value="site">Site</option>
						<option value="administrator">Administrator</option>
					</select>
				</div>

				<div class="mb-3">
					<label for="jform_version" class="form-label">Version</label>
					<input type="text" name="jform[version]" id="jform_version" class="form-control" value="1.0.0">
				</div>

				<div class="mb-3">
					<label for="jform_description" class="form-label">Description</label>
					<textarea name="jform[description]" id="jform_description" class="form-control"></textarea>
				</div>

				<div class="mb-3">
					<label for="jform_author" class="form-label">Author</label>
					<input type="text" name="jform[author]" id="jform_author" class="form-control" value="Pontomega">
				</div>
			</fieldset>
		</div>
	</div>

	<input type="hidden" name="task" value="generator.generate">
	<input type="hidden" name="type" value="template">
	<?php echo HTMLHelper::_('form.token'); ?>
</form>
