<html lang="en">
  
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-offset-5 col-md-3">
                    <div class="form-login">
                        <h4>Council of Student Organizations</h4>
                        <?php echo validation_errors(); ?>
                        <?php echo form_open('verify_login'); ?>
                            <input type="text" id="userName" class="form-control input-sm chat-input" placeholder="Organization" name="username" />
                            <input type="text" id="userPassword" class="form-control input-sm chat-input" placeholder="Password" />
                            <div class="wrapper">
                                <input type="submit" value="Sign in">

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