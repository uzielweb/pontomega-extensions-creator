<?php

    defined('_JEXEC') or die;

    use Joomla\CMS\HTML\HTMLHelper;
    use Joomla\CMS\Router\Route;

?>
<form action="<?php echo Route::_('index.php?option=com_extensionscreator'); ?>" method="post" name="adminForm" id="adminForm">
	<div class="row">
		<div class="col-md-6">
			<fieldset class="options-form">
				<legend>Plugin Details</legend>

				<div class="mb-3">
					<label for="jform_element" class="form-label">Element (e.g., plg_system_example)</label>
					<input type="text" name="jform[element]" id="jform_element" class="form-control" required>
				</div>

				<div class="mb-3">
					<label for="jform_group" class="form-label">Group</label>
					<select name="jform[group]" id="jform_group" class="form-select">
						<option value="system">System</option>
						<option value="content">Content</option>
						<option value="user">User</option>
						<option value="authentication">Authentication</option>
						<option value="captcha">Captcha</option>
						<option value="editors">Editors</option>
						<option value="editors-xtd">Editors-xtd</option>
						<option value="extension">Extension</option>
						<option value="installer">Installer</option>
						<option value="quickicon">Quickicon</option>
						<option value="search">Search</option>
						<option value="finder">Finder</option>
						<option value="filesystem">Filesystem</option>
						<option value="media-action">Media Action</option>
						<option value="webservices">Webservices</option>
						<option value="workflow">Workflow</option>
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
					<label for="jform_vendor" class="form-label">Vendor (Namespace, e.g., MyCompany)</label>
					<input type="text" name="jform[vendor]" id="jform_vendor" class="form-control" value="Pontomega">
				</div>

				<div class="mb-3">
					<label for="jform_author" class="form-label">Author</label>
					<input type="text" name="jform[author]" id="jform_author" class="form-control" value="Pontomega">
				</div>
			</fieldset>
		</div>
	</div>

	<input type="hidden" name="task" value="generator.generate">
	<input type="hidden" name="type" value="plugin">
	<?php echo HTMLHelper::_('form.token'); ?>
</form>
