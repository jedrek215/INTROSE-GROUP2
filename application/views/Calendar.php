<html>           
           <!-- Page Content -->
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Calendar <small></small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <div class="panel panel-default text-center">
                            <div class="panel-heading">
                                <h3 class="panel-title"></h3>
                            </div>
                            <div class="panel-body bg-2">
                                <div id='calendar'>
                                    <script>
                                        $(document).ready(function() {
                                            // page is now ready, initialize the calendar...
                                            $('#calendar').fullCalendar({
                                                // put your options and callbacks here
                                                allDayText: '',
                                                header: {
                                                    left: 'prev,next today',
                                                    center: 'title',
                                                    right: 'month,listMonth'
                                                }, 
                                               eventLimit: true,
                                                events:{
                                                    url: "<?php echo base_url('Admin_Cont/getEvents');?>", 
                                                    error: function(){
                                                        
                                                    },
                                                    success: function(){
                                                        console.log('success!');
                                                    }

                                                },
                                                
                                                height: 520
                                            })
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html> 