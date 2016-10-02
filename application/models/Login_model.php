<?php
class Login_model extends CI_Model
{
    public function _construct()
    {
		parent::_construct();
	}
	/*
		*
	*/
	public function checkLogin($username,$password)
	{
		
		$this->load->library('session');

		try
		{
			$this->load->database();
			$this->db->select("*");
			$this->db->from("user");
			$this->db->where("uname", $username);
			
			$query=$this->db->get();
			$query->result();

			foreach ($query->result() as $row){

				if($row->uname==$username && $row->upassword==$password){
					
					$newdata = array(
						'uname'  => $row->uname,
						'uid'     => $row->uid,
						'logged_in' => TRUE,
						'ulevel' => $row->ulevel,
						
					);

					$this->session->set_userdata($newdata);
					
					return True;
				}
				else
				{
					return false;
				}
				
			}
			return false;
		}
		catch(Exception $ex)
		{
			return FALSE;
		}
	}

    public function insert($data){
        $this->db->insert('user', $data); //insert the data
        
    }


	

	
    
}
?>