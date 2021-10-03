<?php

	include('dbcon.php');

	$name=$_POST['name'];
	$mobile=$_POST['mobile'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$repassword=$_POST['repassword'];
	$gender=$_POST['gender'];
	$address=$_POST['address'];
	
	if($password==$repassword)
	{
		$sql="INSERT INTO `register_form`(`name`, `mobile`, `email`, `password`, `gender`, `address`) VALUES ('$name','$mobile','$email','$password','$gender','$address')";
		$run=mysqli_query($con,$sql);
		
		if($run)
		{
			?>
				<script>
					alert('User Successfully Register');
					window.location="register.html";
				</script>
			<?php
		}
		
	}
	else
	{
	
		?>
			<script>
				alert('Password or re-password not match!!!');
				window.location="register.html";
			</script>
		<?php
	
	}


?>
