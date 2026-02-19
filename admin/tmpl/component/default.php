<?php

    defined('_JEXEC') or die;

    use Joomla\CMS\HTML\HTMLHelper;
    use Joomla\CMS\Router\Route;

?>
<form action="<?php echo Route::_('index.php?option=com_extensionscreator'); ?>" method="post" name="adminForm" id="adminForm">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="card shadow-sm">
				<div class="card-header bg-primary text-white">
					<h3 class="card-title mb-0"><span class="icon-bricks" aria-hidden="true"></span> Create Component</h3>
				</div>
				<div class="card-body">
					<fieldset class="options-form">
						<legend class="visually-hidden">Component Details</legend>

						<div class="mb-3">
							<label for="jform_element" class="form-label">Element (e.g., com_example) <span class="text-danger">*</span></label>
							<div class="input-group">
								<span class="input-group-text">com_</span>
								<input type="text" name="jform[element]" id="jform_element" class="form-control" required placeholder="example">
							</div>
							<div class="form-text">The internal name of your component.</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="mb-3">
									<label for="jform_version" class="form-label">Version</label>
									<input type="text" name="jform[version]" id="jform_version" class="form-control" value="1.0.0">
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<label for="jform_vendor" class="form-label">Vendor Namespace</label>
									<input type="text" name="jform[vendor]" id="jform_vendor" class="form-control" value="Pontomega">
								</div>
							</div>
						</div>

						<div class="mb-3">
							<label for="jform_views" class="form-label">Views</label>
							<input type="text" name="jform[views]" id="jform_views" class="form-control" value="dashboard" placeholder="dashboard, items, categories">
							<div class="form-text">Comma separated list of views to create.</div>
						</div>

						<div class="mb-3">
							<label for="jform_tables" class="form-label">Tables</label>
							<input type="text" name="jform[tables]" id="jform_tables" class="form-control" value="" placeholder="items, categories">
							<div class="form-text">Comma separated list of database tables to scaffold.</div>
						</div>

						<div class="mb-3">
							<label for="jform_description" class="form-label">Description</label>
							<textarea name="jform[description]" id="jform_description" class="form-control" rows="3"></textarea>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="mb-3">
									<label for="jform_author" class="form-label">Author</label>
									<input type="text" name="jform[author]" id="jform_author" class="form-control" value="Pontomega">
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<label for="jform_copyright" class="form-label">Copyright</label>
									<input type="text" name="jform[copyright]" id="jform_copyright" class="form-control" value="(C) <?php echo date('Y'); ?> Pontomega">
								</div>
							</div>
						</div>
					</fieldset>
				</div>
				<div class="card-footer text-end">
					<a href="index.php?option=com_extensionscreator" class="btn btn-secondary">Cancel</a>
					<button type="submit" class="btn btn-primary">Generate & Download</button>
				</div>
			</div>
		</div>
	</div>

	<input type="hidden" name="task" value="generator.generate">
	<input type="hidden" name="type" value="component">
	<?php echo HTMLHelper::_('form.token'); ?>
</form>
