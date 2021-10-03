<?php

	session_start();
	
	$email=$_SESSION['admin_email'];
	
	if($_SESSION['admin_email']==true)
	{
	
	include('../dbcon.php');
	
	$sql="SELECT * FROM `admin_detail` WHERE `email`='$email'";
	$run=mysqli_query($con,$sql);
	$fetch=mysqli_fetch_array($run);

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
	
		<form action="" method="post">
		
		<label style="font-family:'Times New Roman', Times, serif; font-size:20px">Admin Name</label><br />
		<input type="text" value="<?php echo $fetch['name']  ?>" name="name" class="form-control" />
		
		<label style="font-family:'Times New Roman', Times, serif; font-size:20px">Admin Mobile Number</label><br />
		<input type="text" value="<?php echo $fetch['mobile']  ?>" name="mobile" class="form-control" />
		
		<label style="font-family:'Times New Roman', Times, serif; font-size:20px">Admin E-mail Address</label><br />
		<input type="text" value="<?php echo $fetch['email']  ?>" name="email" class="form-control" readonly="true" />
		
		<label style="font-family:'Times New Roman', Times, serif; font-size:20px">Admin Password</label><br />
		<input type="text" value="<?php echo $fetch['password']  ?>" name="password" class="form-control" readonly="true" />
		
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
		$name=$_POST['name'];
		$mobile=$_POST['mobile'];
		
		
		$sql="UPDATE `admin_detail` SET `name`='$name',`mobile`='$mobile' WHERE `email`='$email'";
		$run=mysqli_query($con,$sql);
		?>
			<script>
				alert('Profile Successfully Update');
			</script>
		<?php
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