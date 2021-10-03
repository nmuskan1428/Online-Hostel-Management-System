<?php

	session_start();
	
	$email=$_SESSION['admin_email'];
	
	if($_SESSION['admin_email']==true)
	{

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin Dashboard</title>

<link href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link href="../bootstrap-3.3.7-dist/css/navbar.css" rel="stylesheet" />
<script src="../bootstrap-3.3.7-dist/jquery-3.2.1.js"></script>
<script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script src="../bootstrap-3.3.7-dist/js/navbar.js"></script>

</head>

<body>

	<p style="text-align:center; border-bottom:2px solid #000">
		<img src="../image/logo.png" style="width:50%; height:100px" />
	</p>
	
	<div class="row">
	
		<div class="col-sm-2 col-xs-12" style="border-right:2px solid #000; height:600px">
		
			<p style="text-align:center; padding-bottom:20px; font-size:18px; color:#990000; font-weight:700">Welcome Admin Dashboard</p>
		
			<p style="font-size:20px; text-align:center; text-transform:uppercase"><a href="admin_profile.php" style="color:#000066" target="admin_frame">Your Profile</a></p>
			<hr />
			<p style="font-size:20px; text-align:center; text-transform:uppercase"><a href="admin_change_password.php" style="color:#000066" target="admin_frame">Change Password</a></p>
			<hr />
			<p style="font-size:20px; text-align:center; text-transform:uppercase"><a href="admin_view_user.php" style="color:#000066" target="admin_frame">View User</a></p>
			<hr />
			<p style="font-size:20px; text-align:center; text-transform:uppercase"><a href="admin_add_room.php" style="color:#000066" target="admin_frame">Add Rooms</a></p>
			<hr />
			<p style="font-size:20px; text-align:center; text-transform:uppercase"><a href="admin_view_rooms.php" style="color:#000066" target="admin_frame">View Rooms</a></p>
			<hr />
			<p style="font-size:20px; text-align:center; text-transform:uppercase"><a href="warden_detail.php" style="color:#000066" target="admin_frame">Warden Detail</a></p>
			<hr />
			<p style="font-size:20px; text-align:center; text-transform:uppercase"><a href="logout.php" style="color:#000066">Logout</a></p>
			<hr />
			
		
		</div>
		
		<div class="col-sm-10 col-xs-12"> 
			<iframe src="" style="width:100%; height:600px" name="admin_frame"></iframe>
		</div>
		
	</div>


</body>
</html>
<?php
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