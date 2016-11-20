<?php 

Class dts_Cont extends CI_Controller{


	public function index()
	{

		if($this->input->post('search') == NULL)
			$this->home();
		else{
			$filterby =    $this->input->post('search_param');
			$text = $this->input->post('x');
			$this->filter($filterby, $text);
		}

	}

	public function home(){
		$this->load->model('dts_model', 'model');

		if ($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$org = $session_data['username'];
	

		$data['dts'] = $this->model->getActivities($org);
		
		//$object = $data['approved'][0];
		$data['orgName'] = $org;

	//	$data['org'] = $this->model->getAllOrgs();
		$this->load->view('include/dtsHead');
		$this->load->view('include/nav',$data);
		$this->load->view('dts', $data);
		}
		else{
			redirect('Login', 'refresh');
		}
		

	}

	public function filter($filterby , $text){
		$this->load->model('dts_model', 'model');
		
		

		if ($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$org = $session_data['username'];

		if($filterby == "SubmissionType"){
			$data['dts'] = $this->model->getActivitiesSTfilter($org, $text);
			if($data['dts'] == NULL)
				$data['dts'] = $this->model->getActivities($org);
		}
		else if($filterby == "Status"){
			$data['dts'] = $this->model->getActivitiesStatfilter($org, $text);
			if($data['dts'] == NULL)
				$data['dts'] = $this->model->getActivities($org);
		}
		else{
			$data['dts'] = $this->model->getActivitiesStatfilter($org, $text);
			if($data['dts'] == NULL){
				$data['dts'] = $this->model->getActivitiesSTfilter($org, $text);
			}
			if($data['dts'] == NULL){
				$data['dts'] = $this->model->getActivitiesTitlefilter($org, $text);
			}
			if($data['dts'] == NULL){
				
				$data['dts'] = $this->model->getActivities($org);
			}
		
		}

		//$object = $data['approved'][0];
		$data['orgName'] = $org;

	//	$data['org'] = $this->model->getAllOrgs();
		$this->load->view('include/dtsHead');
		$this->load->view('include/nav',$data);
		$this->load->view('dts', $data);
		}
		else{
			redirect('Login', 'refresh');
		}
		

	}




}
?>