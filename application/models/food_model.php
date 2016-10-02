<?php
class food_model extends CI_Model
{
    public function _construct()
    {
		parent::_construct();
                $this->load->database();
	}
	/*
		*insert patient data to patient table
	*/
	
	public function insert_food_item($data){
		try{
		
		$this->load->database();
		$this->db->insert('food', $data);
		}catch(Exception $e){
			
			return -1;
		}
	}
        
         function getFoodData(){
             $this->load->database();
              $this->db->select("*");
              $this->db->from('food');
              $this->db->where('fquty > 0');
              $query = $this->db->get();
              return $query->result();
            }

}
?>
