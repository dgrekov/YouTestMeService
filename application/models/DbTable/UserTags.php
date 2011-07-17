<?php

class Application_Model_DbTable_UserTags extends Zend_Db_Table_Abstract
{

    protected $_name = 'usertags';
	protected $_primary = array('userid','tagid');


}

