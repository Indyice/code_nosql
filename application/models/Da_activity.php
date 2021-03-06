<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//เชื่อมต่อ mongoDB
class Da_activity extends CI_Model{
    private $database = 'nosqldemo';
	private $collection = 'act';
	private $collection2 = 'ams';
	private $conn;//ตัวแปรสำหรับ connect database

	function __construct() {
		parent::__construct();
		$this->load->library('mongodb');
		$this->conn = $this->mongodb->getConn();
	}

	function create_activity($act_name, $act_point){
		try{
			$act = array(
				'act_name' => $act_name,
				'act_point' => $act_point,
				'act_status' => 0,
				'ach_id' => '',
				'act_sta_use' => 0,
			);

			$query = new MongoDB\Driver\BulkWrite();
			$query->insert($act);

			$result = $this->conn->executeBulkWrite($this->database.'.'.$this->collection, $query);
			if($result == 1){
				return true;
			}
			return false;
		}
		catch(MongoDB\Driver\Exception\RuntimeException $ex){
			show_error('Error while saving users: ' . $ex->getMessage(), 500);
		}
	}

	function update_activity($_id, $act_name, $act_point) {
		try {
			$query = new MongoDB\Driver\BulkWrite();
			$query->update(['_id' => new MongoDB\BSON\ObjectId($_id)], ['$set' => array('act_name' => $act_name, 'act_point' => $act_point)]);

			$result = $this->conn->executeBulkWrite($this->database.'.'.$this->collection, $query);

			if($result == 1) {
				return TRUE;
			}

			return FALSE;
		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while updating users: ' . $ex->getMessage(), 500);
		}
	}

	function delete_activity($_id) {
		try {
			$query = new MongoDB\Driver\BulkWrite();
			$query->update(['_id' => new MongoDB\BSON\ObjectId($_id)], ['$set' => array('act_status' => 2)]);

			$result = $this->conn->executeBulkWrite($this->database.'.'.$this->collection, $query);

			if($result == 1) {
				return TRUE;
			}

			return FALSE;
		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while updating users: ' . $ex->getMessage(), 500);
		}
	}
	/*
    * update_status
    * update status Activity
    * @input parameter 0, 1, ex. 0 = Pending, 1 = Succeed
    */
	public function update_status_activity($_id,$status_number)
    {
        try {
			$query = new MongoDB\Driver\BulkWrite();
			$query->update(['_id' => new MongoDB\BSON\ObjectId($_id)], ['$set' => array('act_status' => $status_number)]);

			$result = $this->conn->executeBulkWrite($this->database.'.'.$this->collection, $query);

			if($result) {
				return TRUE;
			}

			return FALSE;
		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while updating users: ' . $ex->getMessage(), 500);
		}
    }

	public function update_status_use_activity($_id){
        try {
			$query = new MongoDB\Driver\BulkWrite();
			$query->update(['_id' => new MongoDB\BSON\ObjectId($_id)], ['$set' => array('act_sta_use' => 1)]);

			$result = $this->conn->executeBulkWrite($this->database.'.'.$this->collection, $query);

			if($result) {
				return TRUE;
			}

			return FALSE;
		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while updating users: ' . $ex->getMessage(), 500);
		}
    }

	public function update_re_status_use_activity($_id){
        try {
			$query = new MongoDB\Driver\BulkWrite();
			$query->update(['_id' => new MongoDB\BSON\ObjectId($_id)], ['$set' => array('act_sta_use' => 0)]);

			$result = $this->conn->executeBulkWrite($this->database.'.'.$this->collection, $query);

			if($result) {
				return TRUE;
			}

			return FALSE;
		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while updating users: ' . $ex->getMessage(), 500);
		}
    }
	/*
    * add_ach_id
    * add id achievement
    * @input parameter 
    */
	public function add_id_achievement($_id,$ach_id)
    {
        try {
			$query = new MongoDB\Driver\BulkWrite();
			$query->update(['_id' => new MongoDB\BSON\ObjectId($_id)], ['$set' => array('ach_id' => $ach_id)]);

			$result = $this->conn->executeBulkWrite($this->database.'.'.$this->collection, $query);

			if($result) {
				return TRUE;
			}

			return FALSE;
		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while updating users: ' . $ex->getMessage(), 500);
		}
    }
	
}