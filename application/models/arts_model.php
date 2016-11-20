<?php
	class arts_model extends CI_model{


	function __construct() {
        parent::__construct();
        $this->load->database();
    }


	   function getOrgID($org)
	   {
	     $this -> db -> select('orgID');
	     $this -> db -> from('org');
	     $this -> db -> where('orgName', $org );
	     $this -> db -> limit(1);
	   
	     $query = $this -> db -> get();
	   
	     if($query -> num_rows() == 1)
	     {
	       return $query->result();
	     }
	     else
	     {
	       return false;
	     }
	   }


	      function getProjID($Title, $orgName)
	   {
	   	$code ='Select G.ProjectID as ProjectID
	   			From gendetails G, org O
	   			Where o.orgName ='.'"'.$orgName.'"'.'
	   			and G.ActTitle ='.'"'.$Title.'"'.'
	   			and o.orgID = G.Proj_OrgID
	   			Limit 1';
	   			$query = $this->db->query($code);

	     if($query -> num_rows() == 1)
	     {
	       return $query->result();
	     }
	     else
	     {
	       return false;
	     }
	   }

	  	function getSubID($ProjectID, $OrgName)
	   {
	   		$code = 'Select S.SubID as SubID 
	   				FROM Submission S, gendetails G, org O
	   				Where S.Sub_ProjectID = '.'"'.$ProjectID.'"'.'and
	   				O.orgID = G.Proj_OrgID and 
	   				o.OrgName ='.'"'.$OrgName.'"'.'
	   				limit 1';
	   		$query = $this->db->query($code);
	   
	  
	     if($query -> num_rows() == 1)
	     {
	       return $query->result();
	     }
	     else
	     {
	       return false;
	     }
	   }

	   function checkTitle($Title, $OrgName)
	   {
	   		$code = 'Select G.ActTitle as ActTitle
	   				FROM gendetails G, org O
	   				Where G.ActTitle = '.'"'.$Title.'"'.'and
	   				O.orgID = G.Proj_OrgID and 
	   				o.OrgName ='.'"'.$OrgName.'"'.'
	   				limit 1';
	   		$query = $this->db->query($code);
	   
	  
	     if($query -> num_rows() == 1)
	     {
	       return true;
	     }
	     else
	     {
	       return false;
	     }
	   }

	



}
?>