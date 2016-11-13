<html lang="en">
    <head>
        <title>Main</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
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
                        <a class="navbar-brand">APS Client</a>
                    </div>
                    <div>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="login.html">Log out</a></li>
                        </ul>
                    </div>
                </div>
                <div id="sidebar-wrapper">
                    <ul class="sidebar-nav">
                        <li><a href="index.html">Dashboard</a></li>
                        <li><a href="dts.html">DTS</a></li>
                        <li><a href="arts.html">ARTS</a></li>
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
                                ARTS <small>Pre-Acts Form</small>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>