<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
	public function index()
	{

	}
        
     /*
		*show view of create customer
     */   
    public function createCustomer(){
            $this->load->view('Header');
            //$this->load->view('Sidebar');
            $this->load->view('User/Create');
            $this->load->view('Footer');
            
            
    }

    public function validate(){
    	$this->load->database();


    		$data=array('success'=>false,'messages'=>array());
			$this->load->library("form_validation");
			$this->load->helper(array('form', 'url')); // validate the form
			$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]|max_length[32]');
			$this->form_validation->set_rules('uname', 'User name', 'trim|required|max_length[50]|is_unique[user.uname]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[32]|matches[conpassword]');
			$this->form_validation->set_rules('conpassword', 'Confirm Password', 'trim|required|min_length[6]|max_length[32]|matches[password]');
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

		if ($this->form_validation->run() == FALSE) {
			//print_r($_POST);
			foreach($_POST as $key =>$value){
			$data['messages'][$key]=form_error($key);
			}
		}
		else{
			$senddata= array(
				'name'=>$this->input->post('name'),
				'uname'=>$this->input->post('uname'),
				'upassword'=>$this->input->post('password'),
				'ulevel'=>'3'
				);
    		$this->load->model('Login_model','login');	
			
			$this->login->insert($senddata);
    			$data['success']=true;

		}

		echo json_encode($data);
        

	}



}
