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
  <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/unsemantic/stylesheets/unsemantic-grid-responsive.css" />
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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-44981772-1', 'escueladevida.com.co');
  ga('send', 'pageview');

</script>
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
		<div class="grid-container" id="contenedor">
			<!-- Header -->
			<header class="grid-100 header " role="banner">
				
				<div class="grid-35" id="logo">
					<jdoc:include type="modules" name="logo" style="none" />
					<jdoc:include type="modules" name="redes_sociales" style="none" />
				</div>
				<nav class="navigation grid-65 grid-parent" id="menu_top" role="navigation">
					<div class="grid-80">
						<jdoc:include type="modules" name="menu_top" style="xhtml" />
					</div>
					<div class="grid-20" id="buscador">
						<jdoc:include type="modules" name="buscador" style="none" />
					</div>
					
				</nav>

				
				<?php if ($this->countModules('banner_principal')) : ?>
					<div id="banner_principal" class="grid-100">
						<jdoc:include type="modules" name="banner_principal" style="xhtml" />
					</div>	
				<?php endif; ?>
			</header>
			


			<main id="contenido" role="main" class="grid-100 ">
				<!-- Begin Content -->
					<jdoc:include type="modules" name="breadcrumbs" style="none" />
					<jdoc:include type="message" />
					<jdoc:include type="component" />
				<!-- End Content -->
				<!-- Footer -->

			</main>
			<?php if ($this->countModules('noticias')) : ?>
			<div id="noticias" class="grid-90 push-5">
				<jdoc:include type="modules" name="noticias" style="xhtml" />
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
				<hr class="hr-secciones_home first" />	
					<div id="secciones_home" class="grid-100 grid-parent">
						<jdoc:include type="modules" name="secciones_home" style="xhtml" />
					</div>
				<hr class="hr-secciones_home second"/>
				<?php endif; ?>
				<div class="grid-100 grid-parent">
					<div class="grid-25" id="twitter">
						<h3>Tweets</h3>
						<jdoc:include type="modules" name="twitter" style="xhtml" />
					</div>

					<div class="grid-75">
						<?php if ($this->countModules('clientes')) : ?>
						<div class="grid-100 " id="clientes" role="navigation">
							<h3>Aliados Corporativos | <span>Empresas que hoy son nuestro pilar</span></h3>
							<jdoc:include type="modules" name="clientes" style="xhtml" />
						</div>
						<?php endif; ?>
						<div class="grid-50" id="banner1Home">

						</div>
						<div class="grid-50" id="banner2Home">
						</div>
						<div class="grid-100" id="bannerBottomHome">

						</div>
					</div>
				</div>

			</div>
		</div>
		<?php } ?>
		<div id="menu_inferior">
			<div class="grid-container">
				<div  class="grid-100">
				<p id="moviendo">Moviendo a todo un país</p>
				<div id="menu_inferior_interno">	<jdoc:include type="modules" name="menu_inferior" style="xhtml" />
				</div>
				</div>
			</div>
		</div>
		<div class="grid-container">
			<footer class="grid-100" id="footer" role="contentinfo">
				<jdoc:include type="modules" name="pie-de-pagina" style="none" />
			</footer>
		</div>
	</div>
	
	<jdoc:include type="modules" name="debug" style="none" />
</body>
</html>
