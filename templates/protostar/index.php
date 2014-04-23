<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);
// Getting params from template
$params = JFactory::getApplication()->getTemplate(true)->params;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;

$doc->addStyleSheet(JUri::base() . 'templates/'.$this->template.'/css/template.css', $type = 'text/css');

$doc->addStyleSheet(JUri::base() . 'templates/' . $this->template . '/css/documentari.css', $type = 'text/css');


?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<link href='http://fonts.googleapis.com/css?family=Spinnaker' rel='stylesheet' type='text/css'>
	
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js"></script>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />		
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />	
		
	<jdoc:include type="head" />
	
</head>

<body>

	<!-- Body -->
	<div class="body">
			<!-- Header -->
			<header class="header" role="banner">
				<jdoc:include type="modules" name="menu_category" style="xhtml" />
				<jdoc:include type="modules" name="cerca_video" style="xhtml" />
				
			</header>
					
					
			<div id="ombra_lato"> </div>
			<div class="row-fluid">

				<main id="content" role="main">
					<!-- Begin Content -->
					<jdoc:include type="message" />
					<jdoc:include type="component" />
					
					<jdoc:include type="modules" name="breadcrumb" style="none" />
					<!-- End Content -->
				</main>			
			</div>
	</div>
	<!-- Footer -->
	<footer class="footer" role="contentinfo">
		
	</footer>
	<jdoc:include type="modules" name="debug" style="none" />

</body>
</html>