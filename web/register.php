<!DOCTYPE html>
<html lang="en">
<head>
  <title>BOOKS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <style>

  </style>
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="img/mylogo.png"></a>

        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">Home</a></li>
                <li><a href="book-list.php">Books</a></li>
                <li class="active"><a href="#">Login</a></li>
            </ul>    
        </div>
        </div> 
    </nav>
<!-- REGISTRATION FORM -->
<div class="text-center" style="padding:50px 0">
	<div class="logo">register</div>
	<!-- Main Form -->
	<div class="login-form-1">
		<form id="register-form" class="text-left" action="create-user.php" method="POST">
			<div class="login-form-main-message"></div>
			<div class="main-login-form">
				<div class="login-group">
					<div class="form-group">
						<label for="reg_username" class="sr-only">Email address</label>
						<input type="text" class="form-control" id="reg_username" name="reg_username" placeholder="username">
					</div>
					<div class="form-group">
						<label for="reg_password" class="sr-only">Password</label>
						<input type="password" class="form-control" id="reg_password" name="reg_password" placeholder="password">
					</div>
					<div class="form-group">
						<label for="reg_password_confirm" class="sr-only">Password Confirm</label>
						<input type="password" class="form-control" id="reg_password_confirm" name="reg_password_confirm" placeholder="confirm password">
					</div>
					
					<div class="form-group">
						<label for="reg_email" class="sr-only">Email</label>
						<input type="text" class="form-control" id="reg_email" name="reg_email" placeholder="email">
					</div>
					<div class="form-group">
						<label for="reg_fullname" class="sr-only">Display Name</label>
						<input type="text" class="form-control" id="reg_displayname" name="reg_displayname" placeholder="display name">
					</div>
				</div>
				<button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
			</div>
			<div class="etc-login-form">
				<p>already have an account? <a href="login.php">login here</a></p>
			</div>
		</form>
	</div>
	<!-- end:Main Form -->
</div>

    
    
</body>
</html>