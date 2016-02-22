<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testdev_model extends CI_Model {
	
	function __construct(){
		parent::__construct();
        $this->CI = get_instance();
	}
	
	public function getAllData($table){
		$this->db->from($table);
        return $this->db->get();
	}
	
	function DataListener($table,$limit,$offset,$search,$sortcol,$sortdir) {
        if ($search != '') {
           $this->db->where($search);  
        }
        
        if ($sortcol != '') {
            $this->db->order_by($sortcol,$sortdir);
        }	
        
        $this->db->select("*");
		$this->db->from($table);
		$this->db->limit($limit, $offset);
		return $this->db->get();
    }
	
	public function RowData($table,$search){
		if ($search != '') {
           $this->db->where($search);  
        }
		$this->db->from($table);
        return $this->db->get();
	}
	
	public function getDetailData($table,$where){
		$this->db->from($table);
		$this->db->where($where);
        return $this->db->get();
	}
	
	public function insertData($table,$data){
		$this->db->insert($table, $data);
        //return $this->db->insert_id();
	}
	
    public function updateData($table,$data,$where) {
        $this->db->where($where);
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }
}
