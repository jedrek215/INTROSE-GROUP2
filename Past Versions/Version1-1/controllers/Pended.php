<?php 

Class Pended extends CI_Controller{


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
				$data['subType'] = "Pended";

				$datestring = '%Y-%m-%d %H:%i:%s';
                $time = time();
                $data['timestamp'] = mdate($datestring, $time);	
                $data['url_subType'] = current_url() ;
				$this->load->view('include/artsHead');
				$this->load->view('include/nav', $data);
				$this->load->view('arts1', $data);
		}

	}

	public function validateSub()
	{
		$this->form_validation->set_rules('ActTitle', 'Activity Title', 'required');
		$this->form_validation->set_rules('TieUp', 'Tie Up', 'required');
		$this->form_validation->set_rules('SubBy', 'Name of Officer', 'required');
		$this->form_validation->set_rules('Email', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('ContactNum', 'Contact Number', 'required|max_length[11]');


	if($this->form_validation->run() == TRUE) 
	{
		$this->load->model('arts_model');
		
		$result = $this->arts_model->getOrgID( $this->input->post('OrgName'));
	   if($result) {
		    foreach($result as $row)
		    {
		    $Proj_OrgID = $row->orgID;
		    $check = $this->arts_model->checkTitle($this->input->post('ActTitle'),$this->input->post('OrgName'));
			if($check) {


				$result1 = $this->arts_model->getProjID($this->input->post('ActTitle'), $this->input->post('OrgName'));
					 if($result1){
					 		foreach ($result1 as $row)
					 		{
					 			$ProjID = $row ->ProjectID;

					 			$sub = array(
					 			'Sub_ProjectID' => $ProjID,
					 			'SubType' => $this->input->post('SubType'),
					 			'DateSubmitted' => $this->input->post('Timestamp'));

					 			$this->db->insert('Submission', $sub);

							$result2 = $this->arts_model->getSubID($ProjID, $this->input->post('OrgName'));
								 if($result2){
								 		foreach ($result2 as $row)
								 		{
								 			$SubID = $row ->SubID;
								 			$data2 = array(
								 				'Off_SubID' => $SubID,
								 				'OfficerName' => $this->input->post('SubBy'),
								 				'ContNum' => $this->input->post('ContactNum'),
								 				'EmailAdd' => $this->input->post('Email'));
								 			$this->db->insert('officerdetails', $data2);


								 			$stat = array(
								 				'Stat_SubID' => $SubID,
								 				'Stat' => 'Pending');
								 			$this->db->insert('astatus', $stat);

								 			echo '<div class="success">'.'Your submission has been successfully created'. '<br>'. '<a href="dts_Cont" class="btn btn-default" >'.'Proceed to DTS'.'</a>'. '<a href="Pended" class="btn btn-default" >'.'Submit Again'.'</a>'.'</div>';
						}
								 }
							 	else //else getSubID
								   {
								  	echo '<div class="success">'.'Submission Failed'. '<br>'. '<br>'. '<a href="Pended" class="btn btn-default" >'.'Submit Again'.'</a>'.'</div>';
								   }


				 		}
				 }
				 		else // else getProjectID
						   {
						  	echo '<div class="success">'.'Submission Failed'. '<br>'. 'Error'. '<br>'. '<br>'. '<a href="Pended" class="btn btn-default" >'.'Submit Again'.'</a>'.'</div>';
						   }
				}
		 	else // else checkTitle
			   {
			  	echo '<div class="success">'.'Submission Failed'. '<br>'. 'No Activity Title Found'. '<br>'. '<a href="Pended" class="btn btn-default" >'.'Submit Again'.'</a>'.'</div>';
			   }
		   }


		}
			
	   else{ //Else getOrgID
	  	echo '<div class="success">'.'Submission Failed'. '<br>'. '<br>'. '<a href="Pended" class="btn btn-default" >'.'Submit Again'.'</a>'.'</div>';
	   	   }	
		
	} 	
	else { 	//Else Form Validation
		//Form Validation FAILED
		echo '<div class="error">'.validation_errors().'</div>';
		}	
	}
		
}
?>