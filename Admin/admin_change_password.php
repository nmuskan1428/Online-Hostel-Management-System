<?php

	session_start();
	
	$email=$_SESSION['admin_email'];
	
	if($_SESSION['admin_email']==true)
	{
	
	include('../dbcon.php');
	
	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>

<link href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link href="../bootstrap-3.3.7-dist/css/navbar.css" rel="stylesheet" />
<script src="../bootstrap-3.3.7-dist/jquery-3.2.1.js"></script>
<script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script src="../bootstrap-3.3.7-dist/js/navbar.js"></script>

</head>

<body>

	<div class="container" style="background-color:#CCCCCC; height:600px; width:100%; padding:20px">
	
		<p style="font-size:24px; color:#fff; font-weight:700">
			Change Your Password
		</p>
	
		<form action="" method="post">
		
		<label style="font-family:'Times New Roman', Times, serif; font-size:20px">Enter Old Password</label><br />
		<input type="password"  name="old_pass" class="form-control" />
		
		<label style="font-family:'Times New Roman', Times, serif; font-size:20px">Enter New Password</label><br />
		<input type="password" name="new_pass" class="form-control" />
		
		<label style="font-family:'Times New Roman', Times, serif; font-size:20px">Enter Re-type Password</label><br />
		<input type="password"  name="re_pass" class="form-control"  />
		
		
		<p style="text-align:right; margin-top:20px">
			<input type="submit" value="Update" class="btn btn-danger" name="update_btn" />
		</p>
		
		</form>
	
	</div>

</body>
</html>
<?php

	if(isset($_POST['update_btn']))
	{
		$oldpass=$_POST['old_pass'];
		$newpass=$_POST['new_pass'];
		$repass=$_POST['re_pass'];
		
		if($newpass==$repass)
		{
		
			$sql1="SELECT * FROM `admin_detail` WHERE `email`='$email' and `password`='$oldpass'";
			$run1=mysqli_query($con,$sql1);
			$count=mysqli_num_rows($run1);
			
			if($count>0)
			{
		
				$sql="UPDATE `admin_detail` SET `password`='$newpass' WHERE `email`='$email' and `password`='$oldpass'";
				$run=mysqli_query($con,$sql);
				
				?>
					<script>
						alert('Password Successfully Update');
					</script>
				<?php
				
			}
			else
			{
				?>
					<script>
						alert('Enter Corect Password!!!!');
					</script>
				<?php
			}
			
		}
		else
		{
			?>
				<script>
					alert('Password or Re-password is Not Match!!!');
				</script>
			<?php
		}
		
	}


}
else
{
	?>
		<script>
			window.location="../index.html";
		</script>
	<?php
}


?>