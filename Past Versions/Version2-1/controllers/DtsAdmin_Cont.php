<?php 

Class DtsAdmin_Cont extends CI_Controller{


	public function index()
	{
		if($this->input->post('search') == NULL || ($this->input->post('x') == NULL && $this->input->post('search_param') == "filterby"))
			$this->home();
		else{
			$filterby =    $this->input->post('search_param');
            $org = $this->input->post('org');
			if($filterby == "filterby"){
				$text = $this->input->post('x');
			}
			else{
				$text = $this->input->post('searchby');
                
			}
			$this->filter($filterby, $text, $org);
		}
	}
	public function home(){
		$this->load->model('DtsAdmin_Model', 'model');
		 $this->load->library('pagination');
		 $this->load->helper('url');

		if ($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');



		
		$data['dtssample'] = $this->model->getActivities(0,0);
		$this->setpagination($data);
		
		
		}
		else{
			redirect('Login', 'refresh');
		}
	}

	public function setpagination($data)
    {
        //pagination settings

    	$count = sizeof($data['dtssample']);

        $config['base_url'] = site_url('DtsAdmin_Cont/home');
        $config['total_rows'] = $count;
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
        $data['dts'] = $this->model->getActivities($config["per_page"], $data['page']);           

        $data['pagination'] = $this->pagination->create_links();

        $data['org'] = "";
        //load the department_view
        $this->load->view('include/DtsHead');
		$this->load->view('include/Nav_Admin',$data);
		$this->load->view('DtsAdmin', $data);    
	}

	public function setpagination2($data, $text, $filterby, $org)
    {

    	$count = sizeof($data['dtssample']);

        //pagination settings
        $config['base_url'] = site_url('DtsAdmin_Cont/filter/'.$filterby.'/'.$text.'/'.$org);
        $config['total_rows'] = $count ;
        $config['per_page'] = "6";
        $config["uri_segment"] = 6;
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
        $data['page'] = ($this->uri->segment(6)) ? $this->uri->segment(6) : 0;



        //call the model function to get the department data
        if($filterby == "SubmissionType")
       		 $data['dts'] = $this->model->getActivitiesSTfilter($org,$text, $config["per_page"], $data['page']); 
       		   
       	else if($filterby == "status")  
       		 $data['dts'] = $this->model->getActivitiesStatfilter($org,$text, $config["per_page"], $data['page']);
       	else if($filterby == "title")
       		 $data['dts'] = $this->model->getActivitiesTitlefilter($org,$text, $config["per_page"], $data['page']);
       	else{
				$data['dts'] = $this->model->getActivities2($org,$config["per_page"], $data['page']);
			}
       	

        $data['pagination'] = $this->pagination->create_links();
        
        $data['org'] = $org;

       	$this->load->view('include/DtsHead');
		$this->load->view('include/Nav_Admin',$data);
		$this->load->view('DtsAdmin', $data);  
		
    }


	public function filter($filterby , $text, $org){
		$this->load->model('DtsAdmin_Model', 'model');
		$this->load->library('pagination');
		 $this->load->helper('url');
		

		if ($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			

			if($filterby == "SubmissionType"){
			$data['dtssample'] = $this->model->getActivitiesSTfilter($org,$text, 0,0);
			
			if($data['dtssample'] == NULL){
				$data['dtssample'] = $this->model->getActivities2($org,0,0);
				$filterby = "filterby";
			}
			}
			else if($filterby == "status"){
				$data['dtssample'] = $this->model->getActivitiesStatfilter($org,$text, 0,0);

				if($data['dtssample'] == NULL){
					$data['dtssample'] = $this->model->getActivities2($org,0,0);
					$filterby = "filterby";
				}
			}
			else {

			$data['dtssample'] = $this->model->getActivitiesStatfilter($org,$text, 0,0);
			$filterby = "status";
			if($data['dtssample'] == NULL){
				$data['dtssample'] = $this->model->getActivitiesSTfilter($org,$text, 0,0);
				$filterby = "SubmissionType";
			}
			if($data['dtssample'] == NULL){
				$data['dtssample'] = $this->model->getActivitiesTitlefilter($org,$text, 0,0);
				$filterby = "title";
			}
			if($data['dtssample'] == NULL){
				
				$data['dtssample'] = $this->model->getActivities2($org,0,0);
				$filterby = "filterby";
			}
		
			}



		$this->setpagination2($data, $text, $filterby, $org);

		}
		else{
			redirect('Login', 'refresh');
		}
		

	}

	public function edit(){
		$this->_validate();	
		$this->load->model('DtsAdmin_Model', 'model');

		
        $data['status'] = $this->input->post('status');
        $data['remarks']= $this->input->post('remarks');
        $id = $this->input->post('subid');

        $this->model->updateSubmission($id, $data);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('status') == '')
        {
            $data['inputerror'][] = 'status';
            $data['error_string'][] = 'Status is required';
            $data['status'] = FALSE;
        }
        
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }


}
?>