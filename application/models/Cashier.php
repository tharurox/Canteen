<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cashier extends CI_Controller {

	
	public function cashierVewOrder()
	{

				$this->load->model('cashier_model');
				$data['orders']=$this->cashier_model->loadOrderDetails();



				$this->load->view('Header');
                $this->load->view('Sidebar');
                $this->load->view('cashierViewOrder',$data);
                $this->load->view('Footer');
	}

public function accetOrderDetails(){

$this->load->helper('url');
$id = $this->uri->segment(3);
	
	$data = array(
  		'status'=> '2'
    );

	
	$this->load->model('cashier_model');
	$this->cashier_model->updateOrderStatus($id,$data);

	$newdata['orders']=$this->cashier_model->loadOrderDetails();



				$this->load->view('Header');
                $this->load->view('Sidebar');
                $this->load->view('cashierViewOrder',$newdata);
                $this->load->view('Footer');

}


public function rejectOrder(){

$this->load->helper('url');
$id = $this->uri->segment(3);


$this->load->model('cashier_model');
$this->cashier_model->rejectOrder($id);


$newdata['orders']=$this->cashier_model->loadOrderDetails();



				$this->load->view('Header');
                $this->load->view('Sidebar');
                $this->load->view('cashierViewOrder',$newdata);
                $this->load->view('Footer');
}



	}

