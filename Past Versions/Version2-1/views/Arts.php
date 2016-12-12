<!DOCTYPE html>
<html lang="en">


<body>
    <div id="wrapper">
      <!-- Navigation -->
 
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="col-lg-12">
                <h1 class="page-header">
                    ARTS <small> Activity Receiving and Tracking System </small>
                </h1>
            </div>
            <!-- ARTS Form -->
            <div class="col-xs-4">
               
              <?php  
                        $attributes = array('id' => 'artsForm', 'class' => 'jsform');
                        echo form_open($url_subType.'/validateSub', $attributes); 
                ?>

                       

                    <div id="rootwizard">
                        <!--navbar starts -->
                        <div class="navbar">
                            <div class="navbar-inner">
                                <div class="container">
                                    <ul>
                                        <li><a href="#tab1" data-toggle="tab">General Details</a></li>
                                        <li><a href="#tab2" data-toggle="tab">Activity Details</a></li>
                                        <li><a href="#tab3" data-toggle="tab">Officer Details</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--navbar ends -->
                        <!-- form wizard content starts -->
                        <div class="tab-content">
                            <div class="tab-pane" id="tab1">
                                <div class="form-group">
                                    <input type="hidden" name="Timestamp" id="Timestamp" value="<?php echo $timestamp;?>">
                        <input type="hidden" name="SubType" id="SubType" value="<?php echo $subType;?>">
                        <input type="hidden" name="OrgName" id="OrgName" value="<?php echo $orgName;?>">

                                    <label for="actTitle">Submission Type</label>
                                    <div><h4><u><?php echo $subType; ?></u></h4></div>

                                    <label for="actTitle">Activity Title</label>
                                    <input type="text" class="form-control" name="ActTitle" required id="ActTitle"/>
                                    <label> </label>

                                    <label for="ActPart">Activity Date Particulars</label>
                                    <select class="form-control" name="ActPart" id="ActPart_select" onchange="showHidden(this)">
                                        <option value="Year Long">Year Long</option>
                                        <option value="Term Long">Term Long</option>        
                                        <option value="One Day">One Day</option>
                                        <option value="Not One Day">Not One Day</option>                    
                                    </select>

                                   
                                    <label> </label>
                                    <label for="tie-up">If tie-up, please indicate other orgs: </label>
                                    <br>
                                    <small>(Please indicate "N/A" if not applicable) </small>
                                    <input type="text" class="form-control" name="TieUp" id="TieUp_select">

                                    <label> </label><br>
                                    <label for="term" name="termLabel" id="termLabel" style="visibility:hidden;">Term</label>
                                    <select class="form-control" name="Term" id="Term_select" style="visibility:hidden;">
                                        <option value=""> </option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>        
                                        <option value="3">3</option>                                            
                                    </select>

                                     <label for="datepicker1" style="visibility:hidden;"> </label>
                                    <div class="input-group">
                                        <input class="form-control" id="datePicker1" name="datePicker1" placeholder="MM/DD/YYY" type="text" style="visibility:hidden;"/>
                                        <span class="input-group-addon" name="dash" id="dash" style="visibility:hidden;">-</span>
                                        <input class="form-control" id="datePicker2" name="datePicker2" placeholder="MM/DD/YYY" type="text" style="visibility:hidden;"/>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane" id="tab2">
                                <div class="form-group">
                                    <label for="actNature">Activity Nature</label>
                                    <select class="form-control" name="ActNature" id="ActNature_select">
                                        <option value ="Academic">Academic</option>
                                        <option value ="Special Interest">Special Interest </option>
                                        <option value ="Departmental Initiative">Departmental Initiative</option>       
                                        <option value ="Fundraising">Fundraising</option>
                                        <option value ="Community Engagement">Community Engagement</option>
                                        <option value ="Organizational Development">Organizational Development</option>
                                        <option value ="Issue Advocacy">Issue Advocacy</option>
                                        <option value ="Lasallian Formation/Spiritual Growth">Lasallian Formation/Spiritual Growth</option>
                                        <option value ="Outreach">Outreach</option>                                                 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="actType">Activity Type</label>
                                    <select class="form-control" name="ActType" id="ActType_select" onchange="if(this.value=='Other'){
                                                                  this.form['Other'].style.visibility='visible';
                                                                  }else if(this.value!='Other'){
                                                                  this.form['Other'].style.visibility='hidden';
                                                                  };">
                                        <option value = "Academic Contest">Academic Contest</option>                         
                                        <option value = "Non-Academic Contest">Non-Academic Contest</option>
                                        <option value = "Distribution">Distribution</option>
                                        <option value = "Seminar/ Workshops">Seminar/ Workshops</option>
                                        <option value = "Publicity/ Awareness Campaign">Publicity/ Awareness Campaign</option>
                                        <option value = "Meetings">Meetings</option>
                                        <option value = "Spiritual Activity">Spiritual Activity</option>
                                        <option value = "Recruitment/Audition">Recruitment/Audition</option>
                                        <option value = "Recreation">Recreation</option>
                                        <option value = "Other">Other</option>      
                                    </select>
                                    <label for="other"> </label>
                                    <input type="text" class="form-control" name="Other" id="Other_select" style="visibility:hidden;"/>
                                </div>
                                <div class="form-group">
                                    <label for="actTime">Activity Time</label>
                                    <input type="text" class="form-control" name="ActTime" id="ActTime_select">
                                </div>
                                <div class="form-group">
                                    <label for="actVenue">Activity Venue</label>
                                    <input type="text" class="form-control" name="ActVenue" id="ActVenue_select">
                                </div>
                            </div>
                            <div class="tab-pane" id="tab3">
                                <div class="form-group">
                                    <label for="subBy">Submitted By</label>
                                    <input type="text" class="form-control" name="SubBy" id="SubBy_select">
                                </div>
                                <div class="form-group">
                                    <label for="contactNum">Contact Number</label>
                                    <input type="text" class="form-control" name="ContactNum" id="ContactNum_select">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="text" class="form-control" name="Email" id="subEmail_select">
                                </div>
                            </div>
                             <ul class="pager wizard">
                                <li class="previous first" style="display:none;"><a href="#">First</a></li>
                                <li class="previous"><a href="#">Previous</a></li>
                                <li class="next" ><a href="#">Next</a></li>
                                <li class="next finish" style="display:none;"><a href="" id="submitBtn" data-toggle="modal" data-target="#confirm-submit"/>Summary</a></li>
                             </ul>

                    </div>  
                </div>

                    <div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                  <h3> Summary Page </h3>
                    </div>
                    <div class="modal-body">
                            
                            <div>
                                <label>Submission Type:</label>
                                <span id = res_SubType></span>
                            </div>

                            <div>
                                <label>Activity Title:</label>
                                <span id = res_ActTitle></span>
                            </div>

                            <div >
                                <label>Activity Date Particulars:</label>
                                <span id = res_ActPart></span>
                            </div>
                            <div>
                                <label>Term:</label>
                                <span id = res_Term></span>
                            </div>
                            <div >
                                <label>Tie-up Orgs:</label>
                                <span id = res_TieUp></span>
                            </div>
                            <div >
                                <label>Activity Nature:</label>
                                <span id = res_ActNature></span>
                            </div>
                            <div>
                                <label>Activity Type:</label>
                                <span id = res_ActType></span>
                            </div>
                            <div>
                                <label>Activity Date:</label>
                                <span id = res_ActDate></span> — 
                                <span id = res_ActDate1></span>
                            </div>
                            <div>
                                <label>Activity Time:</label>
                                <span id = res_ActTime></span>
                            </div>
                            <div>
                                <label>Activity Venue:</label>
                                <span id = res_ActVenue></span>
                            </div>
                            <div>
                                <label>Submitted by:</label>
                                <span id = res_SubBy></span>
                            </div>
                            <div>
                                <label>Contact Number:</label>
                                <span id = res_Contact></span>
                            </div>
                            <div>
                                <label>Email Address:</label>
                                <span id = res_EmailAdd></span>
                    </div>
                
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <input type ="submit" value="Submit" id="submit" class="btn btn-success" data-toggle="modal" data-target ="#submission" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
         </div>
        <div class="modal fade" id="submission" role="dialog" aria-labelledby="myModal" aria-hidden="true" >
             <div class="modal-dialog">
                <div class="modal-content">
                <div id ="modal2" class="modal-body">
                        <label style="font-size :20px">Submission</label>
                        <button  align = "right"type="button" class="btn btn-default" data-dismiss="modal" style="float: right;">Close</button><br>
                        <hr>
                    
                    <div style ="float: center;"</div>
                    </div>
                </div>
                </div>
        </div>
            </form>
       
          <!-- form wizard content ends -->
  
                <script type="text/javascript">
                
                 var $validator = $("#artsForm").validate({
                errorClass: "my-error-class",
                ignore: [],
                rules: {
                    ActTitle: {
                        required: true
                    },
                    TieUp: {
                        required: true
                    },
                    datePicker1: {
                        required: false
                    },
                    datePicker2: {
                        required: false
                    },
                    ActTime: {
                        required: true
                    },
                    ActVenue: {
                        required: true
                    },
                    SubBy: {
                        required: true
                    },
                    ContactNum: {
                        required: true
                    },
                    Email: {
                        required: true,
                        email: true
                    },
                    Other: {
                        required: false
                    }
                }
                 }); 

                    $('#rootwizard').bootstrapWizard({
                          'tabClass': 'nav nav-pills',
                        onTabShow: function(tab, navigation, index) {
                            var $total = navigation.find('li').length;
                            var $current = index+1;
                            var $percent = ($current/$total) * 100;
                            $('#rootwizard').find('.bar').css({width:$percent+'%'});
                            
                            // If it's the last tab then hide the last button and show the finish instead
                            if($current >= $total) {
                                $('#rootwizard').find('.pager .next').hide();
                                $('#rootwizard').find('.pager .finish').show();
                                $('#rootwizard').find('.pager .finish').removeClass('disabled');
                            } else {
                                $('#rootwizard').find('.pager .next').show();
                                $('#rootwizard').find('.pager .finish').hide();
                            }
                          },
                        'onShow': function(tab, navigation, index) {
                            var $valid = $("#artsForm").valid();
                            if($valid)  {
                                 $validator.focusInvalid();
                                return true;
                            }
                        },
                        'onFinish': function(tab, navigation, index) {
                            var $valid = $("#artsForm").valid();
                            if(!$valid)  {
                                 $validator.focusInvalid();
                                return false;
                            }
                        },
                        onTabClick: function(tab, navigation, index) {
                        return false;
                        },
                        

                    }); 


                </script>
</body>
  
    
    <script>
        function showHidden(input){
            var datePicker1 = document.getElementById("datePicker1");
            var dash = document.getElementById("dash");
            var datePicker2 = document.getElementById("datePicker2");
            var termLabel = document.getElementById("termLabel");
            var term = document.getElementById("Term_select");
            
            if(input.value=='Year Long'){
                datePicker1.style.visibility='hidden';
                dash.style.visibility='hidden';
                datePicker2.style.visibility='hidden';
                termLabel.style.visibility='hidden';
                term.style.visibility='hidden';
            }
            else if(input.value=='Term Long'){
                datePicker1.style.visibility='hidden';
                datePicker1.style.visibility='hidden';
                dash.style.visibility='hidden';
                datePicker2.style.visibility='hidden';
                termLabel.style.visibility='visible';
                term.style.visibility='visible';
            }
            else if(input.value=='One Day'){
                datePicker1.style.visibility='visible';
                dash.style.visibility='hidden';
                datePicker2.style.visibility='hidden';
                termLabel.style.visibility='visible';
                term.style.visibility='visible';
            }
            else if(input.value=='Not One Day'){
                datePicker1.style.visibility='visible';
                dash.style.visibility='visible';
                datePicker2.style.visibility='visible';
                termLabel.style.visibility='visible';
                term.style.visibility='visible';
            };
        };   
    </script>
    <!-- DatePicker Script -->
    <script>
        $(document).ready(function(){
            var date_input=$('input[name="datePicker1"]');
            var date = new Date();
            date.setDate(date.getDate()-1);
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
                format: 'yyyy-mm-dd',
                container: container,
                todayHighlight: true,
                autoclose: true,
                startDate: date,
            })
        })
    </script>
    <script>
        $(document).ready(function(){
            var date_input=$('input[name="datePicker2"]');
            var date = new Date();
            date.setDate($('#datePicker1').datepicker("getDate"));
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
                format: 'yyyy-mm-dd',
                container: container,
                todayHighlight: true,
                autoclose: true,
                startDate: date,
            })
                                        })
    </script>
    <script>
        var dateToday = new Date();
        $(function){
            $("datePicker1").datepicker({
                numberOfMonths: 3,
                showButtonPanel: true,
                minDate: dateToday
            })
        }
    </script>
    <!-- Form Validation Script -->

      <script type="text/javascript">
        $(document).ready(function() {
            $('#ActPart').on('change', function() {
                if( $.trim( this.value ) === 'Year Long' ) {
                    $('#datePicker1').val('').prop('disabled', true).closest('p').hide();
                    $('#dash').val('').prop('disabled', true).closest('p').hide();
                    $('#datePicker2').val('').prop('disabled', true).closest('p').hide();
                } else if ($.trim( this.value ) === 'Term Long'){
                    $('#datePicker1').val('').prop('disabled', true).closest('p').hide();
                    $('#dash').val('').prop('disabled', true).closest('p').hide();
                    $('#datePicker2').val('').prop('disabled', true).closest('p').hide();
                } else if ($.trim( this.value ) === 'One Day'){
                    $('#datePicker1').prop('disabled', false).closest('p').show();
                    $('#dash').val('').prop('disabled', true).closest('p').hide();
                    $('#datePicker2').val('').prop('disabled', true).closest('p').hide();
                } else if ($.trim( this.value ) === 'Not One Day'){
                    $('#datePicker1').prop('disabled', false).closest('p').show();
                    $('#dash').val('').prop('disabled', false).closest('p').show();
                    $('#datePicker2').val('').prop('disabled', true).closest('p').hide();
                }
            });
           
        });
               $('#submitBtn').click(function() {
                         /* when the button in the form, display the entered values in the modal */
                         $('#res_SubType').text($('#SubType').val());
                         $('#res_ActVenue').text($('#ActVenue_select').val());
                         $('#res_ActTime').text($('#ActTime_select').val());
                         $('#res_ActDate1').text($('#datePicker2').val());
                         $('#res_ActDate').text($('#datePicker1').val());
                         $('#res_ActNature').text($('#ActNature_select').val());
                         $('#res_ActTitle').text($('#ActTitle').val());
                         $('#res_Contact').text($('#ContactNum_select').val());
                         $('#res_TieUp').text($('#TieUp_select').val());
                         $('#res_Term').text($('#Term_select').val());
                         $('#res_ActPart').text($('#ActPart_select').val());
                         $('#res_EmailAdd').text($('#subEmail_select').val());
                         $('#res_ActType').text($('#ActType_select').val());
                         $('#res_SubBy').text($('#SubBy_select').val());
                    });
                
                    
      </script>

     <script>
        $(document).ready(function(){
            $('form.jsform').on('submit', function(form){
                form.preventDefault();
                $('#confirm-submit').modal('toggle');
                /*$.post('<?php echo $url_subType."/validateSub";?>',, function(data){
                        console.log(data);
                        $('#modal2 div').html(data);

                });*/
                $.ajax({
                    data: $('form.jsform').serialize(),
                 
                    method: "post",
                    url: "<?php echo $url_subType."/validateSub";?>",
                    success: function(data){
                         console.log(data);
                        $('#modal2 div').html(data);

                    },
                    error: function(data){
                        console.log(data);
                        $('#modal2 div').html(data);

                    }

                });

            });
     });
    </script>
</html>