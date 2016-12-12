<!DOCTYPE html>

<html lang="en">
<body>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="col-lg-12">
                <h1 class="page-header">
                    DTS <small> Document Tracking System</small>
                </h1>
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                    <form  role="search" action="dts_Cont" method = "post">
                        <div class="input-group">
                            <div class="input-group-btn search-panel">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <span id="search_concept"></span><font id="filter">Filter by</font><span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a id= "Filterby" href="#sample">Filter by</a></li>
                                    <li><a id= "ST" href="#sample">Submission Type</a></li>
                                    <li><a id= "Status" href="#sample">Status</a></li>

                                </ul>
                            </div>
                            <input type="hidden" name="search_param" value="filterby" id="search_param">     
                            <input type="hidden" name="search" value="yes" id="search_param">     
                            <input id="inputText" type="text" class="form-control" name="x" placeholder="Search term...">
                            <span class="input-group-btn">
                                <button id="Search" class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                            </span>
                            </form>
                        </div><h3 class="panel-title"></h3>
                    </div>
                    <div class="panel-body bg-2">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dts">
                            <thead>
                                <th>Num</th>
                                <th>Date Submitted</th>
                                <th>Activity Title</th>
                                <th>Submission Type</th>
                                <th>Activity Date Particulars</th>
                                <th>Status</th>
                                <th>More Info</th>
                            </thead>
                            <tbody>
                                <?php displayAsTable($orgName , $dts) ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

   

    <font id="hidden"></font>

    <?php
        $activities =0;
        function displayAsTable($file_name, $activity){
            $count = 0;
            $activities = $activity;
            if($activities){
             foreach ($activities as $row){
               
              echo '<tr>';
                
                echo '<td>' . $row->SubID . '</td>';
                echo '<td>' . $row->DateSubmitted . '</td>';
                echo '<td id = "title" class = "$count">' . $row->ActTitle . '</td>';
                echo '<td>' . $row->SubType . '</td>';
                if($row->EndDate == NULL && $row->OneDate != NULL){
                    echo '<td>' . $row->OneDate . '</td>';
                }
                else if($row->OneDate == NULL && $row->EndDate == NULL)
                    echo '<td>' . $row->ActPart . '</td>';
                else{
                    echo '<td>' . $row->OneDate . ' —' . $row->EndDate . '</td>';
                }
                echo '<td>' . $row->Stat . '</td>';
                 echo '<td>' . '<button type="button" class= "btn btn-primary" aria-label ="center" data-toggle="modal" data-target = "#modal-'.$count.'">
                    <span class ="glyphicon glyphicon-info-sign" aria-hidden = "true"></span>
                     </button>' . '</td>';
              echo '<tr>';
              makeModal($row,$count);
                $count++;              
            }
            }
        }

        function makeModal($data, $count){
            echo '<div class ="container">';
            echo '<div class = "modal" id= "modal-'.$count.'">';
            echo    '<div class = "modal-dialog">';
            echo    '<div class = "modal-content">';
            echo        '<div class = "modal-header">';
            echo            '<button type ="button" class = "close"data-dismiss= "modal">&times;</button>';
            echo            '<h3 class="modal-title">' . $data->ActTitle . '</h3>';
            echo        '</div>';
            echo        '<div class = "modal-body" style= "text-align :left">';
            echo            'Activity Type: ' . $data->ActType . '<br>';
            echo                'Activity Nature: ' . $data->ActNature . '<br>';
            echo                'Term: ' . $data->Term . '<br>';
            echo                'Activity Duration: ' . $data->ActPart . '<br>';
            echo                'Activity Start Date: ' . $data->OneDate . '<br>';
            echo                'Activity End Date: ' . $data->EndDate . '<br>';
            echo                'Activity Time: ' . $data->ActTime . '<br>';
            echo                'Activity Venue: ' . $data->ActVenue . '<br>';
            echo                'Tie Up: ' . $data->TieUp . '<br>';
            echo                'Submission Type: ' . $data->SubType . '<br>';
            echo                'Date Submitted: ' . $data->DateSubmitted . '<br>';
            echo                'Date Approved: ' . $data->DateApproved . '<br>';
            echo                'Status: ' . $data->Stat . '<br>';
            echo                'Officer Name: ' . $data->OfficerName . '<br>';
            echo                'Contact Number: ' . $data->ContNum . '<br>';
            echo                'Email Address: ' . $data->EmailAdd . '<br>';
            echo                'Checker: ' . $data->Checker . '<br>';
            echo                'Remarks: ' . $data->Remarks . '<br>';
            echo        '</div>';
            echo        '<div class = "modal-footer">';
            echo            '<a href="" class="btn btn-default" data-dismiss="modal">Close</a>';                        
            echo        '</div>';
            echo    '</div>';
            echo   '</div>';
            echo    '</div>';
            echo '</div>';

        }
    ?>
<script type="text/javascript">
    base_url = '<?=base_url()?>';
    $(document).ready(function(){   
/*
    $("#Search").click(function()
    {       

        console.log("CLICKED");
     $.ajax({
         type: "POST",
         url: base_url + 'dts_Cont/filter', 
         data: {text: $("#inputText").text(),
                filterby: $("#filter").text()},  
        dataType: 'json', 
         
         success: 
              function(data){

                  //as a debugging message.
              }
          });// you have missed this bracket
     ;
 });*/

    $("#ST").click(function(){
       $("#filter").html('Submission Type');
       $("#search_param").attr("value" , "SubmissionType");
    });
     $("#Status").click(function(){
        $("#filter").html('Status');
       $("#search_param").attr("value" , "Status");
    });
     $("#Filterby").click(function(){
        $("#filter").html('Filter by');
    });
 });


</script>


</body>

</html>
