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
			Add Rooms
		</p>
	
		<form action="" method="post">

		<label style="font-family:'Times New Roman', Times, serif; font-size:20px">Select Room For</label><br />
		<select name="room_for" class="form-control"><br />
			<option value="">Select Room For</option>
			<option value="Boys">Boys</option>
			<option value="Girls">Girls</option>
		</select>
		
		<label style="font-family:'Times New Roman', Times, serif; font-size:20px">Select Room Type</label><br />
		<select name="room_type" class="form-control"><br />
			<option value="">Select Room Type</option>
			<option value="Single Bed Room">Single Bed Room</option>
			<option value="Double Bed Room">Double Bed Room</option>
			<option value="Triple Bed Room">Triple Bed Room	</option>
		</select>
		
		<label style="font-family:'Times New Roman', Times, serif; font-size:20px">Enter Block</label><br />
		<input type="text" name="block" class="form-control" />
		
		<label style="font-family:'Times New Roman', Times, serif; font-size:20px">Enter Room Number</label><br />
		<input type="text"  name="room_no" class="form-control"  />
		
		<label style="font-family:'Times New Roman', Times, serif; font-size:20px">Enter Room or Bed Charge Per Month</label><br />
		<input type="text"  name="room_charge" class="form-control"  />
		
		
		
		
		<p style="text-align:right; margin-top:20px">
			<input type="submit" value="Add" class="btn btn-danger" name="add_btn" />
		</p>
		
		</form>
	
	</div>

</body>
</html>
<?php

	if(isset($_POST['add_btn']))
	{
		$type=$_POST['room_type'];
		$block=$_POST['block'];
		$room_no=$_POST['room_no'];
		$charge=$_POST['room_charge'];
		$room_for=$_POST['room_for'];
		
		
		if($type=='Single Bed Room')
		{
			$total_bed=1;
		}
		else if($type=='Double Bed Room')
		{
			$total_bed=2;
		}
		else if($type=='Triple Bed Room')
		{
			$total_bed=3;
		}
		
		
				$sql="INSERT INTO `rooms`(`type`, `block`, `room_no`, `charge`, `room_for`, `total_bed`, `avilable_bed`) VALUES ('$type','$block','$room_no','$charge','$room_for','$total_bed','$total_bed')";
				$run=mysqli_query($con,$sql);
				
				?>
					<script>
						alert('Room Successfully Added');
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