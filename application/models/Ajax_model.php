<?php


class Ajax_model extends CI_Model {
	
	
	
	
	 public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    private function _get_datatables_query($tbl,$co,$cs,$o)
    {
         
        $this->db->from($tbl);
 
        $i = 0;
     
        foreach ($cs as $item) // loop column 
        {
            if(isset($_POST['search']['value'])) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($cs) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($co[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($o))
        {
            $order = $o;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables($tbl,$co,$cs,$o)
    {
		//$this->$table =$tbl;
		//$this->$column_order =$co; 
		//$this->$column_search=$cs;
		//$this->$order=$o;
		
        $this->_get_datatables_query($tbl,$co,$cs,$o);
		if(isset( $_POST['length']))
			if($_POST['length'] != -1)
				if(isset( $_POST['start']))
					$this->db->limit($_POST['length'], $_POST['start']);
					$query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered($tbl,$co,$cs,$o)
    {
		//$this->$table =$tbl;
		///$this->$column_order =$co; 
		//$this->$=$cs;
		//$this->$order=$o;
		
		
        $this->_get_datatables_query($tbl,$co,$cs,$o);
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all($tbl,$co,$cs,$o)
    {
		///$this->$table =$tbl;
		//$this->$column_order =$co; 
		//$this->$column_search=$cs;
		//$this->$order=$o;
		
        $this->db->from($tbl);
        return $this->db->count_all_results();
    }
	
	
	private function join_get_datatables_query($tbl1,$tbl2,$on,$co,$cs,$o)
    {
         
        $this->db->from($tbl1);
		$this->db->join($tbl2, $on,'left');
 
        $i = 0;
     
        foreach ($cs as $item) // loop column 
        {
            if(isset($_POST['search']['value'])) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($cs) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($co[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($o))
        {
            $order = $o;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_join_datatables($tbl1,$tbl2,$on,$co,$cs,$o)
    {
		//$this->$table =$tbl;
		//$this->$column_order =$co; 
		//$this->$column_search=$cs;
		//$this->$order=$o;
		
        $this->join_get_datatables_query($tbl1,$tbl2,$on,$co,$cs,$o);
		if(isset( $_POST['length']))
			if($_POST['length'] != -1)
				if(isset( $_POST['start']))
					$this->db->limit($_POST['length'], $_POST['start']);
					$query = $this->db->get();
        return $query->result();
    }
 
    function count_join_filtered($tbl1,$tbl2,$on,$co,$cs,$o)
    {
		//$this->$table =$tbl;
		///$this->$column_order =$co; 
		//$this->$=$cs;
		//$this->$order=$o;
		
		
        $this->join_get_datatables_query($tbl1,$tbl2,$on,$co,$cs,$o);
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all_join($tbl1,$tbl2,$on,$co,$cs,$o)
    {
		///$this->$table =$tbl;
		//$this->$column_order =$co; 
		//$this->$column_search=$cs;
		//$this->$order=$o;
		
        $this->db->from($tbl1);
		$this->db->join($tbl2, $on,'left');
        return $this->db->count_all_results();
    }
	
	
	
 
	
}