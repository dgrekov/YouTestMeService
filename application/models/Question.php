<?php

class Application_Model_Question extends Dimagre_Model_Base
{
    public $title;
    public $text;
    public $answer;
    public $userid;
    public $flags;
	public $active;
	public $tag;
    public $id;
 
    public function setTitle($var)
    {
        $this->title = (string) $var;
        return $this;
    }
 
    public function getTitle()
    {
        return $this->title;
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

    public function setAnswer($var)
    {
        $this->answer = (string) $var;
        return $this;
    }
 
    public function getAnswer()
    {
        return $this->answer;
    }
 
    public function setUserId($var)
    {
        $this->userid = $var;
        return $this;
    }
 
    public function getUserId()
    {
        return $this->userid;
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
    public function setTag($var)
    {
        $this->tag = $var;
        return $this;
    }
 
    public function getTag()
    {
        return $this->tag;
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

