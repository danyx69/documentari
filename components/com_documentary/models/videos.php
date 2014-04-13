<?php

/**
 * @version     1.0.0
 * @package     com_documentary
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Simone Bestazza <simone.bestazza@gmail.com> - http://
 */
defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * Methods supporting a list of Documentary records.
 */
class DocumentaryModelVideos extends JModelList {

    /**
     * Constructor.
     *
     * @param    array    An optional associative array of configuration settings.
     * @see        JController
     * @since    1.6
     */
    public function __construct($config = array()) {
        parent::__construct($config);
    }

    /**
     * Method to auto-populate the model state.
     *
     * Note. Calling getState in this method will result in recursion.
     *
     * @since	1.6
     */
    protected function populateState($ordering = null, $direction = null) {

        // Initialise variables.
        $app = JFactory::getApplication();

        // List state information
        $limit = $app->getUserStateFromRequest('global.list.limit', 'limit', $app->getCfg('list_limit'));
        $this->setState('list.limit', $limit);

        $limitstart = JFactory::getApplication()->input->getInt('limitstart', 0);
        $this->setState('list.start', $limitstart);

        $catid = JFactory::getApplication()->input->getInt('catid', 0);
        $this->setState('list.catid', $catid);
        
        $search = JFactory::getApplication()->input->getString('cerca', '');
        $this->setState('filter.search', $search);

        // List state information.
        parent::populateState($ordering, $direction);
    }

    /**
     * Build an SQL query to load the list data.
     *
     * @return	JDatabaseQuery
     * @since	1.6
     */
    protected function getListQuery() {
        // Create a new query object.
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        // Select the required fields from the table.
        $query->select(
                $this->getState('list.select', 'd.*')
        		);
        
        $query->from('#__documentary_video AS d');

        
		// Join over the created by field 'created_by'
		$query->select('created_by.name AS created_by,cat.title AS tcat');
		$query->join('LEFT', '#__users AS created_by ON created_by.id = d.created_by');
    	$query->innerjoin('#__categories AS cat ON cat.id = d.catid');    
		$categoryId = $this->getState("list.catid", 0);
		
		$query->where('d.state = 1');
   		
		if(!empty($categoryId)) {
			$query->where('d.catid = '.(int)$categoryId);
		}
		
        // Filter by search in title
        
        $search = $this->getState('filter.search');
        $search = trim($search);
        $search = preg_replace("/\s+/",' ', $search);
        if (!empty($search)) {

        	
        	$search = explode(" ", $search);
        
        	$q.="(";
        	for ($i=0; $i<count($search);$i++)
        	{
        		$q.= "d.title LIKE '%". $db->escape($search[$i], true) ."%' OR " ;
        		$q.= "d.description LIKE '%". $db->escape($search[$i], true) ."%'" ;
        		if($i<count($search)-1)
        	    $q.= " OR ";
        		
        		
            }
            $q.=")";
            $query->where($q);	        	 
        }
        
        $query->order('d.created_date DESC');
        return $query;
    }

}
