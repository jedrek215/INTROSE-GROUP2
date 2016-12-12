  <!-- Navigation -->
      <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url("/Admin_Cont");?>">Council of Student Organizations - APS</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <li>Admin</li>
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
                            <a href="<?php echo base_url("/Admin_Cont");?>"><i class="fa fa-table fa-fw"></i> Calendar</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url("/DtsAdmin_Cont");?>"><i class="fa fa-table fa-fw"></i> DTS</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url("/GosmAdmin_Cont");?>"><i class="fa fa-paperclip fa-fw"></i> GOSM</a>
                        </li>
                     
                    </ul>
                </div>
            </div>
        </nav>