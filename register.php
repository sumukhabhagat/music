<?php
	require 'dbconfig/config.php';

?>
<!DOCTYPE html>
<html>
<head>
<title>REGISTRATION PAGE</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body background="images/pp29.gif">
 
<div id="main-wrapper">
<center><h2>REGISTRATION FORM</h2>
<img src="images/music.jpg" class="music"/>
</center>

<form class="myform" action="register.php" method="post"><br>
<label><b>USERNAME:</b></label><br>
<input name="username" type="text" class="inputvalues" placeholder="Type your Username" required/><br>
<label><b>PASSWORD:</b></label><br>
<input name="password" type="password" class="inputvalues" placeholder="Type your Password" required/><br>
<label><b>CONFIRM PASSWORD:</b></label><br>
<input name="cpassword" type="password" class="inputvalues" placeholder="Confirm Password" required/><br>
<input name="submit_btn" type="submit" id="signup_btn" value="Sign Up"/><br>
<a href="index.php"><input type="button" id="back_btn" value="<< Back to Login"/></a>
</form>
	<?php
		if(isset($_POST['submit_btn']))
		{
			//echo '<script type="text/javascript"> alert("Sign Up button clicked") </script>';
			
			$username = $_POST['username'];
			$password = $_POST['password'];
			$cpassword = $_POST['cpassword'];
			
			if($password==$cpassword)
			{
				$query= "select * from user WHERE username='$username' ";
				$query_run = mysqli_query($con,$query);
				
				if(mysqli_num_rows($query_run)>0)
				{
					//there is already a user with the same username
					echo '<script type="text/javascript"> alert("User already exists... Try another username") </script>';
				}
				else
				{
					$query= "insert into user values('$username','$password')";		
					$query_run = mysqli_query($con,$query);
					
					if($query_run)
					{
						echo '<script type="text/javascript"> alert("User Registered... Go to Login page") </script>';
					}
					else
					{
						echo '<script type="text/javascript"> alert("Error!") </script>';
					}
				}
			}
			else{
				echo '<script type="text/javascript"> alert("Password and Confirm password does not match") </script>';
			}
		}
	?>
	</div>
</body>
</html>