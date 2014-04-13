<?php
// no direct access 
defined( '_JEXEC' ) or die( 'Restricted access' ); 

$document =JFactory::getDocument();

// Head styles
$document->addStyleSheet( 'modules/mod_menuCategorie/mod_menuCategorie.css');

// Head script
$document->addScript(JURI::root() . 'modules/mod_menuCategorie/mod_menuCategorie.js');

$db = JFactory::getDbo();
$query = $db->getQuery(true);

$query->select('id,title,alias,extension,published,params');
$query->from('#__categories');
$query->where('extension = "com_documentary"');
$query->where('published = 1');
$query->order('title');

$db->setQuery($query);
$categories = $db->loadObjectList();

?>
	

	
	
			 <div id="button_categoria"></div>
			 <h3 id="text_categoria">sfoglia categorie</h3> 
	
	<ul id="menu_cate" class="nav">
	<?php foreach($categories as $item) { 
		$catparams = json_decode($item->params);
		echo '<li>';
		echo '<a href="'.JURI::root().'index.php?option=com_documentary&view=videos&catid='.$item->id.'">';
		echo '<img  src="'.$catparams->image.'"></img>';
		echo '<span>'.$item->title.'</span>';
		echo '</a>';
		echo '</li>';
 	}
	?>
	</ul>
	
	





