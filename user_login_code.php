<?php

	include('dbcon.php');
	
	$email=$_POST['email'];
	$password=$_POST['password'];
	
	$sql="SELECT * FROM `register_form` WHERE `email`='$email' and `password`='$password'";
	$run=mysqli_query($con,$sql);
	$row=mysqli_num_rows($run);
	
	if($row>0)
	{
			session_start();
			$_SESSION['user_email']=$email;
			?>
				<script>
					window.location="User/user_dash.php";
				</script>
			<?php
	}
	else
	{
		?>
			<script>
				alert('Invalide Username or Password!!!!');
				window.location="index.html";
			</script>
		<?php
	}


?>