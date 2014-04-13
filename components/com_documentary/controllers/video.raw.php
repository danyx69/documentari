<?php
/**
 * @version     1.0.0
 * @package     com_documentary
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Daniele Paiano <daniele.paiano@gmail.com> - http://
 */

// no direct access
defined('_JEXEC') or die;
   
jimport( 'joomla.application.component.controller');
 	    
/**
 * Video controller class.
 */ 

class DocumentaryControllerVideo extends JControllerLegacy
{  
  /**
     * Method to get a model object, loading it if required.
     *
     * @param	string	$name	The model name. Optional.
     * @param	string	$prefix	The class prefix. Optional.
     * @param	array	$config	Configuration array for model. Optional.
     *
     * @return	object	The model.
     * @since	1.5
     */
    public function getModel($name = 'Video', $prefix = 'DocumentaryModel', $config = array('ignore_request' => true)) {
        $model = parent::getModel($name, $prefix, $config);
        return $model;
        
    }
    
    /**
     * Method to load data via AJAX
     */
    public function calcolalike() {
        
        // Get the input
 		    $app     = JFactory::getApplication();
        $id_v = $app->input->get->get( 'id_v', 0);
        $like = $app->input->get->get( 'like', 0 );
        echo 'idd'.$id_v;
        // Get the model
	     	$model = $this->getModel();
         
        
        try {
            $result = $model->setLike($id_v,$like);
             var_dump($result);
         } catch ( Exception $e ) {
            JLog::add($e->getMessage());
            throw new Exception(JText::_('COM_DOCUMENTARY_ERROR_SYSTEM'));
        }
           var_dump($result);
//            echo 'entra qui';
//            
           
//         $userId  = JFactory::getUser()->id;
//     
// 		// Get the model
// 		$model = $this->getModel();
// 		/** @var $model CrowdFundingModelUpdateItem **/
// 
//         try {
//             
//             $item = $model->getItem($itemId);
//             
//             if($item->user_id != $userId) {
//                 
//                 $response = array(
//                 	"success" => false,
//             		"title" => JText::_("COM_CROWDFUNDING_FAIL"), 
//                     "text"  => JText::_("COM_CROWDFUNDING_RECORD_CANNOT_EDIT")
//                 );
//                     
//                 echo json_encode($response);
//                 
//                 JFactory::getApplication()->close();
//                 
//             }
//             
//         } catch ( Exception $e ) {
//             JLog::add($e->getMessage());
//             throw new Exception(JText::_('COM_CROWDFUNDING_ERROR_SYSTEM'));
//         }
//         
//         $response = array(
//         	"success" => true,
//             "data"	  => $item
//         );
//             
//         echo json_encode($response);
//         
//         JFactory::getApplication()->close();    
    }
    
}