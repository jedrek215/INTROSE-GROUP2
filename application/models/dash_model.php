<?php
	class dash_model extends CI_Model{

		function __construct(){
			parent:: __construct();
			$this->load->database();
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

		function getPushedthrough($orgname, $status){
			if($status == 'pushed'){
				$code = 'SELECT 
						(SELECT COUNT(*)
						FROM (Select *
							FROM submission S,  org O, gendetails G, astatus T, gosm A
							WHERE O.orgname ='.'"'.$orgname.'"'.' and o.OrgID = G.Proj_OrgID and
							  S.Sub_ProjectID = G.ProjectID and S.SubID = T.Stat_SubID and o.OrgID = A.Gosm_OrgID and
           					    A.Title regexp G.ActTitle and
							SubID= (SELECT MAX(SubID) 
								from submission S1 where S.Sub_ProjectID = S1.Sub_ProjectID
								and stat is not null) and stat = "Approved") as acts) as "pushedthrough";  ';	
			}
			else if($status == 'not-pushed'){
				$code = 'SELECT 
						(SELECT COUNT(G.Title)
						FROM gosm G, org O
						where o.orgID = G.gosm_orgID and o.OrgName ='.'"'.$orgname.'"'.')-
						(SELECT COUNT(*)
						FROM (Select *
							FROM submission S,  org O, gendetails G, astatus T, gosm A
							WHERE O.orgname ='.'"'.$orgname.'"'.' and o.OrgID = G.Proj_OrgID and
							  S.Sub_ProjectID = G.ProjectID and S.SubID = T.Stat_SubID and o.OrgID = A.Gosm_OrgID and
           					    A.Title regexp G.ActTitle and
							SubID= (SELECT MAX(SubID) 
								from submission S1 where S.Sub_ProjectID = S1.Sub_ProjectID
								and stat is not null) and stat = "Approved") as acts) as "pushedthrough";  ';	
			}

			$query = $this->db->query($code);

			

			if($query->num_rows()>0){

				return $query->result();
			}else {
				return NULL;
			}

		}

		function getTimein($orgname, $status){
			if($status == 'Within'){
				$code = 'SELECT 
						(SELECT COUNT(*)
						FROM(Select b.title, a.onedate as "Act", g.G_onedate as "Gosm", datediff(G.G_OneDate, A.OneDate), g.particulars as "GOSMPart", c.ActPart as "actPart"
						FROM targetdate G, gosm b, activity A, gendetails c, org O
						Where c.ProjectID = a.act_ProjectID and G.gosmID = b.gosmID and
								o.orgID = c.Proj_OrgID and o.orgname = '.'"'.$orgname.'"'.' and b.Title regexp c.ActTitle and g.particulars = c.ActPart and
        						datediff(G.G_OneDate, A.OneDate) >= -7 and
       							 datediff(G.G_OneDate, A.OneDate) <= 7) as ACTS )+
       					 (SELECT COUNT(*)
						FROM(Select b.title, a.onedate as "Act", g.G_onedate as "Gosm", datediff(G.G_OneDate, A.OneDate), g.particulars as "GOSMPart", c.ActPart as "actPart"
						FROM targetdate G, gosm b, activity A, gendetails c, org O
						Where c.ProjectID = a.act_ProjectID and G.gosmID = b.gosmID and
								o.orgID = c.Proj_OrgID and o.orgname = '.'"'.$orgname.'"'.' and b.Title regexp c.ActTitle and g.particulars = c.ActPart and
       							 datediff(G.G_OneDate, A.OneDate) is NULL) as ACTS) as "within"';	
			}
			else if($status == 'not-Within'){
				$code = 'SELECT 
						(SELECT COUNT(*)
						FROM(Select b.title, a.onedate as "Act", g.G_onedate as "Gosm", datediff(G.G_OneDate, A.OneDate), g.particulars as "GOSMPart", c.ActPart as "actPart"
						FROM targetdate G, gosm b, activity A, gendetails c, org O
						Where c.ProjectID = a.act_ProjectID and G.gosmID = b.gosmID and
								o.orgID = c.Proj_OrgID and o.orgname = '.'"'.$orgname.'"'.' and b.Title regexp c.ActTitle and g.particulars = c.ActPart and
        						datediff(G.G_OneDate, A.OneDate) <= -7 and
       							 datediff(G.G_OneDate, A.OneDate) >= 7) as ACTS )+
       					 (SELECT COUNT(*)
						FROM(Select b.title, a.onedate as "Act", g.G_onedate as "Gosm", datediff(G.G_OneDate, A.OneDate), g.particulars as "GOSMPart", c.ActPart as "actPart"
						FROM targetdate G, gosm b, activity A, gendetails c, org O
						Where c.ProjectID = a.act_ProjectID and G.gosmID = b.gosmID and
								o.orgID = c.Proj_OrgID and o.orgname = '.'"'.$orgname.'"'.' and b.Title regexp c.ActTitle and g.particulars = c.ActPart and
       							 datediff(G.G_OneDate, A.OneDate) is NULL) as ACTS) as "within"';	
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