<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ARTS</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <script src="vendor/jquery/jquery-3.1.1.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/metisMenu/metisMenu.min.js"></script>
    <script src="dist/js/sb-admin-2.js"></script>
    <script src="vendor/jquery/jquery.bootstrap.wizard.min.js"></script>
    <script src="vendor/bootstrap-datepicker.min.js"></script>
</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">APS</a>
            </div>
            <!-- /.navbar-header -->
             <ul class="nav navbar-top-links navbar-right">
           <!---     <li><?php echo $orgName; ?></li>-->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="Login"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="Welcome"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="dts_Cont"><i class="fa fa-table fa-fw"></i> DTS</a>
                        </li>
                        <li>
                            <a href="Arts_Cont"><i class="fa fa-edit fa-fw"></i> ARTS</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="col-lg-12">
                <h1 class="page-header">
                    ARTS <small> Activity Receiving and Tracking System </small>
                </h1>
            </div>
            <!-- ARTS Form -->
            <div class="col-xs-4">
                <div id="rootwizard">
                    <!--navbar starts -->
                    <div class="navbar">
                        <div class="navbar-inner">
                            <div class="container">
                                <ul>
                                    <li><a href="#tab1" data-toggle="tab">General Details</a></li>
                                    <li><a href="#tab2" data-toggle="tab">Activity Details</a></li>
                                    <li><a href="#tab3" data-toggle="tab">Officer Details</a></li>
                                    <li><a href="#tab4" data-toggle="tab">Summary</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--navbar ends -->
                    <!-- form wizard content starts -->
                    <div class="tab-content">
                        <div class="tab-pane" id="tab1">
                            <div class="form-group">
                                <label for="subType">Submission Type</label>
                                <select class="form-control" name="subType" id="subType_select">
                                    <option>Initial Submission</option>
                                    <option>Pended</option>		
                                    <option>In Case of Change</option>
                                    <option>Not in GOSM</option>																											
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="actTitle">Activity Title</label>
                                <input type="text" class="form-control" id="actTitle">
                            </div>
                            <div class="form-group">
                                <label for="datePart">Activity Date Particulars</label>
                                <select class="form-control" name="datePart" id="datePart_select">
                                    <option>Year Long</option>
                                    <option>Term Long</option>		
                                    <option>One Day</option>
                                    <option>More Than One Day</option>																											
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="subType">Term</label>
                                <select class="form-control" name="term" id="term_select">
                                    <option>1</option>
                                    <option>2</option>		
                                    <option>3</option>																											
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tie-up">If tie-up, please indicate other orgs: </label>
                                <small>(Please indicate "N/A" if not applicable) </small>
                                <input type="text" class="form-control" id="tie-up">
                            </div>
                        </div>
                        <div class="tab-pane" id="tab2">
                            <div class="form-group">
                                <label for="actNature">Activity Nature</label>
                                <select class="form-control" name="actNature" id="actNature_select">
                                    <option>Academic</option>
                                    <option>Organizational Development</option>		
                                    <option>Issue Advocacy</option>
                                    <option>Special Interest</option>																											
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="actType">Activity Type</label>
                                <select class="form-control" name="actType" id="actType_select">
                                    <option>Choice</option>																											
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="datepicker1">Activity Date</label>
                                <div class="input-group">
                                    <input class="form-control" id="datepicker1" name="datepicker1" placeholder="MM/DD/YYY" type="text"/>
                                    <span class="input-group-addon">-</span>
                                    <input class="form-control" id="datepicker2" name="datepicker2" placeholder="MM/DD/YYY" type="text"/>
                                </div>
                                <script>
                                    $(document).ready(function(){
                                        var date_input=$('input[name="datepicker1"]');
                                        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                                        date_input.datepicker({
                                            format: 'mm/dd/yyyy',
                                            container: container,
                                            todayHighlight: true,
                                            autoclose: true,
                                        })
                                    })
                                </script>
                                <script>
                                    $(document).ready(function(){
                                        var date_input=$('input[name="datepicker2"]');
                                        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                                        date_input.datepicker({
                                            format: 'mm/dd/yyyy',
                                            container: container,
                                            todayHighlight: true,
                                            autoclose: true,
                                        })
                                    })
                                </script>
                            </div>
                            <div class="form-group">
                                <label for="actTime">Activity Time</label>
                                <input type="text" class="form-control" id="actTime">
                            </div>
                            <div class="form-group">
                                <label for="actVenue">Activity Venue</label>
                                <input type="text" class="form-control" id="actVenue">
                            </div>
                        </div>
                        <div class="tab-pane" id="tab3">
                            <div class="form-group">
                                <label for="subBy">Submitted By</label>
                                <input type="text" class="form-control" id="subBy">
                            </div>
                            <div class="form-group">
                                <label for="contactNum">Contact Number</label>
                                <input type="text" class="form-control" id="contactNum">
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="text" class="form-control" id="email">
                            </div>
                        </div>
                        <div class="tab-pane" id="tab4">
                            <div class="form-group">
                                <label>Submission Type</label>
                            </div>
                            <div class="form-group">
                                <label>Activity Title</label>
                            </div>
                            <div class="form-group">
                                <label>Activity Date Particulars</label>
                            </div>
                            <div class="form-group">
                                <label>Term</label>
                            </div>
                            <div class="form-group">
                                <label>Tie-up Orgs</label>
                            </div>
                            <div class="form-group">
                                <label>Activity Nature</label>
                            </div>
                            <div class="form-group">
                                <label>Activity Type</label>
                            </div>
                            <div class="form-group">
                                <label>Activity Date</label>
                            </div>
                            <div class="form-group">
                                <label>Activity Time</label>
                            </div>
                            <div class="form-group">
                                <label>Activity Venue</label>
                            </div>
                            <div class="form-group">
                                <label>Submitted by</label>
                            </div>
                            <div class="form-group">
                                <label>Contact Number</label>
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                            </div>
                        </div>
                        <ul class="pager wizard">
                            <li class="previous first" style="display:none;"><a href="#">First</a></li>
                            <li class="previous"><a href="#">Previous</a></li>
                            <li class="next last" style="display:none;"><a href="#">Last</a></li>
                            <li class="next"><a href="#">Next</a></li>
                            <li class="submit"><a href="#">Submit</a></li>
                        </ul>
                    </div>	
                </div>
                <!-- form wizard content ends -->
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#rootwizard').bootstrapWizard();
                    });
                </script>
            </div>
        </div>
    </div>
</body>
</html>
