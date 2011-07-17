<?php

class Application_Model_Tag extends Dimagre_Model_Base
{
    public $name;
	public $active;
    public $id;
 
    public function setName($var)
    {
        $this->name = (string) $var;
        return $this;
    }
 
    public function getName()
    {
        return $this->name;
    }

    public function setActive($var)
    {
        $this->active = $var;
        return $this;
    }
 
    public function getActive()
    {
        return $this->active;
    }
 
    public function setId($var)
    {
        $this->id = (int) $var;
        return $this;
    }
 
    public function getId()
    {
        return $this->id;
    }
}

