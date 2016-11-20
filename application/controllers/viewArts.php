<?php
 	viewArts extends CI_Controller{

	public function index()
	{
			$this->load->view('include/artsHead');
			$this->load->view('include/nav', $data);
			$this->load->view('arts', $data);
			$this->load->view('include/rootwizard', $data);
			$this->load->view('include/artsScript', $data);
	}
	
 	}
?>