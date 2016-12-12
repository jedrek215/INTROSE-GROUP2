<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Org_Cont extends CI_Controller {

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
		
					$this->home();		
	}

	public function home(){
		$this->load->model('Dash_Model', 'model');
		$this->load->model('SchoolYear_Model');

		if ($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$org = $session_data['username'];
	
		$query = $this->SchoolYear_Model->getSchoolYear();
		if($query){
			foreach($query as $row){
			$data = array('termID' => $row->termID,
						  'SchoolYear' => $row->schoolyear,
						  'SchoolTerm' => $row->schoolterm,
						  'Start' => date('F d, Y', strtotime($row->start)),
						  'End' =>date('F d, Y', strtotime($row->end)));
			$term = $row->termID;
			}
		}
		$data['approved'] = $this->model->getActivitiyCount($org, 'approved', $term);
		$data['pending']= $this->model->getActivitiyCount($org, 'pending', $term);
		$data['late_approved']= $this->model->getActivitiyCount($org, 'late approved', $term);
		$data['denied']= $this->model->getActivitiyCount($org, 'denied', $term);

		$data['Academic'] = $this->model->get60_40Ratio($org,'Academic', $term);
		$data['nonAcademic'] = $this->model->get60_40Ratio($org,'non-Academic', $term);

		$data['pushed'] = $this->model->getPushedThrough($org, 'pushed', $term);
		$data['notpushed'] = $this->model->getPushedThrough($org, 'not-pushed', $term);

		$data['Within'] = $this->model->getTimeIn($org, 'Within', $term);
		$data['notWithin'] = $this->model->getTimeIn($org, 'not-Within', $term);

		//$object = $data['approved'][0];
		$data['orgName'] = $org;

	//	$data['org'] = $this->model->getAllOrgs();
		$this->load->view('include/MainHead');
		$this->load->view('include/Nav_Org', $data);
		$this->load->view('Main', $data);
		}
		else{
			redirect('Login', 'refresh');
		}
	}

	
}
