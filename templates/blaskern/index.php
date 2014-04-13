<?php
/****************************************************
#####################################################
##-------------------------------------------------##
##               BLASKERN                          ##
##-------------------------------------------------##
## Copyright = globbersthemes.com- 2012            ##
## Date      = MAI 2012                            ##
## Author    = globbers                            ##
## Websites  = http://www.globbersthemes.com       ##
## version (joomla)                                ##
##                                                 ##
#####################################################
****************************************************/

// no direct access
defined('_JEXEC') or die('Restricted access');
include_once(JPATH_ROOT . "/templates/" . $this->template . '/js/classe/layout.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >

<head>	
<jdoc:include type="head" />	

<?php JHTML::_('behavior.framework', true); 	
$app                = JFactory::getApplication();	
$templateparams     = $app->getTemplate(true)->params;	
$csite_name	        = $app->getCfg('sitename');	
$path = $this->baseurl.'/templates/'.$this->template;    
?>	

  <?php  # main width#
    $mod_left = $this->countModules( 'position-5' );
    $mod_right = $this->countModules( 'position-7' );
    if ( $mod_left || $mod_right ) {
    $width = '';
    } else {
    $width = '-full';
    }
    ?>  
 
 <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/blaskern/css/tdefaut.css" type="text/css" media="all" />
 <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/blaskern/css/box.css" type="text/css" media="all" /> 
 <script type="text/javascript" src="templates/<?php echo $this->template ?>/js/mootools.js"></script>   
 <script type="text/javascript" src="templates/<?php echo $this->template ?>/js/script.js"></script>
 <script type="text/javascript" src="templates/<?php echo $this->template ?>/js/jquery.js"></script>    
 <script type="text/javascript" src="templates/<?php echo $this->template ?>/js/superfish.js"></script>  
 <script type="text/javascript" src="templates/<?php echo $this->template ?>/js/hover.js"></script>
 <script type="text/javascript" src="templates/<?php echo $this->template ?>/js/nivo.slider.js"></script>
 <script type="text/javascript" src="templates/<?php echo $this->template ?>/js/scroll.js"></script>
  <script type="text/javascript" src="templates/<?php echo $this->template ?>/js/hide.js"></script>
 <link rel="icon" type="image/gif" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/favicon.gif" />    
 
 <script type="text/javascript">    
 window.addEvent('domready', function() {    
 SqueezeBox.initialize({});    
 $$('a.modal').each(function(el) {    
 el.addEvent('click', function(e) {    
 new Event(e).stop();    SqueezeBox.fromElement(el);    
 }); }); });    
 </script>    
 
 <script type="text/javascript">      
 var $j = jQuery.noConflict(); 	$j(document).ready(function() {	    	
 $j('.navigation ul').superfish({		  	
 delay:       800,                            		 	
 animation:   {opacity:'show',height:'show'},  		  	
 speed:       'normal',                          		 	
 autoArrows:  false,                           		  	
 dropShadows: true                           	  	
 });	   }); 	
 </script>	
 
 <script type="text/javascript">    
 var $j = jQuery.noConflict();    
 jQuery(document).ready(function ($){    
 $j("#slider").nivoSlider(    
 {effect: "sliceUpDown",    
 slices: 15,    
 boxCols: 8,    
 boxRows: 4,    
 animSpeed: 1000,    
 pauseTime: 3000,    
 captionOpacity: 1    
 }); });    
 </script>		
 
 </head>
 <body>    
    <div id="header">	    
        <div class="pagewidth">		    
            <div id="sitename">				    	             	   				            	            
                <a href="index.php"><img src="templates/<?php echo $this->template ?>/images/logo.png" width="306" height="104" alt="logotype" /></a>				            		           	        
            </div>                
                <div id="search">					
                    <jdoc:include type="modules" name="position-0" />   				
                </div>	    
        </div>	
    </div>        
        <div id="topmenu">		    
            <div class="pagewidth">			    
                <div class="navigation">                                                    	                
                    <jdoc:include type="modules" name="position-1" />                                            	            
                </div>				    
                    <div id="toolitem">				        
                        <div id="loginbt">                            
                            <div class="text-login">							        
                                <a href="#helpdiv" class="modal"  style="cursor:pointer" title="Login"  rel="{size: {x: 206, y: 285}, ajaxOptions: {method: &quot;get&quot;}}">                                    
                                    <img src="templates/<?php echo $this->template ?>/images/login.png" width="110" height="36" alt="login" />						        
                                </a>					        
                            </div>                        
                        </div>                            
                            <div style="display:none;">                                
                                <div id="helpdiv" >                                    
                                    <jdoc:include type="modules" name="login" style="xhtml" />                                
                                </div>                           
                            </div>			        
                    </div>			
            </div>        
        </div>            
            <?php $menu = JSite::getMenu(); ?>            
            <?php $lang = JFactory::getLanguage(); ?>            
            <?php if ($menu->getActive() == $menu->getDefault($lang->getTag())) { ?>            
            <?php if ($this->params->get( 'slidedisable' )) : ?>   
            <?php include "slideshow.php"; ?><?php endif; ?>            
             <?php } ?>

            <div id="line"></div>
                <div class="pagewidth">
               		<div id="wrapper-main<?php echo $width; ?>">		
                        <div id="main<?php echo $width ?>">				                                                               
     				        <jdoc:include type="component" />
                            <?php echo $modules_component ;?>						
				        </div>    
                    </div>						
                        <?php if ($this->countModules( 'position-7 or position-5' )) : ?>                                          
   						    <div id="colonne">
                                <?php if ($this->countModules('position-7')) { ?> 							
							        <div id="right">	                                                                                            
								        <jdoc:include type="modules" name="position-7" style="xhtml" />	                                                                                    
								    </div>
                                <?php } ?>								
						        <?php if ($this->countModules('position-5')) { ?> 	
		                            <div class="modulebox1">
                                        <jdoc:include type="modules" name="position-5" style="beezTabs" headerLevel="2"  id="3" />
                                    </div>
								<?php } ?>
							</div>
		                <?php endif; ?>	     					 
                </div>
				    <div id="ft">
			            <div class="pagewidth">
					        <div class="ftb">
					            <?php echo date( 'Y' ); ?>&nbsp; <?php echo $csite_name; ?>&nbsp;&nbsp;<?php require("template.php"); ?>
                            </div>
						        <div id="top">
                                    <div class="top_button">
                                        <a href="#" onclick="scrollToTop();return false;">
						                <img src="templates/<?php echo $this->template ?>/images/top.png" width="30" height="30" alt="top" /></a>
                                    </div>
					            </div>			
			            </div>
                     </div>				     									    												
 </body>
 </html>

