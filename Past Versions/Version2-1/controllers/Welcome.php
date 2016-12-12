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
		
					$this->home();		
	}

	public function home(){
		$this->load->model('Dash_Model', 'model');

		if ($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$org = $session_data['username'];
	

		$data['approved'] = $this->model->getActivitiyCount($org, 'approved');
		$data['pending']= $this->model->getActivitiyCount($org, 'pending');
		$data['late_approved']= $this->model->getActivitiyCount($org, 'late approved');
		$data['denied']= $this->model->getActivitiyCount($org, 'denied');

		$data['Academic'] = $this->model->get60_40Ratio($org,'Academic');
		$data['nonAcademic'] = $this->model->get60_40Ratio($org,'non-Academic');

		$data['pushed'] = $this->model->getPushedThrough($org, 'pushed');
		$data['notpushed'] = $this->model->getPushedThrough($org, 'not-pushed');

		$data['Within'] = $this->model->getTimeIn($org, 'Within');
		$data['notWithin'] = $this->model->getTimeIn($org, 'not-Within');

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
