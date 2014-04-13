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
?>
<?php 
	$show = false; 
	
	
	?>

<div class="pagination"><?php echo $this->pagination->getPagesLinks();?></div>
<div id="videos">
		
		
		
        <?php foreach ($this->items as $item) { ?>
			<?php
						$date =&JFactory::getDate($item->created_date);
						$date =JHtml::date($date , 'd-m-Y');
						$show = true;
						$item->tempo= JHtml::_("Documentary.getConvert",$item->tempo );
						$gradimento =  JHtml::_("Documentary.calculatePercent",$item->like,$item->dislike ); 

						?>
	
			 <div class="video_container">
			 <div class="time_n video_button">
			 <?php echo $item->tempo; ?>
			 <div class="time video_button"></div>
			 </div>
			 		 
			 <div class="flip_n video_button"><div class="info">info</div>
			 <div class="flip video_button"></div>
			 </div>
			 <a class="play video_button"  href="<?php echo JRoute::_('index.php?option=com_documentary&view=video&id='.(int)$item->id)?>"></a>
			 
			 <a class="play_link video_button" href="<?php echo JRoute::_('index.php?option=com_documentary&view=video&id='.(int)$item->id)?>">
			 <div class="link_mini video_button">Play</div> 
			 <div class="play_icon video_button"></div>
			 </a>
			 
			 <a class="video_l"style="top:0%;height: 100%;width: 100%; position: absolute;" href="<?php echo JRoute::_('index.php?option=com_documentary&view=video&id='.(int)$item->id)?>"></a>
			 
			 <a class="cate_link video_button" href="<?php echo JRoute::_('index.php?option=com_documentary&view=videos&catid='.(int)$item->catid)?>">
			 <div class="cate_icon video_button"></div>
			 <div class="link_mini_cate video_button"><?php echo $item->tcat; ?></div> 
			 </a>
			 
			 <div id="card" class="video">
   			 
     		 
     		 <div class="front">
     		 
     		 <a class="video_title" href="<?php echo JRoute::_('index.php?option=com_documentary&view=video&id='.(int)$item->id)?>" title="<?php echo ucfirst(strtolower($item->title)); ?>"><?php echo ucfirst(strtolower($item->title)); ?></a>
			 <a class="video_link"  style="background-image:url(<?php echo $item->image?>)" href="<?php echo JRoute::_('index.php?option=com_documentary&view=video&id='.(int)$item->id)?>"  ></a>
     		 </div>
      		<div class="back">

      		 <a class="video_description" href="<?php echo JRoute::_('index.php?option=com_documentary&view=video&id='.(int)$item->id)?>">
      		 <span class="video_title" href="<?php echo JRoute::_('index.php?option=com_documentary&view=video&id='.(int)$item->id)?>"><?php echo ucfirst(strtolower($item->title)); ?></span>
      		 <br>
      		 <span><strong>Descrizione: </strong></span><?php echo $item->description; ?></a>
      		 <div class="video_data video_button">Pubblicato: <?php echo $date; ?></div>
      		 <div class="video_visualizzazioni video_button">Visualizzazioni: <?php echo $item->visualizzazioni; ?></div>
      		 <div class="video_like video_button"><div class="img_like"></div><?php echo $item->like; ?> 700 <div class="img_dislike"></div> 170 <?php echo $item->dislike; ?></div>
      		 <div class="video_rating video_button">Gradimento: <?php echo $gradimento; ?></div>
      		 </div>
   			 </div>	
   					
			 </div>			
						

		<?php } ?>
        <?php
        if (!$show):
            echo JText::_('COM_DOCUMENTARY_NO_ITEMS');
        endif;
        ?>
       
</div>
 <div class="pagination"><?php echo $this->pagination->getPagesLinks();?>     </div>
    
