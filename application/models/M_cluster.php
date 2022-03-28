<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once 'Da_cluster.php';

class M_cluster extends Da_cluster{
    private $database = 'nosqldemo';
	private $collection = 'cluster';
	private $conn;//ตัวแปรสำหรับ connect database

	function __construct() {
		parent::__construct();
		$this->load->library('mongodb');
		$this->conn = $this->mongodb->getConn();
	}
	
	function get_cluster($_id) {
		try {
			$filter = ['_id' => new MongoDB\BSON\ObjectId($_id)];
			$query = new MongoDB\Driver\Query($filter);

			$result = $this->conn->executeQuery($this->database.'.'.$this->collection, $query);

			foreach($result as $array_clu) {
				return $array_clu;
			}

			return NULL;
		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while fetching user: ' . $ex->getMessage(), 500);
		}
	}
}