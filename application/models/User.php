<?php

class Application_Model_User extends Dimagre_Model_Base
{
    protected $_deviceid;
	protected $_username;
    protected $_facebookid;
    protected $_twitterid;
	protected $_active;
    protected $_id;
 
    public function setUserName($var)
    {
        $this->_username = (string) $var;
        return $this;
    }
 
    public function getUserName()
    {
        return $this->_username;
    }
 
    public function setDeviceId($var)
    {
        $this->_deviceid = (string) $var;
        return $this;
    }
 
    public function getDeviceId()
    {
        return $this->_deviceid;
    }
 
    public function setFacebookId($var)
    {
        $this->_facebookid = (string) $var;
        return $this;
    }
 
    public function getFacebookId()
    {
        return $this->_facebookid;
    }
 
    public function setTwitterId($var)
    {
        $this->_twitterid = $var;
        return $this;
    }
 
    public function getTwitterId()
    {
        return $this->_twitterid;
    }
 
    public function setActive($var)
    {
        $this->_active = $var;
        return $this;
    }
 
    public function getActive()
    {
        return $this->_active;
    }
 
    public function setId($var)
    {
        $this->_id = (int) $var;
        return $this;
    }
 
    public function getId()
    {
        return $this->_id;
    }
}

