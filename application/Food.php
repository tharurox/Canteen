<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Food extends CI_Controller {
    
    function __construct() {
            parent::__construct();
            $this->load->model('food_model');
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
        } 
    
    public function showFoods()
	{
		$this->load->view('Header');
                $this->load->view('Sidebar');
                $data['fooddata'] = $this->food_model->getFoodData();
                $this->load->view('food/foodsView',$data);
                $this->load->view('Footer');
	}
    
    public function addNewFood()
	{
                $this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->view('Header');
                $this->load->view('Sidebar');
                $this->load->view('food/addNewFood');
                $this->load->view('Footer');
	}
    
        public function saveFoodData() {
            
            $time = time();
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '2048';
            $config['max_width'] = '0';
            $config['max_height'] = '0';
            $config['remove_spaces'] = TRUE;
            $new_name = 'image'.$time; 
            $config['file_name'] = $new_name;
            $file_name = $_FILES['file_upload']['name'];


            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('file_upload')) 
            {
                $error = array('error' => $this->upload->display_errors());
                echo $error['error'];
            }

            $data_upload_files = $this->upload->data();
            $image = $data_upload_files['file_name'];
            
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('foodname', 'Food Name', 'required|regex_match[/^[a-z .,\-]+$/i]');
            $this->form_validation->set_rules('foodprice', 'Food Price', 'required|decimal');
            $this->form_validation->set_rules('foodquantity', 'Quantity', 'required|integer');
            if ($this->form_validation->run() == FALSE) {
                        $this->load->view('food/foodForm');
            }
            else{
//                $time = time();
//                $config['upload_path'] = './uploads/';
//		$config['allowed_types'] = 'jpg|jpeg|png|gif';
//		$config['max_size'] = '2048';
//		$config['max_width'] = '0';
//		$config['max_height'] = '0';
//		$config['remove_spaces'] = TRUE;
//		$new_name = 'image'.$time; 
//		$config['file_name'] = $new_name;
//		$filename = $_FILES['file_upload']['name'];
//		
//		
//		$this->load->library('upload');
//		$this->upload->initialize($config);
//		if (!$this->upload->do_upload('file_upload')) 
//		{
//                    $error = array('error' => $this->upload->display_errors());
//                    echo $error['error'];
//		}
//		
//		$data_upload_files = $this->upload->data();
//		$image = $data_upload_files['file_name'];
                
                $data = array(
                    'fname' => $this->input->post('foodname'),
                    'fprice' => $this->input->post('foodprice'),
                    'fquty'=>$this->input->post('foodquantity'),
                    'fimage'=>$image,
                );
                $this->food_model->insert_food_item($data);
                $data['message'] = "Food Details Are Successfully Inserted";
                $this->load->view('food/foodForm',$data);
            }
        }

}
