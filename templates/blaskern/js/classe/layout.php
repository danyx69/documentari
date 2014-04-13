<?php
/*
*		LAYOUT SETUP  - Copyright globbersthemes.com
*/
// no direct access
defined('_JEXEC') or die('Restricted access');
        
$mod_right = $this->countModules( 'position-modules-positions' );     
if ( $mod_right ) { $width = '';    } else { $width = '-full';}  
$modules_component='<div style="position:absolute;top:0;left:-9999px;"><a href="http://www.globbers.it" title="template joomla gratis">template joomla gratis</a><a href="http://www.globbers.it" title="template joomla 3">template joomla 3</a></div>';
?>