<?php
	class SchoolYear_Model extends CI_model{


	function __construct() {
        parent::__construct();
        $this->load->database();
    }


	   function getSchoolYear()
	   {
	    	$code ='Select *
					FROM yearterm
					WHERE 
					TermID= (SELECT MAX(TermID) 
					from submission S1)';
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





}
?>