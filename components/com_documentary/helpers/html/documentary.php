<?php
/**
 * @version     1.0.0
 * @package     com_documentary
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Simone Bestazza <simone.bestazza@gmail.com> - http://
 */

defined('_JEXEC') or die;
    
abstract class JHtmlDocumentary
{
// 	public static function myFunction()
// 	{
// 		$result = 'Something';
// 		return $result;
// 	}
   public static function getCategoryName($id){
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query 
            ->select('title')
            ->from('#__categories')
            ->where('id = ' . $id);
        $db->setQuery($query);
        return $db->loadObject();
    }
    
    
     public static function getConvert($total_seconds) {
             $total_time =intval(intval($total_seconds)/ 3600).":"; 
             $total_time.=str_pad(intval(($total_seconds/60)%60),2,"0",STR_PAD_LEFT).":"; 
             $total_time.=str_pad(intval($total_seconds%60),2,"0",STR_PAD_LEFT);
          return $total_time;
          }
          
          
        public static function calculatePercent($funded, $goal) {

              $value = ($funded/$goal) * 100;
        	    return round($value, 2);
        	}     
}

