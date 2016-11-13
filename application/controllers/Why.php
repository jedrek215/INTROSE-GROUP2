<?php

class Why extends CI_Controller {

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
		$this->load->model('modellang');

		$org = 'JEMA';

		$data['approved'] = $this->model->getActivitiyCount($org, 'approved');
		$data['pending']= $this->model->getActivitiyCount($org, 'pending');
		$data['late_approved']= $this->model->getActivitiyCount($org, 'late approved');
		$data['denied']= $this->model->getActivitiyCount($org, 'denied');

		$data['Academic'] = $this->model->get60_40ratio($org,'Academic');
		$data['nonAcademic'] = $this->model->get60_40ratio($org,'non-Academic');
		//$object = $data['approved'][0];
		

	//	$data['org'] = $this->model->getAllOrgs();
		$this->load->view('main', $data);

	}

	public function dts(){
		$this->load->view('pages/dts');
	}
}
