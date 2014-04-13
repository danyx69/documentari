<?php


// no direct access
defined('_JEXEC') or die;

//JLoader::register("CrowdFundingHelperRoute", JPATH_SITE.DIRECTORY_SEPARATOR."components".DIRECTORY_SEPARATOR."com_crowdfunding".DIRECTORY_SEPARATOR."helpers".DIRECTORY_SEPARATOR."route.php");

class plgSearchDocumentary extends JPlugin {
    
	/**
	 * Constructor
	 *
	 * @access      protected
	 * @param       object  $subject The object to observe
	 * @param       array   $config  An array that holds the plugin configuration
	 * @since       1.5
	 */
	public function __construct(& $subject, $config) {
		parent::__construct($subject, $config);
		$this->loadLanguage();
	}

	/**
	 * @return array An array of search areas
	 */
	public function onContentSearchAreas() {
		static $areas = array(
			'projects' => 'PLG_SEARCH_DOCUMENTARY'
		);
		return $areas;
	}

	/**
	 * Weblink Search method
	 *
	 * The sql must return the following fields that are used in a common display
	 * routine: href, title, section, created, text, browsernav
	 * @param string Target search string
	 * @param string mathcing option, exact|any|all
	 * @param string ordering option, newest|oldest|popular|alpha|category
	 * @param mixed An array if the search it to be restricted to areas, null if search all
	 */
	public function onContentSearch($text, $phrase='', $ordering='', $areas=null) {
	    
		$app	= JFactory::getApplication();
		
		if($this->params->get("search_area", 0)) {
    		if (is_array($areas)) {
    			if (!array_intersect($areas, array_keys($this->onContentSearchAreas()))) {
    				return array();
    			}
    		} else {
    		    return array();
    		}
		}
		
		$limit	        = $this->params->def('search_limit',	20);
		
		$text = JString::trim($text);
		if ($text == '') {
			return array();
		}

		$return = array();
		$return = $this->searchProjects($text, $phrase, $ordering, $limit);
		
		return $return;
	}
	
	/**
	 * 
	 * Search phrase in projects.
	 * 
	 * @param string  $text
	 * @param string  $phrase
	 * @param string  $ordering
	 * @param integer $limit
	 */
	private function searchProjects($text, $phrase, $ordering, $limit) {
	    
	    $db		    = JFactory::getDbo();
	    $searchText = $text;
	    $wheres	    = array();
	    $rows       = array();
	    
		switch ($phrase){
		    
			case 'exact':
				$text		= $db->quote('%'.$db->escape($text, true).'%', false);
				$wheres[]	= 'a.title LIKE '.$text;
				$where		= '(' . implode(') OR (', $wheres) . ')';
				break;

			case 'all':
			case 'any':
			default:
				$words	= explode(' ', $text);
				foreach ($words as $word) {
					$wheres2	    = array();
					$word		= $db->quote('%'.$db->escape($word, true).'%', false);
					$wheres2[]	= 'a.title LIKE '.$word;
					$wheres2[]	= 'c.title LIKE '.$word;
					$wheres[]	= implode(' OR ', $wheres2);
          
						
				}
				$where	= '(' . implode(($phrase == 'all' ? ') AND (' : ') OR ('), $wheres) . ')';
				break;
		}

		switch ($ordering) {
		    
			case 'oldest':
				$order = 'a.created_date ASC';
				break;

			case 'popular':
				$order = 'a.hits DESC';
				break;

			case 'alpha':
				$order = 'a.title ASC';
				break;

			case 'category':
				$order = 'c.title ASC';
				break;

			case 'newest':
			default:
				$order = 'a.created_date DESC';
				
		}

		$return = array();
		
		$query	= $db->getQuery(true);

		if($limit > 0) {
		    
		    $query->clear();
    		
    		//sqlsrv changes
    		$case_when = ' CASE WHEN ';
    		$case_when .= $query->charLength('a.alias');
    		$case_when .= ' THEN ';
    		$a_id = $query->castAsChar('a.id');
    		$case_when .= $query->concatenate(array($a_id, 'a.alias'), ':');
    		$case_when .= ' ELSE ';
    		$case_when .= $a_id.' END as slug';
    		
    		$case_when2 = ' CASE WHEN ';
    		$case_when2 .= $query->charLength('c.alias');
    		$case_when2 .= ' THEN ';
    		$c_id = $query->castAsChar('c.id');
    		$case_when2 .= $query->concatenate(array($c_id, 'c.alias'), ':');
    		$case_when2 .= ' ELSE ';
    		$case_when2 .= $c_id.' END as catslug';
    		
    		// Select
    		$query->select('a.title, a.created_date');
    		$query->select('c.title as section, 2 AS browsernav, '.$case_when .','. $case_when2);
    		
    		// FROM and JOIN
    		$query->from('#__documentary_video AS a');
    		$query->innerJoin('#__categories AS c ON a.catid = c.id');
    		
    		// WHERE
    		$query->where("( a.state = 1 )");
    		//$query->where("( a.approved = 1 )");
    		$query->where($where);
    		
    		// ORDER
    		$query->order($order);
    		
    		
    	    $db->setQuery($query, 0, $limit);
    		$rows     = $db->loadObjectList();

		}
		
		if ($rows) {
		    
			foreach($rows as $key => $row) {
			//	$rows[$key]->href       = CrowdFundingHelperRoute::getDetailsRoute($row->slug, $row->catslug);
		  	$rows[$key]->href       = 'www.google.it';
    		$rows[$key]->title      = $rows[$key]->title;
				$rows[$key]->title       = strip_tags($rows[$key]->title);
			}

			foreach($rows as $key => $item) {
				if (searchHelper::checkNoHTML($item, $searchText, array('title', 'text'))) {
					$return[] = $item;
				}
			}
		}		
		return $return;
	}
	
}
