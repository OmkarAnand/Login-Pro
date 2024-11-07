<?php
$login=0;
$invalid=0;


if($_SERVER['REQUEST_METHOD']=='POST'){
	include 'connectdb.php';
	$username=$_POST['username'];
	$password=$_POST['password'];

	$sql="Select * from `regis` where 
	username='$username' and password='$password'";


	$result=mysqli_query($con,$sql);
	if($result){
		$num=mysqli_num_rows($result);
		if($num>0){
			$login=1;
            session_start();
            $_SESSION['username']=$username;
            header('location:home.php');
		}else{
           $invalid=1;
        }

		}
	}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css"> <!-- Assuming you have your own stylesheet -->
<link rel="stylesheet" href="login1.css">
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
if($invalid){
	echo'<div class="alert alert-danger alert-top" role="alert">
  Invalid Credentials !
</div>';
}

?>
<?php
if($login){
	echo'<div class="alert alert-success alert-top" role="alert">
  You are successfully Logged in!
</div>';
}

?>

	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form action="login.php" method="post">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="text" name="username" placeholder="User name" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<button>Login</button>
				</form>
			</div>
	</div>
</body>
</html>