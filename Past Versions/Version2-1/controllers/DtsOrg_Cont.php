<?php 

Class DtsOrg_Cont extends CI_Controller{


	public function index()
	{

		if($this->input->post('search') == NULL)
			$this->home();
		else{
			$filterby =    $this->input->post('search_param');
			if($filterby == "filterby"){
				$text = $this->input->post('x');
			}
			else{
				$text = $this->input->post('searchby');
			}
			$this->filter($filterby, $text);
		}

	}

	public function home(){
		$this->load->model('DtsOrg_Model', 'model');
		 $this->load->library('pagination');
		 $this->load->helper('url');

		if ($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$org = $session_data['username'];
	

			$data['dtssample'] = $this->model->getActivities($org, 0, 0);
			$data['orgName'] = $org;
			$this->setpagination($data);

			
			}
			else{
				redirect('Login', 'refresh');
			}
	}


	 public function setpagination($data)
    {

    	$count = sizeof($data['dtssample']);

        //pagination settings
        $config['base_url'] = site_url('DtsOrg_Cont/home');
        $config['total_rows'] = $count ;
        $config['per_page'] = "6";
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //call the model function to get the department data
        $data['dts'] = $this->model->getActivities($data['orgName'], $config["per_page"], $data['page']);           

        $data['pagination'] = $this->pagination->create_links();
        $data['text'] = NULL;


       	$this->load->view('include/DtsHead');
			$this->load->view('include/Nav_Org',$data);
			$this->load->view('DtsOrg', $data);
		
    }

    public function setpagination2($data, $text, $filterby)
    {

    	$count = sizeof($data['dtssample']);



        //pagination settings
        $config['base_url'] = site_url('DtsOrg_Cont/filter/'.$filterby.'/'.$text);
        $config['total_rows'] = $count ;
        $config['per_page'] = "6";
        $config["uri_segment"] = 5;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;



        //call the model function to get the department data
        if($filterby == "SubmissionType")
       		 $data['dts'] = $this->model->getActivitiesSTfilter($data['orgName'], $text, $config["per_page"], $data['page']); 
       		   
       	else if($filterby == "status")  
       		 $data['dts'] = $this->model->getActivitiesStatfilter($data['orgName'], $text, $config["per_page"], $data['page']);
       	else if($filterby == "title")
       		 $data['dts'] = $this->model->getActivitiesTitlefilter($data['orgName'], $text, $config["per_page"], $data['page']);
       	else{
				$data['dts'] = $this->model->getActivities($data['orgName'], $config["per_page"], $data['page']);
			}
       	

        $data['pagination'] = $this->pagination->create_links();

        


       	$this->load->view('include/DtsHead');
			$this->load->view('include/Nav_Org',$data);
			$this->load->view('DtsOrg', $data);
		
    }

	public function filter($filterby , $text){
		$this->load->model('DtsOrg_Model', 'model');
		$this->load->library('pagination');
		 $this->load->helper('url');
		

		if ($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$org = $session_data['username'];

			

			if($filterby == "SubmissionType"){
			$data['dtssample'] = $this->model->getActivitiesSTfilter($org, $text, 0,0);
			
			if($data['dtssample'] == NULL){
				$data['dtssample'] = $this->model->getActivities($org, 0,0);
				$filterby = "filterby";
			}
			}
			else if($filterby == "status"){
				$data['dtssample'] = $this->model->getActivitiesStatfilter($org, $text, 0,0);

				if($data['dtssample'] == NULL){
					$data['dtssample'] = $this->model->getActivities($org, 0,0);
					$filterby = "filterby";
				}
			}
			else {

			$data['dtssample'] = $this->model->getActivitiesStatfilter($org, $text, 0,0);
			$filterby = "status";
			if($data['dtssample'] == NULL){
				$data['dtssample'] = $this->model->getActivitiesSTfilter($org, $text, 0,0);
				$filterby = "SubmissionType";
			}
			if($data['dtssample'] == NULL){
				$data['dtssample'] = $this->model->getActivitiesTitlefilter($org, $text, 0,0);
				$filterby = "title";
			}
			if($data['dtssample'] == NULL){
				
				$data['dtssample'] = $this->model->getActivities($org, 0,0);
				$filterby = "filterby";
			}
		
			}



		//$object = $data['approved'][0];
		$data['orgName'] = $org;
		$this->setpagination2($data, $text, $filterby);

	//	$data['org'] = $this->model->getAllOrgs();
		}
		else{
			redirect('Login', 'refresh');
		}
		

	}




}
?>