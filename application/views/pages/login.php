<html lang="en">
    <head>
        <title>Main</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="js/jquery-3.1.1.min.js"></script>
        <style>
            .container {
                padding: 25px;
                position: fixed;
            }

            .form-login {
                background-color: #EDEDED;
                padding-top: 10px;
                padding-bottom: 20px;
                padding-left: 20px;
                padding-right: 20px;
                border-radius: 15px;
                border-color:#d2d2d2;
                border-width: 5px;
                box-shadow:0 1px 0 #cfcfcf;
            }

            h4 { 
                border:0 solid #fff; 
                border-bottom-width:1px;
                padding-bottom:10px;
                text-align: center;
            }

            .form-control {
                border-radius: 10px;
            }

            .wrapper {
                text-align: center;
            }    
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-offset-5 col-md-3">
                    <div class="form-login">
                        <h4>APS Client</h4>
                        <input type="text" id="userName" class="form-control input-sm chat-input" placeholder="username" />
                        <input type="text" id="userPassword" class="form-control input-sm chat-input" placeholder="password" />
                        <div class="wrapper">
                            <input type="submit" value="Sign in" class="btn btn-success btn-sm" onclick = "logIn();return false"/>
                        </div>
                    </div>          
                </div>
            </div>
        </div>
		<script>
			function logIn(){
				window.location = 'index.html';
			}
		</script>
    </body>
</html>