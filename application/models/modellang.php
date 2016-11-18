<?php
	class modellang extends CI_Model{

		function __construct(){
			parent:: __construct();
		}

		function getActivitiyCount($orgname, $status){

			$code = 'Select COUNT(*) as "count"
										FROM (Select *
										FROM submission S,  org O, gendetails G, astatus T
										WHERE O.orgname ='.'"'.$orgname.'"'.' and o.OrgID = G.Proj_OrgID and
										  S.Sub_ProjectID = G.ProjectID and S.SubID = T.Stat_SubID and
											SubID= (SELECT MAX(SubID) 
											from submission S1 where S.Sub_ProjectID = S1.Sub_ProjectID
											and stat is not null) ) as ACTS
										Where stat = '.'"'.$status.'"'.' ';

			$query = $this->db->query($code);
			if($query->num_rows()>0){

				return $query->result();
			}else {
				return NULL;
			}

		}

		function getAllOrgs(){
			$query = $this->db->query('Select OrgName from org');

			if($query->num_rows()>0){

				return $query->result();
			}else {
				return NULL;
			}

		}

		function get60_40ratio($orgname, $status){
			if($status == 'Academic'){
				$code = 'SELECT Count(*) as "count"
							From Activity A, Gendetails G, Org O
							Where O.OrgName = '.'"'.$orgname.'"'.' and O.OrgID = G.proj_OrgID 
							and G.ProjectID = A.Act_projectID and 
							ActNature 	= "Academic"';	
			}
			else if($status == 'non-Academic'){
				$code = 'SELECT Count(*) as "count"
							From Activity A, Gendetails G, Org O
							Where O.OrgName = '.'"'.$orgname.'"'.' and O.OrgID = G.proj_OrgID 
							and G.ProjectID = A.Act_projectID and 
							ActNature 	!= "Academic"';	
			}
			

			$query = $this->db->query($code);

			

			if($query->num_rows()>0){

				return $query->result();
			}else {
				return NULL;
			}

		}

	}




?>