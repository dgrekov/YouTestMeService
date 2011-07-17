<?php
class TagController extends Dimagre_Rest_Controller
{
    public function _initModels(){
    	$this->_objectMapper = new Application_Model_TagMapper();
    	$this->_object = new Application_Model_Tag();
    }
    
    /*
	 * Lists All Available Tags
	 */
    public function indexAction()
    {
        $this->view->tags = $this->_objectMapper->fetchAll();
    }
}