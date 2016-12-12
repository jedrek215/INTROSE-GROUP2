<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Cont extends CI_Controller {

	function __construct(){

		parent::__construct();
		$this->load->model('Cal_Model');
		$this->load->model('SchoolYear_Model');
	}
	
	public function index()
	{
		$this->home();
	}

	public function home(){
		
		$query = $this->SchoolYear_Model->getSchoolYear();
		if($query){
			foreach($query as $row){
			$data = array('termID' => $row->termID,
 						  'SchoolYear' => $row->schoolyear,
						  'SchoolTerm' => $row->schoolterm,
						  'Start' => date('F d, Y', strtotime($row->start)),
						  'End' =>date('F d, Y', strtotime($row->end)));
			}
		}
		$this->load->view('include/AdminHead');
		$this->load->view('include/Nav_Admin', $data);
		$this->load->view('Calendar');
	}

	public function getEvents(){
		$query = $this->SchoolYear_Model->getSchoolYear();
		if($query){
			foreach($query as $row)
				$term = $row->termID;
		}

		$result = $this->Cal_Model->getActDates($term);

		if ($result){
			echo json_encode($result);
			
		}
	}

	public function getTermLong(){
		$result = $this->Cal_Model->getTerm();

		if ($result){
			
			echo json_encode($result);
			
		}
	}	

	public function newTerm(){

		$this->load->model('SchoolYear_Model', 'model');

		$data = array('schoolyear' => $this->input->post('year1'). '-' . $this->input->post('year2'),
					  'schoolterm' => $this->input->post('term'),
					  'start' => $this->input->post('datePicker1'),
					  'end' =>$this->input->post('datePicker2'));

       $this->db->insert('yearterm', $data);

    }

  

}
?>