<?php 
Class GosmOrg_Model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    
   function getGosm($orgname, $limit, $start, $termID)
   {
     $code = 'SELECT *
              from gosm, org, targetdate, yearterm
              where OrgName = '.'"'.$orgname.'"'.' 
              and OrgID = Gosm_OrgID 
              and gosmID = date_gosmID
              and yearterm.termID = '.'"'.$termID.'"'.' 
              and yearterm.termID = gosm.gosm_termID';

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



    function addToGosm($data, $orgname){
      $termID = $data['termID'];
      $title = $data['title'];
      $goals = $data['goals'];
      $Objective= $data['objective'];
      $Desc = $data['desc'];
      $Measures= $data['measure'];
      $OC= $data['oc'];
      $ActNature= $data['ActNature'];
      $ActType= $data['ActType'];
      $related = $data['related'];
      $budget = $data['budget'];
      $venue = $data['venue'];
      $code = 'SET foreign_key_checks = 0';
      $this->db->query($code);

        $code = 'INSERT INTO `cso`.`gosm`
                (`gosm_termID`,
                `Gosm_OrgID`,
                `Title`,
                `Goals`,
                `Objectives`,
                `BriefDesc`,
                `Measures`,
                `inCharge`,
                `GNature`,
                `GType`,
                `Related`,
                `Budget`,
                `Venue`)
                VALUES
                ('.'"'.$termID.'"'.',
                '.'"'.$orgname.'"'.',
                '.'"'.$title.'"'.',
                '.'"'.$goals.'"'.',
                '.'"'.$Objective.'"'.',
                '.'"'.$Desc.'"'.',
                '.'"'.$Measures.'"'.',
                '.'"'.$OC.'"'.',
                '.'"'.$ActNature.'"'.',
                '.'"'.$ActType.'"'.',
                '.'"'.$related.'"'.',
                '.'"'.$budget.'"'.',
                '.'"'.$venue.'"'.');';
      $this->db->query($code);

      $code = 'SET foreign_key_checks = 1';
      $this->db->query($code);

    }

    function addToTargetDate($data){
      $gosmID = $data['gosmID'];
      $oneDate = $data['oneDate'];
      $endDate = $data['endDate'];
      $particulars = $data['particulars'];

      $code = 'SET foreign_key_checks = 0';
      $this->db->query($code);

      if($oneDate != NULL && $endDate !=NULL){
      $code = 'INSERT INTO `cso`.`targetdate`
              (`date_gosmID`,
              `G_OneDate`,
              `G_EndDate`,
              `Particulars`)
              VALUES
              ('.'"'.$gosmID.'"'.',
              '.'"'.$oneDate.'"'.',
              '.'"'.$endDate.'"'.',
              '.'"'.$particulars.'"'.');';
            }
      if($endDate == NULL ){
        $code = 'INSERT INTO `cso`.`targetdate`
              (`date_gosmID`,
              `G_OneDate`,
              `Particulars`)
              VALUES
              ('.'"'.$gosmID.'"'.',
              '.'"'.$oneDate.'"'.',
              '.'"'.$particulars.'"'.');';
      }
      if($endDate == NULL && $oneDate== NULL){
         $code = 'INSERT INTO `cso`.`targetdate`
              (`date_gosmID`,
              `Particulars`)
              VALUES
              ('.'"'.$gosmID.'"'.',
              '.'"'.$particulars.'"'.');';
      }

      $this->db->query($code);

      $code = 'SET foreign_key_checks = 1';
      $this->db->query($code);

    }

    function getGosmID($data){

      $termID = $data['termID'];
      $title = $data['title'];
      $goals = $data['goals'];
      $Objective= $data['objective'];
      $Desc = $data['desc'];
      $Measures= $data['measure'];
      $OC= $data['oc'];
      $ActNature= $data['ActNature'];
      $ActType= $data['ActType'];
      $related = $data['related'];
      $budget = $data['budget'];
      $venue = $data['venue'];

      $code = 'SELECT `gosm`.`gosmID`
          FROM `cso`.`gosm`
          WHERE gosm_termID = '.'"'.$termID.'"'.'
          AND   Title  = '.'"'.$title.'"'.'
          AND   Goals  = '.'"'.$goals.'"'.'
          AND   Objectives = '.'"'.$Objective.'"'.'
          AND   BriefDesc  = '.'"'.$Desc.'"'.'
          AND   Measures   = '.'"'.$Measures.'"'.'
          AND   inCharge   = '.'"'.$OC.'"'.'
          AND   GNature    = '.'"'.$ActNature.'"'.'
          AND   GType      = '.'"'.$ActType.'"'.'
          And   Related    = '.'"'.$related.'"'.'
          AND   Budget     = '.'"'.$budget.'"'.'
          AND   Venue      = '.'"'.$venue.'"'.';';
      $query = $this->db->query($code);

      if($query->num_rows()>0){
         $table = $query->row();
        return $table->gosmID;
      }else {
        return NULL;
      }

    }

    function getOrgID($orgname)
   {
     $code = 'SELECT `org`.`OrgID`
              FROM `cso`.`org`
              WHERE OrgName = '.'"'.$orgname.'"'.';
              ';

      $query = $this->db->query($code);
      if($query->num_rows()>0){

       $table = $query->row();
        return $table->OrgID;
      }else {
        return NULL;
      }

    }

   
}

?>