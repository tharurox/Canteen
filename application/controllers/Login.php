<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	/*
		*if user not login view login page
	*/
	public function index()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');
		//print_r($this->session->userdata());
		if(TRUE!=$this->session->userdata('logged_in')){
				$this->load->view('Login/Login');
		}

	}

	public function logout(){
		$this->session->sess_destroy();
	}
	/*
		*check the username and password
		*dirict to user dashborad
	*/
	public function loginCheck()
	{
		//$this->load->helper('url');
		//$this->load->view('login');
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			
		$this->index();
		} 
		else{
			
			$password = $this->input->post('password');
			$email = $this->input->post('username');
			
		
			if($this->checkPassword($email,$password)){
				//print_r($this->session->userdata());
				if(null!=$this->session->userdata('ulevel')){
					if($this->session->userdata('ulevel')=='1'){
						
						echo 'owner';
					
					}
					else if ($this->session->userdata('ulevel')=='2'){
						
						echo 'cashier';
					}else if ($this->session->userdata('ulevel')=='3'){
						
						echo 'customer';
					}
					
				}else{
				
					echo 'none';
				}
				
				
			}
			else{
				
				$this->index();
			}
		
		}
	}

	/*
		*check the username and password is correct or not
		*dirict to user dashborad
		*$username - @string
		*$password - @string
		*
	*/
	public function checkPassword($username,$password)
	{
		$this->load->model('Login_model','login');	
			
		if($this->login->checkLogin($username,$password))
		{
			
			return true;
		} 
		else
		{
			return false;
		}
	}


        
        

}
