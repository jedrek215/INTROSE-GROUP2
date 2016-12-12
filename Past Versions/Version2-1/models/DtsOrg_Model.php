<?php 
Class DtsOrg_Model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    
   function getActivities($orgname, $limit, $start)
   {
     $code = 'SELECT *
              from gendetails , submission , astatus , activity ,org, officerdetails
              where OrgName = '.'"'.$orgname.'"'.' and ProjectID = Act_ProjectID and ProjectID = Sub_ProjectID and SubID = Stat_SubID
              and Proj_OrgID = OrgID and Off_SubID = SubID';

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

    function getActivitiesSTfilter($orgname, $text, $limit, $start){
       $code = 'SELECT *
              from gendetails , submission , astatus , activity ,org, officerdetails
              where OrgName = '.'"'.$orgname.'"'.' and ProjectID = Act_ProjectID and ProjectID = Sub_ProjectID and SubID = Stat_SubID
              and Proj_OrgID = OrgID and Off_SubID = SubID and SubType Like '.'"%'.$text.'%"'.'';
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

    function getActivitiesStatfilter($orgname, $text, $limit, $start){
       $code = 'SELECT *
              from gendetails , submission , astatus , activity ,org, officerdetails
              where OrgName = '.'"'.$orgname.'"'.' and ProjectID = Act_ProjectID and ProjectID = Sub_ProjectID and SubID = Stat_SubID
              and Proj_OrgID = OrgID and Off_SubID = SubID and Stat Like '.'"%'.$text.'%"'.'';

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

    function getActivitiesTitlefilter($orgname, $text, $limit, $start){
       $code = 'SELECT *
              from gendetails , submission , astatus , activity ,org, officerdetails
              where OrgName = '.'"'.$orgname.'"'.' and ProjectID = Act_ProjectID and ProjectID = Sub_ProjectID and SubID = Stat_SubID
              and Proj_OrgID = OrgID and Off_SubID = SubID and ActTitle Like '.'"%'.$text.'%"'.'';

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

   
   function __destruct() {
        $this->db->close();
    }

}

?>