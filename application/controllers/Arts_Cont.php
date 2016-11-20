<?php 

Class Arts_Cont extends CI_Controller{


	public function index()
	{
		$this->home();
	}

	public function home(){
		$this->load->model('dash_model', 'model');

		if ($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$org = $session_data['username'];
				$data['orgName'] = $org;

				$this->load->view('include/artsHead');
				$this->load->view('include/nav', $data);
				$this->load->view('arts', $data);
			}

	}



}
?>