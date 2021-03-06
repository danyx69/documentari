<?php
/**
 * @version     1.0.0
 * @package     com_documentary
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Simone Bestazza <simone.bestazza@gmail.com> - http://
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');


/**
 * View class for a list of Documentary.
 */
class DocumentaryViewVideos extends JViewLegacy
{
	protected $items;
	protected $pagination;
	protected $state;
    protected $params;
    protected $option;
    
	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
		JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
		
        $app                = JFactory::getApplication();
        
        $this->state		= $this->get('State');
        $this->items		= $this->get('Items');
        $this->pagination	= $this->get('Pagination');
        $this->params       = $app->getParams('com_documentary');
        $this->option 		= JFactory::getApplication()->input->getCmd("option");
        $catId				= JFactory::getApplication()->input->getInt('catid', 0);
        
		if(!empty($catId))
		{
			$pathway = $app->getPathway();
			
			$catTit=JHTML::_("Documentary.getCategoryName",$catId);
	        $pathway->addItem($catTit->title, 'index.php?option=com_documentary&view=videos&catid='.$catId);
		}
        
		$catTit=JHTML::_("Documentary.getCategoryName",$catId);
        
        // Check for errors.
        if (count($errors = $this->get('Errors'))) {;
            throw new Exception(implode("\n", $errors));
        }

        $show = true;
        
        
        $this->_prepareDocument();
        parent::display($tpl);
	}


	/**
	 * Prepares the document
	 */
	protected function _prepareDocument()
	{
		$app	= JFactory::getApplication();
		$menus	= $app->getMenu();
		$title	= null;

		// Because the application sets a default page title,
		// we need to get it from the menu item itself
		$menu = $menus->getActive();
		if($menu)
		{
			$this->params->def('page_heading', $this->params->get('page_title', $menu->title));
		} else {
			$this->params->def('page_heading', JText::_('com_documentary_DEFAULT_PAGE_TITLE'));
		}
		$title = $this->params->get('page_title', '');
		if (empty($title)) {
			$title = $app->getCfg('sitename');
		}
		elseif ($app->getCfg('sitename_pagetitles', 0) == 1) {
			$title = JText::sprintf('JPAGETITLE', $app->getCfg('sitename'), $title);
		}
		elseif ($app->getCfg('sitename_pagetitles', 0) == 2) {
			$title = JText::sprintf('JPAGETITLE', $title, $app->getCfg('sitename'));
		}
		$this->document->setTitle($title);

		if ($this->params->get('menu-meta_description'))
		{
			$this->document->setDescription($this->params->get('menu-meta_description'));
		}

		if ($this->params->get('menu-meta_keywords'))
		{
			$this->document->setMetadata('keywords', $this->params->get('menu-meta_keywords'));
		}

		if ($this->params->get('robots'))
		{
			$this->document->setMetadata('robots', $this->params->get('robots'));
		}
		$this->document->addStyleSheet( 'media/'.$this->option.'/css/site/videos.css');
		$this->document->addScript('media/'.$this->option.'/js/site/jquery.timers.js');
		$this->document->addScript('media/'.$this->option.'/js/site/jquery.dotdotdot.min.js');
		$this->document->addScript('media/'.$this->option.'/js/site/videos.js');
		
		

	}    
    	
}
