<?php
class cashier_model extends CI_Model
{

	 public function _construct()
    {
		parent::_construct();
	}


public function loadOrderDetails(){

		$this->load->database();
		$this->db->select('*');
		$this->db->from('orders');
		$this->db->join('order_item','orders.oid = order_item.oid','left');
		$this->db->join('food','order_item.item_id = food.fid','left');

		$query = $this->db->get();
		return $query->result ();


}

public function updateOrderStatus($id,$data){

		  $this->load->database();
		  $this->db->where('oid',$id);
		  $this->db->update('orders',$data);
	}

public function rejectOrder($id){

		$this->load->database();
		$this->db->where('oid', $id);
 	    $this->db->delete('orders');

}	



}