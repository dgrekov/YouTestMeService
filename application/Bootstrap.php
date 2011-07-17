<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initAutoload()
    {
        require_once 'Zend/Loader/Autoloader.php';
		$loader = Zend_Loader_Autoloader::getInstance();
		$loader->registerNamespace('Dimagre_');

    } 
	protected function _initRestRoute()
	{
		date_default_timezone_set("America/Chicago");
		$this->bootstrap('frontController');
        $frontController = Zend_Controller_Front::getInstance();
        $restRoute = new Zend_Rest_Route($frontController);
        $frontController->getRouter()->addRoute('default', $restRoute);
	} 
}

