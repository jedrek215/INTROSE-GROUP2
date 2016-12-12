<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Cont extends CI_Controller {

	public function index()
	{
		$this->home();
	}

	public function home(){
		$this->load->view('include/AdminHead');
		$this->load->view('include/Nav_Admin');
		$this->load->view('Calendar');
	}

}