<?php 
	
	require_once('includes/connection.php');
?>
<?php 
 	session_start();
?>
<?php 

	$query = "SELECT * FROM results WHERE id = '{$_SESSION['user']}'";
 	$run_query = mysqli_query($con, $query);

 	if (mysqli_num_rows($run_query) == 1) {
 		while ($result = mysqli_fetch_assoc($run_query)) {
 			$user_id = $result['id'];
 			$user_name = $result['username'];
 			$reg_no = $result['reg_no'];
 			$dob = $result['dob'];
 			$state = $result['state_origin'];
 			$exam_no = $result['exam_no'];
 			$centre = $result['centre_name'];
 			$english = $result['sub_1'];
 			$sub_2 = $result['sub_2'];
 			$sub_3 = $result['sub_3'];
 			$sub_4 = $result['sub_4'];
 			$english_score = $result['score_1'];
 			$score_2 = $result['score_2'];
 			$score_3 = $result['score_3'];
 			$score_4 = $result['score_4'];
 		}
 	}
?>
<?php 
	
	$total = $english_score + $score_2 + $score_3 + $score_4;

	
	if (isset($_POST['see_result'])) {
		  $result = "

		  	<div class='container'>
		  		<div class='row'>
		  			<div class='col-md-12'>
		  				<div class='result_container'><br>
		  				<img class='dash_logo' src='img/logo.jpg'> 
		  				<h1 class='utme text-center'>Jamb 2019 UTME Results Notification</h1>
		  				<div class='user_details_dash'>
	  						 Name: <b> $user_name</b><br>
	  				 		 Reg Number: <b> $reg_no</b><br>
	  				  		 Date of Birth: <b>$dob</b><br>
	  				  		 State of Origin: <b>$state</b><br>
	  				  		 Exam No: <b>$exam_no</b><br>
	  				  		 Centre Name: <b>$centre</b>
		  				</div>
		  				<div class='table-responsive'>
		  					<table class='table table-bordered'>
		  						<thead>
		  							<tr>
		  								<th class='sub'>Subject</th>
		  								<th class='st_score'>Score</th>
		  							</tr>
		  						</thead>
		  						<tbody>
		  							<tr>
		  								<td>$english</td>
		  								<td>$english_score</td>
		  							</tr>
		  						</tbody>
		  						<tbody>
		  							<tr>
		  								<td>$sub_2</td>
		  								<td>$score_2</td>
		  							</tr>
		  						</tbody>
		  						<tbody>
		  							<tr>
		  								<td>$sub_3</td>
		  								<td>$score_3</td>
		  							</tr>
		  						</tbody>
		  						<tbody>
		  							<tr>
		  								<td>$sub_4</td>
		  								<td>$score_4</td>
		  							</tr>
		  						</tbody>
		  					</table>
		  				</div>
		 			 </diV>
		  			</div>
		  		</div>
		  	</div>

		  	<div class='text-center score'>Total: $total</diV>

		  ";
	}

?>
 
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="icon"  href="img/st_icon.png">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery-1-13.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body >
	<h1  class="text-center">Welcome to your Dashboard <?php echo "$user_name"; ?></h1>
	<h2 class="text-center">Thank you for Creating with  us</h2>
	<div class="text-center">
		<form method="POST">
			<input type="submit" name="see_result" class="btn btn-info" value="See My Result">
		</form>
	</div>
	<?php 
		if (isset($result)) {
			echo "$result";
		}

	 ?>
</body>
</html>

