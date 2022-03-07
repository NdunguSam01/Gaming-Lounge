<?php
//session_start();

$db=mysqli_connect("localhost","root","","gaming");

if (isset($_POST['registration'])) 
{
	$userName=$_POST['userName'];
	$password=$_POST['password'];
	$password1=$_POST['password1'];

	if ($password==$password1) 
	{
		$password=md5($password);
		$sql="INSERT INTO admin(userName,password) VALUES('$userName','$password')";
		mysqli_query($db,$sql);
		header("location:AdminLogin.php");
	}
	else
	{
		echo "The two passwords do not match";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>ADMIN REGISTRATION FORM</title>
	<link rel="stylesheet" type="text/css" href="Reg.css">
</head>
<body>
      <div class="navigation">
    <div>
      <ul class="nav">

        
        <li><a class="special" href="MainPage.php">Home</a></li>
        <img src ="Login.webp"  class="logo" alt="logos" width="200" height="200">
      </ul>
    </div>
  </div>
  <div class ="header">
            <img src ="AdminReg.webp" style="width: 100%" "height: 100%">	
        </div>	
<div class=loginbox>
	<form class="signup" action="AdminReg.php" method="post" >
			<fieldset>


				<div class="head">
					<h1>Sign up</h1>
				</div>
				<div class="body">
				<label for="username" class="label-title">Username</label>
				<br>
				<input type="text" class="form-input" name="userName" placeholder ="Enter your username">
				<br>
				<label for="password" class="label-title">Password</label>
				<br>
				<input type="password" name="password" class="form-input" placeholder="Enter your password" required="required">
				<br>
				<label for="Confirm_password" class="label-title">Confirm Password *</label>
    			<input type="password" name="password1" class="form-input"placeholder="Confirm your password again" required="required">

				<div class="form-footer">
						<center>
							 <button type="submit" class="btn" name="registration">Create</button><br><br>
							  <a href="AdminLogin.php">Have an account?</a>
						</center>

								</div>
			</fieldset>




	</form>
</div>
</body>
</html>