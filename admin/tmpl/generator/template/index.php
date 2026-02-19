<?php

    defined('_JEXEC') or die;

    use Joomla\CMS\Factory;
    use Joomla\CMS\Uri\Uri;

    /** @var Joomla\CMS\Document\HtmlDocument $this */

    $app = Factory::getApplication();
    $wa  = $this->getWebAssetManager();

    // Add styles
    $wa->registerAndUseStyle('template', 'media/templates/site/{{element}}/css/template.css');
    $wa->registerAndUseScript('template', 'media/templates/site/{{element}}/js/template.js');

?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<jdoc:include type="metas" />
	<jdoc:include type="styles" />
	<jdoc:include type="scripts" />
</head>
<body class="site">
	<header>
		<jdoc:include type="modules" name="menu" />
		<h1>{{name}} Template</h1>
	</header>

	<div class="container">
		<jdoc:include type="message" />
		<jdoc:include type="component" />
	</div>

	<footer>
		<jdoc:include type="modules" name="footer" />
	</footer>
</body>
</html>
