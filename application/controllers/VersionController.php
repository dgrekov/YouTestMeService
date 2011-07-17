<?php
 
class VersionController extends Zend_Rest_Controller
{  
	public function init()
    {
        $bootstrap = $this->getInvokeArg('bootstrap');
 
		$options = $bootstrap->getOption('resources');
 
		$contextSwitch = $this->_helper->getHelper('contextSwitch');
		$contextSwitch->addActionContext('index', 'json')->initContext('json');
 
		$this->view->success = "true";
		$this->view->version = "1.0";
	}
 
    /**
     * The index action handles index/list requests; it should respond with a
     * list of the requested resources.
     */ 
    public function indexAction()
    {
		$this->getResponse()
             ->setHttpResponseCode(200);
	}
 
    public function listAction()
    {
        $this->_forward('index');
    }
 
    public function getAction()
    {
		$this->_forward('index');
    }
 
    public function newAction() {   	
		$this->_forward('index');
    }
    public function postAction() {
		$this->_forward('index');
    }
    public function editAction() {    	 
		$this->_forward('index');
    }
    public function putAction() {
		$this->_forward('index');
    } 
    public function deleteAction() {
		$this->_forward('index');
    }
}