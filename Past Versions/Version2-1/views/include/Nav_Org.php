  <!-- Navigation -->
      <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url("/Welcome");?>">Council of Student Organizations - APS</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <li><?php echo $orgName;?></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo base_url("/Login");?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo base_url("/Welcome");?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url("/DtsOrg_Cont");?>"><i class="fa fa-table fa-fw"></i> DTS</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> ARTS<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url("/InitSub");?>">Initial Submission</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url("/Pended");?>">Pended</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url("/NotGosm");?>">Not In GOSM</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url("/Change");?>">In Case of Change</a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="GosmOrg_Cont"><i class="fa fa-paperclip fa-fw"></i> GOSM</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>