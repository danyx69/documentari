<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
// Include the syndicate functions only once
//require_once( dirname(__FILE__).DS.'helper.php' );
$document =JFactory::getDocument();
// Head styles
$document->addStyleSheet(JURI::root() .'modules'.'/'.'mod_cerca_video'.'/'.'mod_cerca_video.css');

// Head script
$document->addScript(JURI::root() . 'modules'.'/'.'mod_cerca_video'.'/'.'mod_cerca_video.js');

require( JModuleHelper::getLayoutPath( 'mod_cerca_video' ) );
?>
