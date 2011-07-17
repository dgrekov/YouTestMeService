<?php
class CommentController extends Dimagre_Rest_Controller
{
    public function _initModels(){
    	$this->_objectMapper = new Application_Model_CommentMapper();
    	$this->_object = new Application_Model_Comment();
    }
    
    /*
	 * Lists All Available Questions
	 */
    public function indexAction()
    {
		$this->view->comments = $this->_objectMapper
									 ->fetchByQuestionId(
									 	$this->getRequest()
									 		 ->getParam('questionid')
										);
    }

	/*
	 * Adds a Question
	 */
    public function postAction()
    {
    	$this->_object->text = $this->getRequest()->getParam('text');
    	$this->_object->questionid = $this->getRequest()->getParam('questionid');
		$this->_objectMapper->save($this->_object);
			
    	$this->getResponse()
             ->setHttpResponseCode(201);
    }
}