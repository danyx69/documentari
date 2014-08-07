<?php
/**
 * @version     1.0.0
 * @package     com_documentary
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Simone Bestazza <simone.bestazza@gmail.com> - http://
 */
// no direct access
defined('_JEXEC') or die;

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_documentary', JPATH_ADMINISTRATOR);

?>
<?php if ($this->item) : ?>
        
    <div class="item_fields"> 
		<div class="video_titolo"><strong><?php echo $this->item->title;?></strong></div>
		<div class="video_video"><?php echo $this->item->iframe; ?> </div>
		
		
		<div class="video_info">
		
		<span class="video_info_tempo icon-tempo">Durata:<?php echo $this->item->tempo; ?></span>
        
        <span class="video_info_view icon-view">Visulizzazioni:2345675</span>
		
		<span class="video_info_categoria icon-categoria">Categoria:<a href="<?php echo JRoute::_('index.php?option=com_documentary&view=videos&catid='.(int)$this->item->catid)?>"><?php echo $this->item->categoria; ?></a></span>
		
	    <span class="video_info_like icon-like">8222</span>
	    
	    <span class="video_info_raking icon-info_raking">O%</span>
	    
	    <span class="video_info_dislike icon-dislike">3323</span>
 		</div>
 		
 		
 		<div class="video_action">
	    <button class="video_like">
	    <input type="hidden" value="1" class="input_like" >  
	    <span class="icon-like button-icon-like"></span>
	    <span class="text-like">Mi piace</span> <?php echo $this->item->vlike; ?>
	    </button>
	    
	    <button class="video_dislike">
	    <input type="hidden" value="-1" class="input_dislike" >
	    <span class="icon-dislike button-icon-dislike"></span>
	    <span class="text-dislike">Non mi piace</span> <?php echo $this->item->vdislike; ?>
	    </button>
	    
	    <button class="video_visto">
	    <input type="hidden" value="2" class="" >
		<span class="icon-visto button-icon-visto"></span>  
	    <span class="text-visto">Segna come visto?</span> 
	    </button>
	    
	    <button class="video_preferito">
	    <input type="hidden" value="3" class="" >
		<span class="icon-preferito button-icon-preferito"></span>  
	    <span class="text-preferito">Aggiungi ai preferiti</span> 
	    </button>
	    </div>
	     
        
         <div class="video_desc"> <?php echo $this->item->description ?></div> 
         <input type="hidden" value="<?php echo $this->item->id; ?>" id="id_video">
    </div>
<?php
else:
    echo JText::_('COM_DOCUMENTARY_ITEM_NOT_LOADED');
endif;
?>
