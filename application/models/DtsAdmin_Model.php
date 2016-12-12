<?php 
Class DtsAdmin_Model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    
   function getActivities2($orgname,$limit, $start, $termID)
   {
     $code = 'SELECT * 
              from gendetails , submission , astatus , activity ,org, officerdetails, yearterm
              where OrgName = '.'"'.$orgname.'"'.' 
                    and ProjectID = Act_ProjectID 
                    and ProjectID = Sub_ProjectID 
                    and SubID = Stat_SubID
                    and Proj_OrgID = OrgID 
                    and Off_SubID = SubID
                    and termID = '.'"'.$termID.'"'.' 
                    and termID = gendetails_termID';
      if($limit != 0 ){
         $code =  $code . ' limit ' . $start . ', ' . $limit;
     }


      $query = $this->db->query($code);
      if($query->num_rows()>0){

        return $query->result();
      }else {
        return NULL;
      }

    }

    function getActivities($limit, $start, $termID)
   {
     $code = 'SELECT * 
              from gendetails , submission , astatus , activity ,org, officerdetails, yearterm
              where ProjectID = Act_ProjectID 
                    and ProjectID = Sub_ProjectID 
                    and SubID = Stat_SubID
                    and Proj_OrgID = OrgID 
                    and Off_SubID = SubID
                    and termID = '.'"'.$termID.'"'.' 
                    and termID = gendetails_termID';
      if($limit != 0 ){
         $code =  $code . ' limit ' . $start . ', ' . $limit;
     }


      $query = $this->db->query($code);
      if($query->num_rows()>0){

        return $query->result();
      }else {
        return NULL;
      }

    }

     function getOrgs()
   {
     $code = 'SELECT * FROM cso.org;';

      $query = $this->db->query($code);
      if($query->num_rows()>0){

        return $query->result();
      }else {
        return NULL;
      }

    }

    function getActivitiesSTfilter($orgname, $text, $limit, $start, $termID){
       $code = 'SELECT *
              from gendetails , submission , astatus , activity ,org, officerdetails, yearterm
              where OrgName Like '.'"%'.$orgname.'%"'.'  
                    and ProjectID = Act_ProjectID 
                    and ProjectID = Sub_ProjectID 
                    and SubID = Stat_SubID
                    and Proj_OrgID = OrgID 
                    and Off_SubID = SubID 
                    and SubType Like '.'"%'.$text.'%"'.'
                    and termID = '.'"'.$termID.'"'.' 
                    and termID = gendetails_termID';

        if($limit != 0 ){
         $code =  $code . ' limit ' . $start . ', ' . $limit;
     }

              
      $query = $this->db->query($code);
      if($query->num_rows()>0){

        return $query->result();
      }else {
        return NULL;
      }
    }

    function getActivitiesStatfilter($orgname, $text, $limit, $start, $termID){
       $code = 'SELECT * 
              from gendetails , submission , astatus , activity ,org, officerdetails, yearterm
              where OrgName Like'.'"%'.$orgname.'%"'.'  
                    and ProjectID = Act_ProjectID 
                    and ProjectID = Sub_ProjectID 
                    and SubID = Stat_SubID
                    and Proj_OrgID = OrgID 
                    and Off_SubID = SubID 
                    and Stat Like '.'"%'.$text.'%"'.'
                    and termID = '.'"'.$termID.'"'.' 
                    and termID = gendetails_termID';

      if($limit != 0 ){
         $code =  $code . ' limit ' . $start . ', ' . $limit;
     }
             
      $query = $this->db->query($code);
      if($query->num_rows()>0){

        return $query->result();
      }else {
        return NULL;
      }
    }

    function getActivitiesTitlefilter($orgname, $text, $limit, $start, $termID){
       $code = 'SELECT *
              from gendetails , submission , astatus , activity ,org, officerdetails, yearterm
              where OrgName Like '.'"%'.$orgname.'%"'.'  
                    and ProjectID = Act_ProjectID 
                    and ProjectID = Sub_ProjectID 
                    and SubID = Stat_SubID
                    and Proj_OrgID = OrgID 
                    and Off_SubID = SubID 
                    and ActTitle Like '.'"%'.$text.'%"'.'
                    and termID = '.'"'.$termID.'"'.' 
                    and termID = gendetails_termID';

        if($limit != 0 ){
         $code =  $code . ' limit ' . $start . ', ' . $limit;
     }
             
      $query = $this->db->query($code);
      if($query->num_rows()>0){

        return $query->result();
      }else {
        return NULL;
      }
    }

    function updateSubmission($where, $data){
        $date = date( "Y-m-d H:i:s");
        $status = $data['status'];
        $remarks = $data['remarks'];
        $checker = $data['checker'];

        $code =' UPDATE astatus 
        SET Stat = '.'"'.$status.'"'.' , Remarks = '.'"'.$remarks.'"'.', DateApproved = '.'"'.$date.'"'.', Checker = '.'"'.$checker.'"'.'
        Where Stat_SubID ='.'"'.$where.'"'.'' ;
        $query = $this->db->query($code);

             
    }

   
   function __destruct() {
        $this->db->close();
    }

}

?>