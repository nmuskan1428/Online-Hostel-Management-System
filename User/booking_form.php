<?php

	session_start();
	
	$email=$_SESSION['user_email'];
	
	if($_SESSION['user_email']==true)
	{
	
	include('../dbcon.php');
	
	$room_id=$_GET['room_id'];
	
	$sql="SELECT * FROM `rooms` WHERE `id`='$room_id'";
	$run=mysqli_query($con,$sql);
	$data=mysqli_fetch_array($run);
	
	
	$sql1="SELECT * FROM `register_form` WHERE `email`='$email'";
	$run1=mysqli_query($con,$sql1);
	$data1=mysqli_fetch_array($run1);
	
	$sql2="SELECT * FROM `bookings` WHERE `email`='$email'";
	$run2=mysqli_query($con,$sql2);
	$fetch=mysqli_fetch_array($run2);
	$count=mysqli_num_rows($run2);
	

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


	<div class="row" style="border:1px solid #000; padding:10px; margin:10px">
	
		<div class="col-sm-3 col-xs-12" style="border-right:1px solid; border-bottom:1px solid">
			<p style="font-size:18px; color:#990000">Name</p>
			<p style="color:#000000; font-weight:700"><?php echo $data1['name'] ?></p>
		</div>
		<div class="col-sm-3 col-xs-12" style="border-right:1px solid; border-bottom:1px solid">
			<p style="font-size:18px; color:#990000">Mobile</p>
			<p style="color:#000000; font-weight:700"><?php echo $data1['mobile'] ?></p>
		</div>
		<div class="col-sm-3 col-xs-12" style="border-right:1px solid; border-bottom:1px solid">
			<p style="font-size:18px; color:#990000">Email</p>
			<p style="color:#000000; font-weight:700"><?php echo $data1['email'] ?></p>
		</div>
		<div class="col-sm-3 col-xs-12" style="border-bottom:1px solid">
			<p style="font-size:18px; color:#990000">Room Type</p>
			<p style="color:#000000; font-weight:700"><?php echo $data['type'] ?></p>
		</div>
		<div class="col-sm-3 col-xs-12" style="border-right:1px solid; border-bottom:1px solid">
			<p style="font-size:18px; color:#990000">Block</p>
			<p style="color:#000000; font-weight:700"><?php echo $data['block'] ?></p>
		</div>
		<div class="col-sm-3 col-xs-12" style="border-right:1px solid; border-bottom:1px solid">
			<p style="font-size:18px; color:#990000">Room No</p>
			<p style="color:#000000; font-weight:700"><?php echo $data['room_no'] ?></p>
		</div>
		<div class="col-sm-6 col-xs-12" style=" border-bottom:1px solid">
			<p style="font-size:18px; color:#990000">Rent</p>
			<p style="color:#000000; font-weight:700"><?php echo $data['charge'] ?> /Month</p>
		</div>
		
		<?php
		
			if($count<1 || $fetch['status']=='Reject' )
			{
				?>
					
					<form action="" method="post">
		
						<div class="col-sm-3 col-xs-12" style="border-right:1px solid;">
							<p style="font-size:18px; color:#990000">Booking From</p>
							<input type="date" class="form-control" name="booking_from" required />
						</div>
						<div class="col-sm-3 col-xs-12" style="border-right:1px solid;">
							<p style="font-size:18px; color:#990000">Food Type</p>
							
							<select name="food_type" class="form-control">
								<option value="">Select Food Type</option>
								<option value="Veg Food">Veg Food</option>
								<option value="Non-Veg Food">Non-Veg Food</option>
							</select>
						</div>
						
									
						<div class="col-sm-3 col-xs-12">
							<p style="margin-top:30px"><input type="submit" value="Book Room" class="btn btn-success" name="book_room" /></p>
						</div>
					
					</form>
				
				<?php
			}
			else if($fetch['status']=='Approved')
			{
				?>
					
					<div class="col-sm-12 col-xs-12" style="text-align:center">
						<p style="font-size:18px; color:#006633; padding-top:10px; font-weight:700">Your Room is Approved...</p>
					</div>
				
				<?php
			}
			else
			{
		
				?>
						
				<div class="col-sm-12 col-xs-12" style="text-align:center">
					<p style="font-size:18px; color:#FF6600; padding-top:10px; font-weight:700">You Already Apply For Room!!!</p>
				</div>
				
			<?php  }  ?>
		
	</div>

</body>
</html>

<?php

	if(isset($_POST['book_room']))
	{
		$name=$data1['name'];
		$mobile=$data1['mobile'];
		$email=$data1['email'];
		$room_type=$data['type'];
		$block=$data['block'];
		$room_no=$data['room_no'];
		$room_rent=$data['charge'];
		$booking_from=$_POST['booking_from'];
		$food_type=$_POST['food_type'];
		
		$mess_charge=0;
		
		if($food_type=='Veg Food')
		{
			$mess_charge=3000;
		}
		else if($food_type=='Non-Veg Food')
		{
			$mess_charge=5000;
		}
		
		
		$sql="INSERT INTO `bookings`(`block`, `room_type`, `booking_from`, `room_charge`, `room_no`, `student_name`, `mobile`, `email`, `food_type`, `mess_charge`) VALUES ('$block','$room_type','$booking_from','$room_rent','$room_no','$name','$mobile','$email','$food_type','$mess_charge')";
		$run=mysqli_query($con,$sql);
		
		
		$avilable_bed=$data['avilable_bed']-1;
		
		$sql1="UPDATE `rooms` SET `avilable_bed`='$avilable_bed' WHERE `id`='$room_id'";
		$run1=mysqli_query($con,$sql1);
		
		?>
			<script>
				alert('Room Successfully Booked...');
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
