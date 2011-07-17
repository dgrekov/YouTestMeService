<?php
class QuestionController extends Dimagre_Rest_Controller
{
    public function _initModels(){
    	$this->_objectMapper = new Application_Model_QuestionMapper();
    	$this->_object = new Application_Model_Question();
    }
    
    /*
	 * Lists All Available Questions
	 */
    public function indexAction()
    {
        switch($this->getRequest()->getParam('set')){
			case "marked":
				$this->view->questions = $this->_objectMapper->fetchMarked();
				break;
			case "mine":
				$this->view->questions = $this->_objectMapper->fetchMine();
				break;
			default:
				$this->view->questions = $this->_objectMapper->fetchAll();
				break;
		}
		$this->view->params = $this->getRequest()->getParams();
    }

	/*
	 * Gets One Question
	 */
    public function getAction()
    {
    	$id = $this->getRequest()->getParam('id');
		$this->_objectMapper->find($id, $this->_object);
        $this->view->question = $this->_object;
    }
    
	/*
	 * Adds a Question
	 */
    public function postAction()
    {
    	$this->_object->title = $this->getRequest()->getParam('title');
    	$this->_object->text = $this->getRequest()->getParam('text');
    	$this->_object->answer = $this->getRequest()->getParam('answer');
		$this->_object->tags = $this->getRequest()->getParam('tags');
		$this->_objectMapper->save($this->_object);
			
    	$this->getResponse()
             ->setHttpResponseCode(201);
    }
}