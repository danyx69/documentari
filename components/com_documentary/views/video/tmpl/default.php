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
		<div class="video_titolo"> TITOLO: <?php echo $this->item->title;?></div>
		<div class="video_video"><?php echo $this->item->iframe; ?> </div>
		<div class="video_desc"> <?php echo $this->item->description ?></div>
		
		
		<div class="video_tempo">Durata: <?php echo $this->item->tempo; ?></div>
        

		<div class="video_categoria"> Categoria: <a href="<?php echo JRoute::_('index.php?option=com_documentary&view=videos&catid='.(int)$this->item->catid)?>"> <?php echo $this->item->categoria; ?> </a>   </div>
	    <div class="video_like"><input type="hidden" value="1" id="input_like" > Like: <?php echo $this->item->vlike; ?></div>
	    <div class="video_rank">Gradimento:<?php echo $this->item->like_percents; ?>%</div>
	    <div class="video_dislike"><input type="hidden" value="-1" id="input_like" >Dislike: <?php echo $this->item->vdislike; ?></div>
	    
    <div class="video_visto">Gia visto</div>
    <input type="hidden" value="<?php echo $this->item->id; ?>" id="id_video">
    </div>
<?php
else:
    echo JText::_('COM_DOCUMENTARY_ITEM_NOT_LOADED');
endif;
?>
