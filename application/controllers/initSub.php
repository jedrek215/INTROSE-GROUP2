<?php 

Class InitSub extends CI_Controller{


	public function index()
	{
		$this->home();
	}

	public function home(){
		$this->load->model('dash_model', 'model');

		if ($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$org = $session_data['username'];
				$this->load->model('SchoolYear_Model');

				$query = $this->SchoolYear_Model->getSchoolYear();
						if($query){
							foreach($query as $row){
							$data = array('termID' => $row->termID,
										  'SchoolYear' => $row->schoolyear,
										  'SchoolTerm' => $row->schoolterm,
										  'Start' => date('F d, Y', strtotime($row->start)),
										  'End' =>date('F d, Y', strtotime($row->end)));
							}
						}
				$data['orgName'] = $org;
				$data['subType'] = "Initial Submission";

				$datestring = '%Y-%m-%d %H:%i:%s';
                $time = time();
                $data['timestamp'] = mdate($datestring, $time);	
                $data['url_subType'] = current_url() ;
				$this->load->view('include/ArtsHead');
				$this->load->view('include/Nav_Org', $data);
				$this->load->view('Arts', $data);
		}

	}

	public function validateSub()
	{
		$this->form_validation->set_rules('ActTitle', 'Activity Title', 'required');
		$this->form_validation->set_rules('TieUp', 'Tie Up', 'required');
		$this->form_validation->set_rules('ActTime', 'Activity Time', 'required');
		$this->form_validation->set_rules('ActVenue', 'Activity Venue', 'required');
		$this->form_validation->set_rules('SubBy', 'Name of Officer', 'required');
		$this->form_validation->set_rules('Email', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('ContactNum', 'Contact Number', 'required|max_length[11]');


		if($this->form_validation->run() == TRUE) 
		{
			$this->load->model('Arts_Model');
			
			$result = $this->Arts_Model->getOrgID( $this->input->post('OrgName'));
		if($result) {
			  foreach($result as $row) {
			    $Proj_OrgID = $row->orgID;
			 $checkGosm = $this->Arts_Model->checkIfGosm($this->input->post('ActTitle'),$this->input->post('OrgName'), $this->input->post('TermID'));
				 if($checkGosm) {
			   		 $check = $this->Arts_Model->checkTitle($this->input->post('ActTitle'),$this->input->post('OrgName'), $this->input->post('TermID'));
						if(!$check) {
							$data = array(
							 'gendetails_termID' => $this->input->post('TermID'),
					       	 'Proj_OrgID' =>$Proj_OrgID,
					         'ActTitle' => $this->input->post('ActTitle'),
					         'ActPart' =>$this->input->post('ActPart'),
					         'Term' => $this->input->post('Term'),
					         'TieUp' => $this->input->post('TieUp'));
					    	
					    	$this->db->insert('gendetails', $data);

							$result1 = $this->Arts_Model->getProjID($this->input->post('ActTitle'), $this->input->post('OrgName'), $this->input->post('TermID'));
								 if($result1){
								 		foreach ($result1 as $row)
								 		{
								 			$ProjID = $row ->ProjectID;
								 			$data1 = array(
								 			'Act_ProjectID' => $ProjID,
								 			'ActType' => $this->input->post('ActType') . ' ' . $this->input->post('Other'),
								 			'ActNature' => $this->input->post('ActNature'),
								 			'ActTime' => $this->input->post('ActTime'),
								 			'ActVenue' => $this->input->post('ActVenue'));

								 			if ($this->input->post('ActPart') == 'Year Long' || $this->input->post('ActPart') == 'Term Long'){
								 				$data1['OneDate'] = NULL;
								 				$data1['EndDate']=  NULL;
								 			}
								 			else if ($this->input->post('ActPart') == 'One Day' )
								 			{
								 				$data1['OneDate'] = $this->input->post('datePicker1');
								 			}
								 			else if($this->input->post('ActPart') == 'Not One Day'){
								 				$data1['OneDate'] = $this->input->post('datePicker1');
								 				$data1['EndDate'] = $this->input->post('datePicker2');
								 			}

								 			$this->db->insert('Activity', $data1);

								 			$sub = array(
								 			'Sub_ProjectID' => $ProjID,
								 			'SubType' => $this->input->post('SubType'),
								 			'DateSubmitted' => $this->input->post('Timestamp'));

								 			$this->db->insert('Submission', $sub);

										$result2 = $this->Arts_Model->getSubID($ProjID, $this->input->post('OrgName'),$this->input->post('TermID'));
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

											 				echo '<label style="font-size :20px">Submission</label>
                     										  <a href="Org_Cont" class="btn btn-default" style="float:right">Home</a>
			           											 <hr>
			           											 <div class="success" style="text-align: center;">
			  		  											Submission has been successfully created!<br>
											  		  			</div>
	  										 					<div class="modal-footer">
	  		 													<a href="DtsOrg_Cont" class="btn btn-default">Proceed to DTS</a>
			  		 											<a href="NotGosm" class="btn btn-default">Submit Again</a>
	  				 											</div>';
											 			
											 		}
											 }
										 	else //else getSubID
											   {
											  	echo '
											  		<label style="font-size :20px">Submission</label>
                        							<button  align = "right"type="button" class="btn btn-default" data-dismiss="modal" style="float: right;">Close</button><br>
                        							<hr>
											  		<div class="success" style="text-align: center;">
	  		  										Submission Failed<br>
	  		  										Error accessing your submission
				  		  							</div>
	  					 							<div class="modal-footer">
	  		 										<a href="NotGosm" class="btn btn-default">Submit Again</a>
	  		 										</div>';
											   }


							 		}
							 }
							 		else // else getProjectID
									   {
									  	echo '<label style="font-size :20px">Submission</label>
                        					<button  align = "right"type="button" class="btn btn-default" data-dismiss="modal" style="float: right;">Close</button><br>
                      						  <hr>
									  		<div class="success" style="text-align: center;">
	  		  								Submission Failed<br>
	  		  								Error accessing your activity
				  		  					</div>
			  					 			<div class="modal-footer">
	  		 								<a href="NotGosm" class="btn btn-default">Submit Again</a>
	  		 								</div>';
									   }
						}
					 	else {// else checkTitle
						  	echo '<label style="font-size :20px">Submission</label>
                        		 <button  align = "right"type="button" class="btn btn-default" data-dismiss="modal" style="float: right;">Close</button><br>
                        		<hr>
						  		<div class="success" style="text-align: center;">
	  		  					Submission Failed<br>
	  		  					Activity has an Initial Submission
	  		  					</div>
	  		 					<div class="modal-footer">
	  		 					<a href="NotGosm" class="btn btn-default">Submit Again</a>
	  		 					</div>';
						}
				}
				else {
					echo '<label style="font-size :20px">Submission</label>
                        <button  align = "right"type="button" class="btn btn-default" data-dismiss="modal" style="float: right;">Close</button><br>
                        <hr>
                        <div class="success" style="text-align: center;">
	  		  			Submission Failed<br>
	  		  			Activity is not included in GOSM
	  		  			</div>
	  		 			<div class="modal-footer">
	  		 			<a href="NotGosm" class="btn btn-default">Submit Again</a>
	  		 			</div>';
				}
		}

	}
				
		   else{ //Else getOrgID
		  	echo '<label style="font-size :20px">Submission</label>
                  <button  align = "right"type="button" class="btn btn-default" data-dismiss="modal" style="float: right;">Close</button><br>
                   <hr>
		  		<div class="success" style="text-align: center;">
  		 		 Submission Failed<br>
  		 		 Error accessing your Organization
  		  		</div>
  		  		<div class="modal-footer">
  		  		<a href="NotGosm" class="btn btn-default">Submit Again</a>
  		  		</div>';
		   	   }	
			
		} 	
		else { 	//Else Form Validation
			//Form Validation FAILED

			echo ' <label style="font-size :20px">Submission</label>
                        <button  align = "right"type="button" class="btn btn-default" data-dismiss="modal" style="float: right;">Close</button><br>
                        <hr> <div class="error">'.validation_errors().'</div>';
			}	
	}

	public function autocomp()
	{
		$this->load->model('Arts_Model');
		//process posted form data
		if(isset($_GET['term'])){
			$result = $this->Arts_Model->getGosmTitle($_GET['term']);
			if($result){
				foreach ($result as $row){
				 	$arr_result = array( 'Title' => $row->Title);
					echo $arr_result['Title'];
				 echo json_encode($arr_result['Title']);
				 }
			}
	}

	}
}
?>