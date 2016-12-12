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
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
                format: 'yyyy-mm-dd',
                container: container,
                todayHighlight: true,
                autoclose: true,
            })
        })
    </script>
    <script>
        $(document).ready(function(){
            var date_input=$('input[name="datePicker2"]');
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
                format: 'yyyy-mm-dd',
                container: container,
                todayHighlight: true,
                autoclose: true,
            })
                                        })
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
                         $('#res_ActDate1').text($('#datepicker2').val());
                         $('#res_ActDate').text($('#datepicker1').val());
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

                    $('#submit').click(function(){
                         /* when the submit button in the modal is clicked, submit the form */
                        alert('submitting');
                        $('#formfield').submit();
                    });
              </script>