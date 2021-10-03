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

	<div class="container" style="  width:100%; padding:20px">
	
		<p style="font-size:24px; color:#990000; font-weight:700">
			Booked Room Detail
		</p>
	
	
	
	<?php
	
	
		$sql="SELECT * FROM `bookings`";
		$run=mysqli_query($con,$sql);
		$row=mysqli_num_rows($run);
		
		if($row>0)
		{
		
			while($data=mysqli_fetch_array($run))
			{
			
				?>
			
				<div class="row" style="border:1px solid #000; padding:10px; margin:10px">
					<div class="col-sm-2 col-xs-12" style="border-right:1px solid; border-bottom:1px solid">
						<p style="font-size:18px; color:#000066">Room Type</p>
						<p style="color:#000000; font-weight:700"><?php echo $data['room_type'] ?></p>
					</div>
					<div class="col-sm-2 col-xs-12" style="border-right:1px solid; border-bottom:1px solid">
						<p style="font-size:18px; color:#000066">Block</p>
						<p style="color:#000000; font-weight:700"><?php echo $data['block'] ?></p>
					</div>
					<div class="col-sm-2 col-xs-12" style="border-right:1px solid; border-bottom:1px solid">
						<p style="font-size:18px; color:#000066">Room No.</p>
						<p style="color:#000000; font-weight:700"><?php echo $data['room_no'] ?></p>
					</div>
					<div class="col-sm-2 col-xs-12" style="border-right:1px solid; border-bottom:1px solid">
						<p style="font-size:18px; color:#000066">Rent /Month	</p>
						<p style="color:#000000; font-weight:700"><?php echo $data['room_charge'] ?></p>
					</div>
					
					<div class="col-sm-2 col-xs-12" style="border-right:1px solid; border-bottom:1px solid">
						<p style="font-size:18px; color:#000066">Booking From</p>
						<p style="color:#000000; font-weight:700"><?php echo $data['booking_from'] ?></p>
					</div>
					<div class="col-sm-2 col-xs-12"  style="border-bottom:1px solid">
						<p style="font-size:18px; color:#000066">E-mail Address</p>
						<p style="color:#000000; font-weight:700"><?php echo $data['email'] ?></p>
					</div>
					
					<div class="col-sm-2 col-xs-12"  style="border-right:1px solid">
						<p style="font-size:18px; color:#000066">Student Name</p>
						<p style="color:#000000; font-weight:700"><?php echo $data['student_name'] ?></p>
					</div>
					
					<div class="col-sm-2 col-xs-12"  style="border-right:1px solid">
						<p style="font-size:18px; color:#000066">Mobile No.</p>
						<p style="color:#000000; font-weight:700"><?php echo $data['mobile'] ?></p>
					</div>
					
					<div class="col-sm-2 col-xs-12"  style="border-right:1px solid">
						<p style="font-size:18px; color:#000066">Food Type</p>
						<p style="color:#000; font-weight:700"><?php echo $data['food_type'] ?></p>
					</div>
					
					<div class="col-sm-2 col-xs-12"  style="border-right:1px solid">
						<p style="font-size:18px; color:#000066">Mess Charge</p>
						<p style="color:#000; font-weight:700"><?php echo $data['mess_charge'] ?>/- Per Month</p>
					</div>
					
					
					<?php
					
						if($data['status']=='Reject')
						{
							?>
								<p style="text-align:center; color:#FF0000; font-size:18px; margin-top:20px">Student Request is Rejected...</p>
							<?php
						}
						else if($data['status']=='Approved')
						{
							?>
								<p style="text-align:center; color:#009900; font-size:18px; margin-top:20px">Student Request is Approved...</p>
							<?php
						}
						else
						{
							?>
								<form action="admin_update_room_status.php" method="post">
									<div class="col-sm-4 col-xs-12" style="padding-top:20px">
										
										<input type="hidden" value="<?php echo $data['booking_id']  ?>" name="booking_id" />
										
										<select name="status" class="form-control">
										
											<option value="">Select Status</option>
											<option value="Approved">Approved</option>
											<option value="Reject">Reject</option>
										
										</select>
										
										<p style="text-align:right; margin-top:10px"><input type="submit" value="Update Status" class="btn btn-primary" /></p>
										
									</div>
									</form>
							<?php
						}
					
					?>
										
				</div>
				<?php
			
			}
		
	}
	
	
	?>
	
	
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