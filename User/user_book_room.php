<?php

	session_start();
	
	$email=$_SESSION['user_email'];
	
	if($_SESSION['user_email']==true)
	{
	
	include('../dbcon.php');
	
	$sql="SELECT * FROM `register_form` WHERE `email`='$email'";
	$run=mysqli_query($con,$sql);
	$data=mysqli_fetch_array($run);
	
	

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

	<div class="container" style="background-color:#CCCCCC;  width:100%; padding:20px">
	
		<p style="font-size:24px; color:#fff; font-weight:700">
			Book Your Room
		</p>
	
		<form action="" method="post">
		<div class="row" style="border:1px solid; padding:10px">
			<div class="col-sm-4 col-xs-12" style="border-right:1px solid #000">
			
				<label style="color:#000000; font-size:18px">Select Room Type</label><br />
				<select name="room_type" class="form-control"><br />
					<option value="">Select Room Type</option>
					<option value="Single Bed Room">Single Bed Room</option>
					<option value="Double Bed Room">Double Bed Room</option>
					<option value="Triple Bed Room">Triple Bed Room	</option>
				</select>
			</div>
			
			<div class="col-sm-2 col-xs-12" >
				<input type="submit" class="btn btn-success" value="Search Room" style="margin-top:15px; padding:10px" name="search" />
			</div>
		</div>
		</form>
	
	</div>
	
	<?php
	
	if(isset($_POST['search']))
	{
		$room_type=$_POST['room_type'];
		$gender=$data['gender'];
		
		$sql="SELECT * FROM `rooms` WHERE `type`='$room_type' and `room_for`='$gender' and `avilable_bed`>'0'";
		$run=mysqli_query($con,$sql);
		$row=mysqli_num_rows($run);
		
		if($row>0)
		{
		
			while($data=mysqli_fetch_array($run))
			{
			
				?>
			
				<div class="row" style="border:1px solid #000; padding:10px; margin:10px">
					<div class="col-sm-2 col-xs-12" style="border-right:1px solid">
						<p style="font-size:18px; color:#990000">Room Type</p>
						<p style="color:#000000; font-weight:700"><?php echo $data['type'] ?></p>
					</div>
					<div class="col-sm-1 col-xs-12" style="border-right:1px solid">
						<p style="font-size:18px; color:#990000">Block</p>
						<p style="color:#000000; font-weight:700"><?php echo $data['block'] ?></p>
					</div>
					<div class="col-sm-2 col-xs-12" style="border-right:1px solid">
						<p style="font-size:18px; color:#990000">Room Number</p>
						<p style="color:#000000; font-weight:700"><?php echo $data['room_no'] ?></p>
					</div>
					<div class="col-sm-2 col-xs-12" style="border-right:1px solid">
						<p style="font-size:18px; color:#990000">Room Charge /Month</p>
						<p style="color:#000000; font-weight:700"><?php echo $data['charge'] ?></p>
					</div>
					
					<div class="col-sm-2 col-xs-12" style="border-right:1px solid">
						<p style="font-size:18px; color:#990000">Total Beds</p>
						<p style="color:#000000; font-weight:700"><?php echo $data['total_bed'] ?></p>
					</div>
					<div class="col-sm-2 col-xs-12"  style="border-right:1px solid">
						<p style="font-size:18px; color:#990000">Avilabel Beds</p>
						<p style="color:#000000; font-weight:700"><?php echo $data['avilable_bed'] ?></p>
					</div>
					<div class="col-sm-1 col-xs-12">
						<p >
							<a href="booking_form.php?room_id=<?php echo $data['id'] ?>" style="background-color:#006633; color:#FFFFFF; padding:10px; font-size:18px; text-align:center">Book</a>
						</p>
					</div>
				</div>
				<?php
			
			}
		}
		else
		{
			?>
				<p style="color:#990000; font-size:24px; padding-left:30px">No Rooms Avilable</p>
			<?php
		}
		
		
	}
	
	
	?>
	
	

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