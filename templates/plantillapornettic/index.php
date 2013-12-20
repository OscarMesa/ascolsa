<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Getting params from template
$params = JFactory::getApplication()->getTemplate(true)->params;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->getCfg('sitename');

if($task == "edit" || $layout == "form" )
{
	$fullWidth = 1;
}
else
{
	$fullWidth = 0;
}

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');
$doc->addScript('templates/' .$this->template. '/js/template.js');

// Add Stylesheets
$doc->addStyleSheet('templates/'.$this->template.'/css/template.css');

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);


// Add current user information
$user = JFactory::getUser();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<jdoc:include type="head" />
	<!--[if lt IE 9]>
  <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/unsemantic/javascripts/html5.js"></script>
<![endif]-->
<!--[if (gt IE 8) | (IEMobile)]><!-->
  <!-- <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/unsemantic/unsemantic-grid-responsive-tablet.css"> -->
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/unsemantic/stylesheets/unsemantic-grid-desktop.css" />
  <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/unsemantic/stylesheets/unsemantic-grid-base.css" />
<!--<![endif]-->
<!--[if (lt IE 9) & (!IEMobile)]>
  <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/unsemantic/stylesheets/ie.css" />
<![endif]-->
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
	<?php
	// Use of Google Font
	if ($this->params->get('googleFont'))
	{
	?>
		<link href='http://fonts.googleapis.com/css?family=<?php echo $this->params->get('googleFontName');?>' rel='stylesheet' type='text/css' />
		<style type="text/css">
			h1,h2,h3,h4,h5,h6,.site-title{
				font-family: '<?php echo str_replace('+', ' ', $this->params->get('googleFontName'));?>', sans-serif;
			}
		</style>
	<?php
	}
	?>
	<?php
	// Template color
	if ($this->params->get('templateColor'))
	{
	?>

	<?php
	}
	?>
	<!--[if lt IE 9]>
		<script src="<?php echo $this->baseurl ?>/media/jui/js/html5.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/style.css" />
	<?php
$app = JFactory::getApplication();
$menu = $app->getMenu();
if ($menu->getActive() != $menu->getDefault()) {?>
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/styleHome.css" />
<?php
}
?>
	<?php
$app = JFactory::getApplication();
$menu = $app->getMenu();
if ($menu->getActive() == $menu->getDefault()) {
       // echo 'This is the front page';
}
?>
</head>

<body class="site <?php echo $option
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '')
	. ($params->get('fluidContainer') ? ' fluid' : '');
?>">
<?php
$app = JFactory::getApplication();
$menu = $app->getMenu();
if ($menu->getActive() == $menu->getDefault()) {
?>


<?php
}
?>
	<!-- Body -->
	<div class="body">
		<!-- Header -->
		<header class="grid-100 header " role="banner">

			<div class="grid-25 grid-parent" id="logo">
				<jdoc:include type="modules" name="logo" style="xhtml" />
			</div>
			<nav class="navigation grid-75 grid-parent" id="menu_top" role="navigation">
				<div class="grid-65">
					<jdoc:include type="modules" name="menu_top" style="xhtml" />
				</div>
				<div class="grid-35 push-65" id="buscador">
					<div class="grid-70"><jdoc:include type="modules" name="buscador" style="none"/></div>
					<div class="grid-30"><jdoc:include type="modules" name="redes_sociales" style="none"/></div>
				</div>
				
			</nav>
			
			<?php if ($this->countModules('banner_principal')) : ?>
				<div id="banner_principal" class="grid-100">
					<jdoc:include type="modules" name="banner_principal" style="xhtml" />
				</div>	
			<?php endif; ?>
		</header>

		<div class="grid-container" id="contenedor">
			<main id="contenido" role="main" class="grid-100 ">
				<!-- Begin Content -->
					<jdoc:include type="modules" name="breadcrumbs" style="none" />
					<jdoc:include type="message" />
					<jdoc:include type="component" />
				<!-- End Content -->
				<!-- Footer -->

			</main>
			<?php if ($this->countModules('clientes')) : ?>
			<div id="noticias" class="grid-90 push-5">
					<div id="noticias-img-izq"></div>
				<div class="inside">
					<div class="grid-20 titulo" >
						Nuestros clientes
					</div>
					<div class="grid-80">
						<jdoc:include type="modules" name="clientes" style="xhtml" />
					</div>
				</div>
					<div id="noticias-img-der"></div>
			</div>
			<?php endif; ?>
		</div>
		<?php
		if ($menu->getActive() == $menu->getDefault()) {
       
?>
			<!-- conenedor_home -->
			<div id="contenedor_home">
				<div class="grid-container">
				<?php if ($this->countModules('secciones_home')) : ?>
					<div id="secciones_home" class="grid-100 grid-parent">
						<jdoc:include type="modules" name="secciones_home" style="xhtml" />
					</div>
				<?php endif; ?>
				<div class="grid-100 grid-parent">
					<div class="grid-50" id="ultimas_noticias">
						<jdoc:include type="modules" name="noticias" style="xhtml" />
					</div>
					<div class="grid-50" id="banner_home">
						<jdoc:include type="modules" name="banner2" style="xhtml" />
					</div>
				</div>

			</div>
		</div>
		<?php } ?>
		<div id="footer">
		<div class="grid-container">
			<div class="grid-100 grid-parent">
			<footer class="grid-40"  role="contentinfo">
				<jdoc:include type="modules" name="pie-de-pagina" style="none" />
			</footer>
					<div id="menu_inferior" class="grid-40">

				
				
				<div id="menu_inferior_interno">	<jdoc:include type="modules" name="menu_inferior" style="xhtml" />
				</div>
				</div>
				<div class="grid-20">
					Dise&ntilde;ado por <a href="http://www.nettic.com.co/">Nettic</a>
				</div>
				
			</div>
		</div>
		</div>
	</div>
	
	<jdoc:include type="modules" name="debug" style="none" />
</body>
</html>
