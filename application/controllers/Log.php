<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {

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
	{	$this-> checkLoginowner();
		$this->load->view('AdminHeader');
        $this->load->view('Sidebar');
        $this->load->view('Administrator/Log_view');
        $this->load->view('Footer');
	}

	/*
		*ajax respose for user log activity
	*/
		public function getactivity(){

		
		$this->load->model('Ajax_select_where_model','Ajax');
		$select='*';
		$table1 ='user_activity , user';
		$where='uid=user_id';
		$column_order =array('id', 'uname', 'date_time', 'act_status'); 
		$column_search=array('id', 'uname', 'date_time', 'act_status'); ;
		$order=array('date_time'=>'desc');
		
		$list = $this->Ajax->get_datatables($table1,$select,$where,$column_order,$column_search,$order);
        $data = array();
       $no=0;
	 
	  // print_r($list);
        foreach ($list as $adv) {
            //$no++;
            $row = array();

            $row[] = $adv->id;
            $row[] = $adv->uname;
            $row[] = $adv->date_time;
            $row[] = $adv->act_status;		
            $data[] = $row;
        }
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Ajax->count_all($table1,$select,$where,$column_order,$column_search,$order),
                        "recordsFiltered" => $this->Ajax->count_filtered($table1,$select,$where,$column_order,$column_search,$order),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}
	/*
		*check ownder is loged
	*/
	private function checkLoginowner()
	{
		if($this->session->userdata('ulevel') != 1) //check logged admin user
		{
			$this->session->sess_destroy(); //if not destry session and redirect to home page
			redirect('', 'refresh');
		}
		return true;
	}
        

}
