<?php

class Application_Model_UserMapper extends Dimagre_Model_BaseMapper
{
 
    public function __construct()
	{
	     $this->setDbTable('Application_Model_DbTable_User');
	}
	
    public function save(Application_Model_User $user)
    {
        $data = array(
            'deviceid'   => $user->getDeviceId()
        );
 
        if (null === ($id = $user->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }
 
	public function getByDeviceId($id, Application_Model_User $user)
    {
        $table = $this->getDbTable();
		$result = $table->fetchRow(
					$table->select()
						  ->where('deviceid = ?',$id));
        if (0 == count($result)) {
            $user->setDeviceId($id);
			$this->save($user);
        }else{
	        $row = $result;
	        $user->setId($row->id)
				 ->setUserName($row->username)
	             ->setDeviceId($row->deviceid)
	             ->setFacebookId($row->facebookid)
	             ->setTwitterId($row->twitterid)
				 ->setActive($row->active);
		}
    }
 
    
}

