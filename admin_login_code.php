<?php

	include('dbcon.php');
	
	$email=$_POST['email'];
	$password=$_POST['password'];
	
	$sql="SELECT * FROM `admin_detail` WHERE `email`='$email' and `password`='$password'";
	$run=mysqli_query($con,$sql);
	$row=mysqli_num_rows($run);
	
	if($row>0)
	{
			session_start();
			$_SESSION['admin_email']=$email;
			?>
				<script>
					window.location="Admin/admin_dash.php";
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