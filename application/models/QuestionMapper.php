<?php

class Application_Model_QuestionMapper extends Dimagre_Model_BaseMapper
{
 
    public function __construct()
	{
	     $this->setDbTable('Application_Model_DbTable_Question');
	}
	
    public function flag($id){
    	$question = new Application_Model_Question();
		$this->find($id, $question);
		$flags = $question->getFlags();
		$flags == null?$flags = 1:$flags++;
		$question->setFlags($flags);
		$this->save($question);
    }
    public function mark($id){
    	$this->setDbTable('Application_Model_DbTable_Marked');	
        $table = $this->getDbTable();
        $this->unmark($id);
		$data = array(
			'userid' => Zend_Registry::get('userID'),
			'questionid' => $id
		);
		$table->insert($data);
    }
    public function unmark($id){
    	$this->setDbTable('Application_Model_DbTable_Marked');	
        $table = $this->getDbTable();
		$where = $table->getAdapter()->quoteInto('userid = ? ', Zend_Registry::get('userID'));
		$where .= $table->getAdapter()->quoteInto('AND questionid = ?', $id);
        $select = $table->delete($where);
    }
    public function isMarked($id){
    	$this->setDbTable('Application_Model_DbTable_Marked');	
        $table = $this->getDbTable();
		$where = $table->getAdapter()->quoteInto('userid = ? ', Zend_Registry::get('userID'));
		$where .= $table->getAdapter()->quoteInto('AND questionid = ?', $id);
		$select = $table->select()
		 				 ->where($where);
        $result = $table->fetchAll($select);
		return count($result)>0?true:false;
    }
    public function save(Application_Model_Question $question)
    {
        $data = array(
            'userid'   => Zend_Registry::get('userID'),
            'title' => $question->getTitle(),
            'text' => $question->getText(),
            'answer' => $question->getAnswer(),
            'flags' => $question->getFlags(),
            'tagid' => $question->getTag()
        );
 		$this->commitRecord($question, $data);
    }
 
	public function find($id, Application_Model_Question $question)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $question->setId($row->id)
                  ->setUserId($row->userid)
				  ->setTitle($row->title)
                  ->setText($row->text)
				  ->setAnswer($row->answer)
                  ->setFlags($row->flags)
				  ->setTag($row->tagid)
				  ->setActive($row->active);
    }
 
    public function fetchAll()
    {
        $this->setDbTable('Application_Model_DbTable_FilteredQuestion');	
        $table = $this->getDbTable();
        $select = $table->select();
		$select->order('created DESC');	
        $resultSet = $table->fetchAll($select);
        $resultSet = $this->_cleanResultSet($resultSet);
        return $this->_assembleResult($resultSet);
    }
	public function fetchMine()
    {
        $this->setDbTable('Application_Model_DbTable_FilteredQuestion');	
        $table = $this->getDbTable();
        $select = $table->select();
		$select->where('userid = ?', Zend_Registry::get('userID'))
			   ->order('created DESC');	
        $resultSet = $table->fetchAll($select);
        $resultSet = $this->_cleanResultSet($resultSet);
        return $this->_assembleResult($resultSet);
    }
	public function fetchMarked()
    {
        $this->setDbTable('Application_Model_DbTable_MarkedQuestion');
        $table = $this->getDbTable();
        $select = $table->select()
					 ->where('userid = ?', Zend_Registry::get('userID'))
					 ->order('created DESC');
        $resultSet = $table->fetchAll($select);
        return $this->_assembleResult($resultSet);
    }
	
	private function _assembleResult($resultSet){
		$entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Question();
            $entry->setId($row->id)
                  ->setUserId($row->userid)
				  ->setTitle($row->title)
                  ->setText($row->text)
				  ->setAnswer($row->answer)
                  ->setFlags($row->flags)
				  ->setTag($row->tag)
				  ->setActive($row->active);
            $entries[] = $entry;
        }
        return $entries;
	}
	
	private function _cleanResultSet($resultSet){
		$newResultSet = array();
		$this->setDbTable('Application_Model_DbTable_UserTags');
        $table = $this->getDbTable();
        $select = $table->select()
					 ->where('userid = ?', Zend_Registry::get('userID'));
        $tags = $table->fetchAll($select);
		foreach ($resultSet as $row) {
			foreach($tags as $tag){
				if($row->tag == $tag->tagname){
					array_push($newResultSet,$row);
				}
			}
		}
		
		return $newResultSet;
	}
}

