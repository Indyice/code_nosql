<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once 'Da_activity.php';

class M_activity extends Da_activity{
    private $database = 'nosqldemo';
	private $collection = 'act';
	private $conn;//ตัวแปรสำหรับ connect database

	function __construct() {
		parent::__construct();
		$this->load->library('mongodb');
		$this->conn = $this->mongodb->getConn();
	}
    
	function get_activity_list() {
		try {
			$filter = [];
			$query = new MongoDB\Driver\Query($filter);

			$result = $this->conn->executeQuery($this->database.'.'.$this->collection, $query);

			return $result;
		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while fetching users: ' . $ex->getMessage(), 500);
		}
	}
	
	function get_activity($_id) {
		try {
			$filter = ['_id' => new MongoDB\BSON\ObjectId($_id)];
			$query = new MongoDB\Driver\Query($filter);

			$result = $this->conn->executeQuery($this->database.'.'.$this->collection, $query);

			foreach($result as $array_act) {
				return $array_act;
			}

			return NULL;
		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while fetching user: ' . $ex->getMessage(), 500);
		}
	}
}