<?php

	session_start();
	
	$email=$_SESSION['admin_email'];
	
	if($_SESSION['admin_email']==true)
	{
	
	include('../dbcon.php');
	
	$booking_id=$_POST['booking_id'];
	$status=$_POST['status'];
	
	$sql="UPDATE `bookings` SET `status`='$status' WHERE `booking_id`='$booking_id'";
	$run=mysqli_query($con,$sql);
	
	
	if($status=='Reject')
	{
		$sql="SELECT * FROM `bookings` WHERE `booking_id`='$booking_id'";
		$run=mysqli_query($con,$sql);
		$fetch=mysqli_fetch_array($run);
		
		$room_no=$fetch['room_no'];
		
		$sql1="SELECT * FROM `rooms` WHERE `room_no`='$room_no'";
		$run1=mysqli_query($con,$sql1);
		$fetch1=mysqli_fetch_array($run1);
		
		$avilable_bed=$fetch1['avilable_bed']+1;
		
		
		
		$sql1="UPDATE `rooms` SET `avilable_bed`='$avilable_bed' WHERE `room_no`='$room_no'";
		$run1=mysqli_query($con,$sql1);
		?>
			<script>
				alert('Student Request Rejected...');
				window.location="admin_view_user.php";
			</script>
		<?php
		
	}
	else
	{
	
		$sql="SELECT * FROM `bookings` WHERE `booking_id`='$booking_id'";
		$run=mysqli_query($con,$sql);
		$fetch=mysqli_fetch_array($run);
		
		$email=$fetch['email'];
		
		$sql2="DELETE FROM `bookings` WHERE `email`='$email' and `status`='Reject'";
		$run2=mysqli_query($con,$sql2);
		
	
		?>
			<script>
				alert('Student Room Successfully Booked...');
				window.location="admin_view_user.php";
			</script>
		<?php
	}
	

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