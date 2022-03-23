<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//เชื่อมต่อ mongoDB
class Da_activity extends CI_Model{
    private $database = 'nosqldemo';
	private $collection = 'act';
	private $conn;//ตัวแปรสำหรับ connect database

	function __construct() {
		parent::__construct();
		$this->load->library('mongodb');
		$this->conn = $this->mongodb->getConn();
	}

	function create_activity($ach_id,$act_name, $act_point){
		try{
			$act = array(
				'ach_id' => $ach_id,
				'act_name' => $act_name,
				'act_point' => $act_point,
				'act_status' => 0,
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
}