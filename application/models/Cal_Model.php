<?php
	class Cal_Model extends CI_model{


	function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getActDates($termID){  

	   	$code ='Select ActTitle as title, OneDate as start, EndDate as end, color
				FROM gendetails, activity, org, cal, yearterm
				WHERE gendetails.Proj_OrgID = org.OrgID
					and gendetails.ProjectID = activity.Act_ProjectID
					and OneDate is not Null and cal.part = gendetails.ActPart
					and yearterm.termID = '.'"'.$termID.'"'.' 
	   				and	Yearterm.termID = Gendetails.gendetails_termID';
	   			$query = $this->db->query($code);

	     if($query)
	     {
	       return $query->result();
	     }
	     else
	     {
	       return false;
	     }
	   
    }

     public function getTerm(){  

	   	$code ='Select ActTitle as title, start, end, color
				FROM gendetails, org, cal, yearterm
				WHERE gendetails.Proj_OrgID = org.OrgID and 
					gendetails.gendetails_termID = yearterm.termID
					and actPart ="Term Long" and cal.part = gendetails.actPart';
	   			$query = $this->db->query($code);

	     if($query)
	     {
	       return $query->result();
	     }
	     else
	     {
	       return false;
	     }
	   
    }

	

}
?>