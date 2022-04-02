<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//เชื่อมต่อ mongoDB
class Da_achievement extends CI_Model{
    private $database = 'nosqldemo';
	private $collection = 'ams';
	private $conn;//ตัวแปรสำหรับ connect database

	function __construct() {
		parent::__construct();
		$this->load->library('mongodb');
		$this->conn = $this->mongodb->getConn();
	}

	function create_achievement($ach_name, $ach_point, $act_id){
		try{
			$ams = array(
				'ach_name' => $ach_name,
				'ach_point' => $ach_point,
				'ach_status' => 0,
				'act_id' => $act_id,
			);

			$query = new MongoDB\Driver\BulkWrite();
			$query->insert($ams);

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

	function update_achievement($_id, $ach_name, $ach_point) {
		try {
			$query = new MongoDB\Driver\BulkWrite();
			$query->update(['_id' => new MongoDB\BSON\ObjectId($_id)], ['$set' => array('ach_name' => $ach_name, 'ach_point' => $ach_point)]);

			$result = $this->conn->executeBulkWrite($this->database.'.'.$this->collection, $query);

			if($result == 1) {
				return TRUE;
			}

			return FALSE;
		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while updating users: ' . $ex->getMessage(), 500);
		}
	}

	function delete_achievement($_id) {
		try {
			$query = new MongoDB\Driver\BulkWrite();
			$query->update(['_id' => new MongoDB\BSON\ObjectId($_id)], ['$set' => array('ach_status' => 2)]);

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
    * update_status_achievement
    * update status achievement
    * @input parameter 0, 1, ex. 0 = Pending, 1 = Succeed
    */
	public function update_status_achievement($_id,$status_number)
    {
        try {
			$query = new MongoDB\Driver\BulkWrite();
			$query->update(['_id' => new MongoDB\BSON\ObjectId($_id)], ['$set' => array('ach_status' => $status_number)]);

			$result = $this->conn->executeBulkWrite($this->database.'.'.$this->collection, $query);

			if($result == 1) {
				return TRUE;
			}

			return FALSE;
		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while updating users: ' . $ex->getMessage(), 500);
		}
    }

}