<?php 

Class dts_Cont extends CI_Controller{


	public function index()
	{
		$this->home();
	}

	public function home(){
		$this->load->view('dts');

	}



}
?>