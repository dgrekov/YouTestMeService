<?php

class Application_Model_TagMapper extends Dimagre_Model_BaseMapper
{
 
    public function __construct()
	{
	     $this->setDbTable('Application_Model_DbTable_Tag');
	}
	
    public function fetchAll()
    {
        $table = $this->getDbTable();
        $select = $table->select()
						->order('name');	
        $resultSet = $this->getDbTable()->fetchAll($select);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Tag();
            $entry->setId($row->id)
                  ->setName($row->name)
				  ->setActive($row->active);
            $entries[] = $entry;
        }
        return $entries;
    }
}

