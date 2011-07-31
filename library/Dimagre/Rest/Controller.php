<?php

class Dimagre_Rest_Controller extends Zend_Rest_Controller
{
	protected $_objectMapper;
	protected $_object;
	protected $_logger;
		/*
	public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        // save this for later
        $apiKey = $request->getHeader('apikey');

        if ($apiKey != 'secret') {
            $this->getResponse()
                    ->setHttpResponseCode(403)
                    ->appendBody("Invalid API Key\n")
                    ;
            $request->setModuleName('default')
                        ->setControllerName('error')
                        ->setActionName('access')
                        ->setDispatched(true);

        }

    }	
		*/
	public function init()
    {
        $this->_logger = Zend_Registry::get('logger');	
			
        $userMapper = new Application_Model_UserMapper();
		$user = new Application_Model_User();
		
        $bootstrap = $this->getInvokeArg('bootstrap');
		$config = $bootstrap->getOptions();
		$contextSwitch = $this->_helper->getHelper('contextSwitch');
		$contextSwitch->addActionContext('index', 'json')
					  ->addActionContext('get', 'json')
					  ->addActionContext('post', 'json')
					  ->addActionContext('put', 'json')
					  ->addActionContext('delete', 'json')
					 // ->addActionContext('error', 'json')
					  ->initContext('json');
		$this->view->success = true;
		$this->view->version = $config['api']['version'];
		
		$this->getResponse()
             ->setHttpResponseCode(200);
		$this->view->deviceID = $this->getRequest()->getHeader("X-DIMAGRE-DEVICEID");
		$userMapper->getByDeviceId($this->view->deviceID, $user);
		Zend_Registry::set('deviceID',$user->getDeviceId());
		Zend_Registry::set('userID',$user->getID());
		$this->view->userid = $user->getID();
		$this->_initModels();
    }
    
    public function _initModels(){}

    public function indexAction()
    {
    	$this->fail();
    }

    public function getAction()
    {
    	$this->fail();
    }
    
    public function postAction()
    {
    	$this->fail();
    }
	
	public function putAction()
    {
    	$this->fail();
    }
    
    public function deleteAction()
    {
    	$this->fail();
    }
	
	private function fail(){
		$this->getResponse()
             ->setHttpResponseCode(501);
		$this->view->success = false;
	}
	
}
