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

}