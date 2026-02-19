<?php

    defined('_JEXEC') or die;

    use Joomla\CMS\HTML\HTMLHelper;
    use Joomla\CMS\Language\Text as JText;
    use Joomla\CMS\Router\Route;

?>
<form action="<?php echo Route::_('index.php?option=com_extensionscreator'); ?>" method="post" name="adminForm" id="adminForm">
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header bg-primary text-white">
					<h3 class="card-title mb-0"><span class="icon-bricks" aria-hidden="true"></span> <?php echo JText::_('COM_EXTENSIONSCREATOR_CREATE_PLUGIN'); ?></h3>
				</div>
				<div class="card-body">
					<fieldset class="options-form">
						<legend class="visually-hidden"><?php echo JText::_('COM_EXTENSIONSCREATOR_CREATE_PLUGIN'); ?></legend>

						<div class="mb-3">
							<label for="jform_element" class="form-label"><?php echo JText::_('COM_EXTENSIONSCREATOR_ELEMENT'); ?> (e.g., plg_system_example) <span class="text-danger">*</span></label>
							<div class="input-group">
								<span class="input-group-text">plg_</span>
								<input type="text" name="jform[element]" id="jform_element" class="form-control" required placeholder="system_example">
							</div>
							<div class="form-text">Full name or suffix.</div>
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
								<option value="filesystem">Filesystem</option>
								<option value="finder">Finder</option>
								<option value="installer">Installer</option>
								<option value="quickicon">Quickicon</option>
								<option value="sampledata">Sampledata</option>
								<option value="search">Search</option>
								<option value="webservices">Webservices</option>
								<option value="workflow">Workflow</option>
							</select>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="mb-3">
									<label for="jform_version" class="form-label"><?php echo JText::_('COM_EXTENSIONSCREATOR_VERSION'); ?></label>
									<input type="text" name="jform[version]" id="jform_version" class="form-control" value="1.0.0">
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<label for="jform_vendor" class="form-label"><?php echo JText::_('COM_EXTENSIONSCREATOR_VENDOR'); ?></label>
									<input type="text" name="jform[vendor]" id="jform_vendor" class="form-control" value="Pontomega">
								</div>
							</div>
						</div>

						<div class="mb-3">
							<label for="jform_description" class="form-label"><?php echo JText::_('COM_EXTENSIONSCREATOR_DESCRIPTION'); ?></label>
							<textarea name="jform[description]" id="jform_description" class="form-control" rows="3"></textarea>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="mb-3">
									<label for="jform_author" class="form-label"><?php echo JText::_('COM_EXTENSIONSCREATOR_AUTHOR'); ?></label>
									<input type="text" name="jform[author]" id="jform_author" class="form-control" value="Pontomega">
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<label for="jform_copyright" class="form-label"><?php echo JText::_('COM_EXTENSIONSCREATOR_COPYRIGHT'); ?></label>
									<input type="text" name="jform[copyright]" id="jform_copyright" class="form-control" value="(C) <?php echo date('Y'); ?> Pontomega">
								</div>
							</div>
						</div>
					</fieldset>
				</div>
				<div class="card-footer text-end">
					<a href="index.php?option=com_extensionscreator" class="btn btn-secondary"><?php echo JText::_('JCANCEL'); ?></a>
					<button type="submit" class="btn btn-primary"><?php echo JText::_('COM_EXTENSIONSCREATOR_GENERATE'); ?></button>
				</div>
			</div>
		</div>
	</div>

	<input type="hidden" name="task" value="generator.generate">
	<input type="hidden" name="type" value="plugin">
	<?php echo HTMLHelper::_('form.token'); ?>
</form>
