<?php 

	require_once("includes/connection.php");


	if (isset($_POST['login'])) {
		$user_login = $_POST['username'];
		$user_access = $_POST['userpass'];

		//Ensure Forms are Filled Properly
		if (empty($user_login)) {
			$msg_error = "Please Enter Username";
		}
		elseif (empty($user_access)) {
			$msg_error = "Please Enter Password";
		}
		else{

			$login_query = "SELECT * FROM results WHERE username = '$user_login' && password = '$user_access'";
			$run_query = mysqli_query($con, $login_query);
			if (mysqli_num_rows($run_query) > 0) {
				session_start();

				while ($result = mysqli_fetch_assoc($run_query)) {
					$user_id = $result['id'];

					$_SESSION['user'] = $user_id;
					header('location: dashboard.php');
				}	
			}else{
				$msg_error = "Wrong Username/Password Match";
					
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login~~~ Check Results</title>
	<link rel="icon"  href="img/login.png">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" arial-controls="navbar">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a  class="navbar-brand" href="index.php"><img src="img/play.png">Tradesoft PlayHub</a>
			</div>
			<div id="navbar"  class=" navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right"><br>
					<li role="presentation"><a href="login.php">Signin</a></li>
					<li role="presentation"><a href="index.php">Signup</a></li>
				</ul>
			</div>
		</div>
	</nav><br><br>

	<div class="container"><br>
		<div class="row">
			<div class="col-md-4">&nbsp;</div>
			<div class="col-md-4"><br>
				<?php 

					if (isset($msg_error)) {
						echo "<h6>{$msg_error}</h6>";
					}

				 ?>
				<div class="login_form"> 
					<img class="first_svg" src="img/email.svg"><br>
					<form method="POST" action="">
						<h4 class="text-center login_header"><img src="img/login.png">Login and Check Results</h4><br>
						<label><img src="img/st_icon.png"> Username</label>
						<input type="text" class="form-control" name="username" placeholder="Enter User Name"><br>
						<label><img src="img/pass.png"> Password</label>
						<input type="password" class="form-control" name="userpass" placeholder="Type Password"><br>
						<img class="gif_middle" src="img/load.gif"><br>
						<input type="Submit" name="login" class="btn btn-success btn-block" value="Login">
						<a class="link" href="index.php">Click here if you dont have an account already</a>
					</form>
				</div>
			</div>
			<div class="col-md-4">&nbsp;</div>
		</div>
	</div>
</body>
</html>
