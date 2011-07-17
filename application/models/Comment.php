<?php

class Application_Model_Comment extends Dimagre_Model_Base
{
    public $userid;
    public $questionid;
    public $text;
    public $flags;
    public $created;
	public $active;
    public $id;
 
    public function setUserId($var)
    {
        $this->userid = (string) $var;
        return $this;
    }
 
    public function getUserId()
    {
        return $this->userid;
    }

    public function setQuestionId($var)
    {
        $this->questionid = (string) $var;
        return $this;
    }
 
    public function getQuestionId()
    {
        return $this->quesitonid;
    }
    public function setText($var)
    {
        $this->text = (string) $var;
        return $this;
    }
 
    public function getText()
    {
        return $this->text;
    }
    public function setFlags($var)
    {
        $this->flags = $var;
        return $this;
    }
 
    public function getFlags()
    {
        return $this->flags;
    }
    public function getCreated()
    {
        return $this->created;
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

