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
	
	protected function _initLogger() {
		$writer = new Zend_Log_Writer_Stream('C:\Program Files\Zend\Apache2\logs\output.log');
		$format = '%timestamp% %priorityName%: %message%' . PHP_EOL;
		$formatter = new Zend_Log_Formatter_Simple($format);
		$writer->setFormatter($formatter);
		$logger = new Zend_Log($writer);
		$logger->setTimestampFormat("d-M-Y H:i:s");
		Zend_Registry::set('logger', $logger);
	}
}

