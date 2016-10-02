<?php
class Order_model extends CI_Model
{
    public function _construct()
    {
		parent::_construct();
	}
	/*
		*get pending and to deliver order count
	*/
 	public function getpendingcount(){

 		$this->load->database();
 		$this->db->select('COUNT(*) as count');
        $this->db->from('orders');
        $this->db->where('deliver =0 and status=0');
        $query = $this->db->get();
        return $query->result();

 	}

	

	
    
}
?>