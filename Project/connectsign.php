<?php

$succes=0;
$user=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
	include 'connectdb.php';
	$username=$_POST['username'];
	$password=$_POST['password'];

	$sql="Select * from `regis` where 
	username='$username'";


	$result=mysqli_query($con,$sql);
	if($result){
		$num=mysqli_num_rows($result);
		if($num>0){
			//echo "User already exists";
			$user=1;
		}else{
			$sql="INSERT INTO `regis` (username, password)
			 VALUES ('$username', '$password')";
			$result=mysqli_query($con,$sql);
			if($result){ 
				//echo "Signup Successful";
				$succes=1;
				header('location:login.php');
			}else{
				die(mysqli_error($con));
			}
		}
	}
}




?>



<!DOCTYPE html>
<html>
<head>
	<title>Signup Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css"> <!-- Assuming you have your own stylesheet -->
<link rel="stylesheet" href="style.css">
<style>
		/* Style for the alert to ensure it appears at the top */
		.alert-top {
			position: absolute;
			top: 0;
			width: 100%;
			z-index: 1000;
			text-align: center;
			border-radius: 0;
			margin: 0;
		}
		.main {
			margin-top: 60px; /* Adjust the margin to push the form down */
		}
	</style>

</head>
<body>

<?php
if($user){
	echo'<div class="alert alert-danger alert-top" role="alert">
  Opps User already exists!
</div>';
}

?>
<?php
if($succes){
	echo'<div class="alert alert-success alert-top" role="alert">
  You are successfully Signup!
</div>';
}

?>


	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form action="connectsign.php" method="post">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="username" placeholder="User name" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<button>Sign up</button>
				</form>
			</div>
	</div>
</body>
</html>