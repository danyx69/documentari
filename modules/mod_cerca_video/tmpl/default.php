<?php

// no direct access

defined( '_JEXEC' ) or die( 'Restricted access' );
$search = JFactory::getApplication()->input->getString('cerca', '');
?>
<form action="<?php echo JRoute::_('index.php');?>"  method="get" class="form-wrapper cf">
				    
					    	
	<input type="hidden" name="option" value="com_documentary" />
	<input type="hidden" name="view" value="videos" />
	<input type="hidden" name="catid" value="0" />
						    
	<input id="cerca_video" type="search" placeholder="Cerca un video" results="10" name="cerca" value="<?php echo $search;?>" >
	<input type="hidden" name="limitstart" value="0" />
	<button id="cerca_video2" type="submit"><span class="icon-search"></span></button>
</form> 


