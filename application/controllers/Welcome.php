<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->view('Header');
                $this->load->view('Sidebar');
                $this->load->view('Page');
                $this->load->view('Footer');
	}
        
        
        public function froms(){
            $this->load->view('Header');
            $this->load->view('Sidebar');
            $this->load->view('Froms');
            $this->load->view('Footer');
            
            
        }
        
        public function datatable(){
            
            $this->load->view('Header');
            $this->load->view('Sidebar');
            $this->load->view('Datatable');
            $this->load->view('Footer');
            
        }
}
