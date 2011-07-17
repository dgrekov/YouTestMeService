<?php

class Application_Model_CommentMapper extends Dimagre_Model_BaseMapper
{
 
    public function __construct()
	{
	     $this->setDbTable('Application_Model_DbTable_Comment');
	}
	
    public function save(Application_Model_Comment $item)
    {
        $data = array(
            'userid'   => Zend_Registry::get('userID'),
            'questionid' => $item->getQuestionId(),
            'text' => $item->getText(),
            'flags' => $item->getFlags(),
            'active' => $item->getActive()
        );
 		$this->commitRecord($item, $data);
    }
 
	public function fetchByQuestionId($questionid)
    {
        $table = $this->getDbTable();
        $select = $table->select();
		$select->where('questionid = ?', $questionid);	
        $resultSet = $table->fetchAll($select);
        return $this->_assembleResult($resultSet);
    }
	private function _assembleResult($resultSet){
		$entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Question();
            $entry->setId($row->id)
                  ->setUserId($row->userid)
                  ->setQuestionId($row->questionid)
                  ->setText($row->text)
                  ->setFlags($row->flags)
				  ->setCreated($row->created)
				  ->setActive($row->active);
            $entries[] = $entry;
        }
        return $entries;
	}
}

