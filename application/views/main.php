<html lang="en">
    <head>
        <title>Main</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="js/Chart.js"></script>
        <script src="js/jquery-3.1.1.min.js"></script>
        <link rel="stylesheet" href="css/navigation.css">
    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-left">
                            <div class="iconContainer" id="menu-toggle" onclick="myFunction(this)">
                                <div class="bar1"></div>
                                <div class="bar2"></div>
                                <div class="bar3"></div>
                            </div>
                        </a>
                        <a class="navbar-brand"><?php
                                                echo $orgName; ?></a>
                    </div>
                    <div>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="Login">Log out</a></li>
                        </ul>
                    </div>
                </div>
                <div id="sidebar-wrapper">
                    <ul class="sidebar-nav">
                    <form>
                        <li><a href="Welcome">Dashboard</a></li>
                    </form>
                    <form>    
                        <li><a href="dts">DTS</a></li>
                    </form>
                    <form>    
                        <li><a href="arts">ARTS</a></li>
                    </form>
                    </ul>
                </div>
                <script>
                    $("#menu-toggle").click( function (e){
                        e.preventDefault();
                        $("#wrapper").toggleClass("menuDisplayed");
                    });
                    function myFunction(x) {
                        x.classList.toggle("change");
                    }
                </script>
            </nav>
            <!-- Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Dashboard <small>Statistics Overview</small>
                            </h1>
                        </div>
                        <div class="col-lg-6">
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
                                                <td>Approved</td>
                                                <td><?php 
                                                forEach($approved as $object){
                                                echo $object->count;    
                                                } ?></td>
                                            </tr>
                                            <tr>
                                                <td>Late Approved</td>
                                                <td><?php 
                                                forEach($late_approved as $object){
                                                echo $object->count;
                                                } ?></td>
                                            </tr>
                                            <tr>
                                                <td>Pending</td>
                                                <td><?php 
                                                forEach($pending as $object){
                                                echo $object->count;
                                                } ?></td>
                                            </tr>
                                            <tr>
                                                <td>Denied</td>
                                                <td><?php 
                                                forEach($denied as $object){
                                                echo $object->count;
                                                } ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="panel panel-default text-center">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Pushed Through Ratio</h3>
                                </div>
                                <canvas id="ptrChart" width="350" height="350"></canvas>
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
                                    var config = {
                                        type: 'pie',
                                        data: {
                                            labels: ["Pushed Through Activities", "Non-Pushed Through Activities"],
                                            datasets: [{
                                        label: '%',
                                                data: [12, 4],
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

                                                <?php 
                                                $acad = $Academic[0];
                                                $non_acad = $nonAcademic[0];
                                                $acade = $acad->count;
                                                $nonacade = $non_acad->count;
                                                ?>
                        <div class="col-lg-3">
                            <div class="panel panel-default text-center">
                                <div class="panel-heading">
                                    <h3 class="panel-title">60 - 40 Ratio</h3>
                                </div>
                                <canvas id="6040Chart" width="350" height="350"></canvas>
                                <script type= "text/javascript">
                                    var acad = <?php echo json_encode($acade); ?>;
                                    var non_acad = <?php echo json_encode($nonacade); ?>;

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
                    </div>
                </div>
            </div>
        </div>
        <<?php 
           /* forEach($org as $object){
                echo $object->OrgName . '<br/>';
            }*/
         ?>
    </body>
</html>