<?php 
	require_once("includes/connection.php");
 ?>

<?php 
	
	$date = date("d/m/Y");
	$select = "::------Select------::";

 ?>
 <?php 

 	if (isset($_POST['submit'])) {
 		$name = $_POST['name'];
 		$reg_number = $_POST['reg_no'];
 		$dob = $_POST['dob'];
 		$state = $_POST['state_origin'];
 		$exam_no = $_POST['exam_no'];
 		$centre_name = $_POST['centre_name'];
 		$sub_1 = $_POST['sub_1'];
 		$sub_2 = $_POST['sub_2'];
 		$sub_3 = $_POST['sub_3'];
 		$sub_4 = $_POST['sub_3'];
 		$score_1 = $_POST['score_1'];
 		$score_2 = $_POST['score_2'];
 		$score_3 = $_POST['score_3'];
 		$score_4 = $_POST['score_4'];
 		$password = $_POST['pass']; 


 		if (empty($name)) {
 			$msg_error = "Please Enter Name";
 		}
 		elseif (empty($reg_number)) {
 			$msg_error = "Please Enter a Valid Registration Number";
 		}
 		elseif (empty($dob)) {
 			$msg_error = "Please Enter a Valid Date of Birth";
 		}
 		elseif (empty($state)) {
 			$msg_error = "Please Enter a Valid State";
 		}
 		elseif (empty($exam_no)) {
 			$msg_error = "Please Enter a Valid Exam Number";
 		}
 		elseif (empty($centre_name)) {
 			$msg_error = "Please Enter a Valid Centre Name";
 		}
 		elseif ($sub_1 == $select) {
 			$msg_error = "Please Select English its Compulsory";
 		}
 		elseif ($sub_2 == $select) {
 			$msg_error = "Please Select your Second Subject";
 		}
 		elseif ($sub_3 == $select) {
 			$msg_error = "Please Select a Third Subject";
 		}
 		elseif ($sub_4 == $select) {
 			$msg_error = "Please Select a Fourth Subject";
 		}
 		elseif (strlen($_POST['score_1']) > 2) {
 			$msg_error = "Score Should Not Exceed two Digits";
 		}
 		elseif (strlen($_POST['score_2']) > 2) {
 			$msg_error = "Score Should not Exceed Two Digits";
 		}
 		elseif (strlen($_POST['score_3']) > 2) {
 			$msg_error = "Score Should Not Exceed Two Digits";
 		}
 		elseif (strlen($_POST['score_4']) > 2) {
 			$msg_error = "Score Should Not Exceed Two Digits";
 		}
 		elseif (empty($score_1)) {
 			$msg_error = "Please Enter a Valid Score";	
 		}
 		elseif (empty($score_2)) {
 			$msg_error = "Please Enter a Valid Score";
 		}
 		elseif (empty($score_3)) {
 			$msg_error = "Please Enter a Valid Score";
 		}
 		elseif (empty($score_4)) {
 			$msg_error = "Please Enter a Valid Score";
 		}
 		elseif(empty($password)){
 			$msg_error = "Please Enter a Valid Password";
 		}
 		elseif (strlen($_POST['pass']) <  5 ) {
 			$msg_error = "Password Must Be Up to 5 Characters";
 		}else{

 			$query = "INSERT INTO results (username, reg_no, dob, state_origin, exam_no, centre_name, sub_1, sub_2, sub_3, sub_4, score_1, score_2, score_3, score_4, password, date_created) 
 								VALUES('{$name}', '{$reg_number}', '{$dob}', '{$state}', '{$exam_no}', '{$centre_name}', '{$sub_1}', '{$sub_2}', '{$sub_3}', '{$sub_4}', '{$score_1}', '{$score_2}', '{$score_3}', '{$score_4}', '{$password}', '{$date}')";
 			$run_query = mysqli_query($con, $query);
 			if ($run_query) {
 				$msg_good = "Results Creation Succesful Kindly Login and Check";
 			}else{
 				$msg_error = "Results Creation Failed";
 			}
 		}

 	}

  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Create My Result</title>
	<link rel="icon"  href="img/st_icon.png">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
			<div id="navbar"  class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right"><br>
					<li role="presentation"><a href="login.php">Signin</a></li>
					<li role="presentation"><a href="index.php">Signup</a></li>
				</ul>
			</div>
		</div>
	</nav><br><br><br><br><br><br>
	<?php 
 		if (isset($msg_error)) {
 			echo "<alert class='alert alert-danger alert_center '>{$msg_error}</alert> <br>";
 		}
 	?>
 	<?php 
 	 	if (isset($msg_good)) {
 	 		echo "<alert class='alert alert-success alert_center'>{$msg_good}</alert> <br>";

 	 	}
 	 ?>
	<div class="container"><br>
		 <div class="row"><br>
		 	<div class="col-md-12">
		 		<h2 class=" text-complete">Create and Edit a Jamb UTME Result Today</h2><br>
	 			<form method="POST" action="" class="form">
	 				<label class="">Enter Full Name</label>
	 				<input type="text" name="name" class="form-control" placeholder="Enter you Choice Name"><br>
	 				<label class="">Enter Reg No</label>
	 				<input type="text" name="reg_no" class="form-control" placeholder="Enter your Choice Reg Number" ><br>
	 				<label class="">Enter Full Date of Birth</label>
	 				<input type="text" name="dob" class="form-control" placeholder="Date of Birth"><br>
	 				<label class="">Enter State of Origin</label>
	 				<input type="text" name="state_origin" class="form-control" placeholder="Enter Your Choice State of Origin"><br>
	 				<label class="">Enter Exam Number</label>
	 				<input type="text" name="exam_no"  class="form-control" placeholder="Enter your Choice Exam Number"><br>
	 				<label class="">Enter Centre Name</label>
	 				<input type="text" name="centre_name" class="form-control" placeholder="Enter your Choice Centre Name"><br>
	 				<label class="">Select Your Subjects 1</label>
	 				<select name="sub_1" class="form-control">
	 					<option><?php echo $select; ?></option>
	 					<option>English</option>
	 				</select><br>
	 				<label class="">Select Your Subjects 2</label>
	 				<select name="sub_2" class="form-control">
	 					<option><?php echo $select; ?></option>
	 					<option>Geography</option>
	 					<option>Maths</option>
	 					<option>Further Maths</option>
	 					<option>Government</option>
	 				</select><br>
	 				<label class="">Select Your Subjects 3</label>
	 				<select name="sub_3" class="form-control">
	 					<option><?php echo $select; ?></option>
	 					<option>Commerce</option>
	 					<option>Biology</option>
	 					<option>Civic-Education</option>
	 					<option>Data- Processing</option>
	 				</select><br>
	 				<label class="">Select Your Subjects 4</label>
	 				<select name="sub_4" class="form-control">
	 					<option><?php echo $select; ?></option>
	 					<option>Physics</option>
	 					<option>Hausa</option>
	 					<option>Chemistry</option>
	 					<option>Geography</option>
	 				</select><br>
	 				<label>English Score</label>
	 				<input type="number" name="score_1" class="form-control" placeholder="Enter First Score"><br>
	 				<label>Subject 2 Score</label>
	 				<input type="number" name="score_2" class="form-control" placeholder="Enter Second Score"><br>
	 				<label>Subject 3 Score</label>
	 				<input type="number" name="score_3" class="form-control" placeholder="Enter Third Score"><br>
	 				<label>Subject 4 Score</label>
	 				<input type="number" name="score_4" class="form-control" placeholder="Enter Fourth Score"><br>
	 				<label>Create Password</label>
	 				<input type="password" name="pass" class="form-control" placeholder="Create a Password Please"><br>
	 				<input type="submit" name="submit" value="Create My Result" class="btn btn-success btn-block">
	 				<a  class="link" href="login.php">Click here if u already have an account</a>
	 			</form><br>
	 			<p class="text-done">Yeah!! You're Almost There Kindly Check and See Your Results at Your Dashboard</p>
		 	</div>
		 </div>
	</div>
	<script src="particles.js-master/particles.js"></script>
	<script src="particles.js-master/demo/js/app.js"></script>
	<script type="text/javascript">
	swal({
	  title: "Welcome!",
	  text: "Enjoy your tour on our Website!",
	  icon: "success",
	  button: "Ok!",
	});
</script>
</body>
</html>
