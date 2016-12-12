<?php
	class Term_Model extends CI_model{


	function __construct() {
        parent::__construct();
        $this->load->database();
    }

   function deleteAllData()
	   {

	   		$this->db->empty_table('activity');
			$this->db->empty_table('astatus');
			$this->db->empty_table('gendetails');
			$this->db->empty_table('gosm');
			$this->db->empty_table('officerdetails');
			$this->db->empty_table('submission');
			$this->db->empty_table('targetdate');
	   }

	function get_by_id($id)
	   {
	    	$this->db->from('yearterm');
        	$this->db->where('termID',$id);
	   		$query = $this->db->get(); 
	   			
	   		if($query->num_rows()>0){

	        	return $query->row();
	    	}else {
	        	return NULL;
	      	}

	   }

	function addTerm($data){

		$schoolyear = $data['schoolyear'];
		$schoolterm = $data['term'];
		$start = $data['start'];
		$end = $data['end'];

		$code ='INSERT INTO `cso`.`yearterm`
				(`schoolyear`,
				`schoolterm`,
				`start`,
				`end`)
				VALUES
				(
				'.'"'.$schoolyear.'"'.',
				'.'"'.$schoolterm.'"'.',
				'.'"'.$start.'"'.',
				'.'"'.$end.'"'.');
				';

		$this->db->query($code);

	}

	function moveDataToHistory()
	   {
	    	$code ='INSERT INTO history
					SELECT O.OrgName as OrgName, 
						   G.ProjectID as ProjectID, G.ActTitle as ActTitle, G.ActPart as ActPart, G.Term as Term, G.TieUp as TieUp, 
					       A.ActNature as ActNature, A.ActTime as ActTime, A.ActType as ActType, A.ActVenue as ActVenue, A.EndDate as EndDate,
						   A.OneDate as OneDate, S.SubID as SubID, S.SubType as SubType, S.DateSubmitted as DateSubmitted, D.OfficerID as OfficerID,
						   D.ContNum as ContNum, D.EmailAdd as EmailAdd, D.OfficerName as OfficerName, T.Checker as Checker, T.DateApproved as DateApproved,
						   T.Remarks as Remarks, T.Stat as Stat, T.StatusID as StatusID, g.gendetails_termID as termID
					FROM   gendetails G, submission S, astatus T, activity A,org O, officerdetails D
					where G.ProjectID = A.Act_ProjectID and  S.Sub_ProjectID = G.ProjectID and S.SubID = T.Stat_SubID
					              and G.Proj_OrgID = O.OrgID and D.Off_SubID = S.SubID and D.OfficerID = S.SubID
	    			';

	   		$this->db->query($code);
	   }

	function moveGosmToHistory(){
		$code = 'INSERT INTO gosmhistory
				 SELECT * 
				 FROM cso.gosm , targetdate 
				 where gosmID = date_gosmID;';
		$query = $this->db->query($code);
	}

	function updateTerm($id, $end){
		$code = 'UPDATE `cso`.`yearterm`
				 SET
				 `end` = '.'"'.$end.'"'.'
				 WHERE `termID` = '.'"'.$id.'"'.';
				 ';
		$this->db->query($code);
	}



	

}
?>