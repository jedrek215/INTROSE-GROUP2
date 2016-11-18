<!DOCTYPE html>
<html lang="en">


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
                <a class="navbar-brand" href="Welcome">APS</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <li><?php echo $orgName; ?></li>
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
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Dashboard <small>Statistics Overview</small>
                    </h1>
                </div>
                <div class="col-lg-12">
                    <!-- Status Counts -->
                    <div class="panel panel-default text-center">
                        <div class="panel-heading">
                            <h3 class="panel-title">Pre-Acts Status Counts</h3>
                        </div>
                        <div class="panel-body bg-2">
                            <table class="table table-condensed table-summary table-borderless">
                                <thead>
                                    <th>Status</th>
                                    <th>Count</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="text-align: left">Approved</td>
                                        <td style="text-align: left"><?php 
                                                forEach($approved as $object){
                                                echo $object->count;    
                                                } ?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left">Late Approved</td>
                                        <td style="text-align: left"><?php 
                                                forEach($late_approved as $object){
                                                echo $object->count;
                                                } ?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left">Pending</td>
                                        <td style="text-align: left"><?php 
                                                forEach($pending as $object){
                                                echo $object->count;
                                                } ?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left">Denied</td>
                                        <td style="text-align: left"><?php 
                                                forEach($denied as $object){
                                                echo $object->count;
                                                } ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-default text-center">
                        <div class="panel-heading">
                            <h3 class="panel-title">Pushed Through Ratio</h3>
                        </div>
                        <canvas id="ptrChart" width="350" height="350"></canvas>
                        <script>
                            var config = {
                                type: 'pie',
                                data: {
                                    labels: ["Pushed Through Activities", "Non-Pushed Through Activities"],
                                    datasets: [{
                                        label: '%',
                                        data: [<?php 
                                                forEach($pushed as $object){
                                                echo $object->pushedthrough;    
                                                } ?>, <?php 
                                                forEach($notpushed as $object){
                                                echo $object->pushedthrough;    
                                                } ?>],
                                        backgroundColor: [
                                            "#2ecc71",
                                            "#3498db",
                                        ],
                                    }]
                                },
                                options: {
                                    legend: {
                                        display: true,
                                    },
                                    tooltips: {
                                        enabled: true,
                                    },
                                    showPercentage: true,
                                }
                            };
                            var ctx = document.getElementById("ptrChart").getContext("2d");
                            var myChart = new Chart(ctx, config);
                        </script>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-default text-center">
                        <div class="panel-heading">
                            <h3 class="panel-title">60 - 40 Ratio</h3>
                        </div>
                        <canvas id="6040Chart" width="350" height="350"></canvas>
                        <script>
                            var config = {
                                type: 'pie',
                                data: {
                                    labels: ["Academic Activities", "Non-Academic Activities"],
                                    datasets: [{
                                        label: '%',
                                        data: [<?php 
                                                forEach($Academic as $object){
                                                echo $object->count;    
                                                } ?>, <?php 
                                                forEach($nonAcademic as $object){
                                                echo $object->count;    
                                                } ?>],
                                        backgroundColor: [
                                            "#2ecc71",
                                            "#3498db",
                                        ],
                                    }]
                                },
                                options: {
                                    legend: {
                                        display: true,
                                    },
                                    tooltips: {
                                        enabled: true,
                                    },
                                    showPercentage: true,
                                }
                            };
                            var ctx = document.getElementById("6040Chart").getContext("2d");
                            var myChart = new Chart(ctx, config);
                        </script>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-default text-center">
                        <div class="panel-heading">
                            <h3 class="panel-title">Timing Ratio</h3>
                        </div>
                        <canvas id="timingChart" width="350" height="350"></canvas>
                        <script>
                            var config = {
                                type: 'pie',
                                data: {
                                    labels: ["Activity Within Timing", "Activity Not Within Timing"],
                                    datasets: [{
                                        label: '%',
                                        data: [<?php 
                                                forEach($Within as $object){
                                                echo $object->within;    
                                                } ?>, <?php 
                                                forEach($notWithin as $object){
                                                echo $object->within;    
                                                } ?>],
                                        backgroundColor: [
                                            "#2ecc71",
                                            "#3498db",
                                        ],
                                    }]
                                },
                                options: {
                                    legend: {
                                        display: true,
                                    },
                                    tooltips: {
                                        enabled: true,
                                    },
                                    showPercentage: true,
                                }
                            };
                            var ctx = document.getElementById("timingChart").getContext("2d");
                            var myChart = new Chart(ctx, config);


                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
    <!-- Pie Chart Percentage Script -->
    <script>
        Chart.pluginService.register({
            afterDraw: function (chart, easing) {
                if (chart.config.options.showPercentage || chart.config.options.showLabel) {
                    var self = chart.config;
                    var ctx = chart.chart.ctx;
                    ctx.font = '18px Arial';
                    ctx.textAlign = "center";
                    ctx.fillStyle = "#fff";
                    self.data.datasets.forEach(function (dataset, datasetIndex) {               
                        var total = 0, //total values to compute fraction
                            labelxy = [],
                            offset = Math.PI / 2, //start sector from top
                            radius,
                            centerx,
                            centery, 
                            lastend = 0; //prev arc's end line: starting with 0
                        for (var val of dataset.data) { total += val; } 
                        var i = 0;
                        var meta = dataset._meta[i];
                        while(!meta) {
                            i++;
                            meta = dataset._meta[i];
                        }
                        var element;
                        for(index = 0; index < meta.data.length; index++) {
                            element = meta.data[index];
                            radius = 0.9 * element._view.outerRadius - element._view.innerRadius;
                            centerx = element._model.x;
                            centery = element._model.y;
                            var thispart = dataset.data[index],
                                arcsector = Math.PI * (2 * thispart / total);
                            if (element.hasValue() && dataset.data[index] > 0) {
                                labelxy.push(lastend + arcsector / 2 + Math.PI + offset);
                            }
                            else {
                                labelxy.push(-1);
                            }
                            lastend += arcsector;
                        }
                        var lradius = radius * 3 / 4;
                        for (var idx in labelxy) {
                            if (labelxy[idx] === -1) continue;
                            var langle = labelxy[idx],
                                dx = centerx + lradius * Math.cos(langle),
                                dy = centery + lradius * Math.sin(langle),
                                val = Math.round(dataset.data[idx] / total * 100);
                            if (chart.config.options.showPercentage)
                                ctx.fillText(val + '%', dx, dy);
                            else 
                                ctx.fillText(chart.config.data.labels[idx], dx, dy);
                        }
                        ctx.restore();
                    });
                }
            }
        });
    </script>
</html> 