<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//เชื่อมต่อ mongoDB
class Da_cluster extends CI_Model{
    private $database = 'nosqldemo';
	private $collection = 'cluster';

	private $conn;//ตัวแปรสำหรับ connect database

	function __construct() {
		parent::__construct();
		$this->load->library('mongodb');
		$this->conn = $this->mongodb->getConn();
	}
	
	public function update_point_cluster($_id,$point)
    {
        try {
			$query = new MongoDB\Driver\BulkWrite();
			$query->update(['_id' => new MongoDB\BSON\ObjectId($_id)], ['$set' => array('clu_point' => $point)]);

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