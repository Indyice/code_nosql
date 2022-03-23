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

	function create_achievement($ach_name, $ach_point){
		try{
			$ams = array(
				'ach_name' => $ach_name,
				'ach_point' => $ach_point,
				'ach_status' => 0,
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
			$query->delete(['_id' => new MongoDB\BSON\ObjectId($_id)]);

			$result = $this->conn->executeBulkWrite($this->database.'.'.$this->collection, $query);

			if($result == 1) {
				return TRUE;
			}

			return FALSE;
		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while deleting users: ' . $ex->getMessage(), 500);
		}
	}

}