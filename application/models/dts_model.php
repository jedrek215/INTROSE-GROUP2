<?php 
Class dts_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    
   function getActivities($orgname)
   {
     $code = 'SELECT *
              from gendetails , submission , astatus , activity ,org, officerdetails
              where OrgName = '.'"'.$orgname.'"'.' and ProjectID = Act_ProjectID and ProjectID = Sub_ProjectID and SubID = Stat_SubID
              and Proj_OrgID = OrgID and Off_SubID = SubID';


      $query = $this->db->query($code);
      if($query->num_rows()>0){

        return $query->result();
      }else {
        return NULL;
      }

    }

    function getActivitiesSTfilter($orgname, $text){
       $code = 'SELECT *
              from gendetails , submission , astatus , activity ,org, officerdetails
              where OrgName = '.'"'.$orgname.'"'.' and ProjectID = Act_ProjectID and ProjectID = Sub_ProjectID and SubID = Stat_SubID
              and Proj_OrgID = OrgID and Off_SubID = SubID and SubType Like '.'"%'.$text.'%"'.'';

              
      $query = $this->db->query($code);
      if($query->num_rows()>0){

        return $query->result();
      }else {
        return NULL;
      }
    }

    function getActivitiesStatfilter($orgname, $text){
       $code = 'SELECT *
              from gendetails , submission , astatus , activity ,org, officerdetails
              where OrgName = '.'"'.$orgname.'"'.' and ProjectID = Act_ProjectID and ProjectID = Sub_ProjectID and SubID = Stat_SubID
              and Proj_OrgID = OrgID and Off_SubID = SubID and Stat Like '.'"%'.$text.'%"'.'';

             
      $query = $this->db->query($code);
      if($query->num_rows()>0){

        return $query->result();
      }else {
        return NULL;
      }
    }

    function getActivitiesTitlefilter($orgname, $text){
       $code = 'SELECT *
              from gendetails , submission , astatus , activity ,org, officerdetails
              where OrgName = '.'"'.$orgname.'"'.' and ProjectID = Act_ProjectID and ProjectID = Sub_ProjectID and SubID = Stat_SubID
              and Proj_OrgID = OrgID and Off_SubID = SubID and ActTitle Like '.'"%'.$text.'%"'.'';

             
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