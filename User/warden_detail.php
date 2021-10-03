<?php

	session_start();
	
	$email=$_SESSION['user_email'];
	
	if($_SESSION['user_email']==true)
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
			Warden Detail
		</p>

	
	
	
	<?php
	
	
		$sql="SELECT * FROM `warden_detail`";
		$run=mysqli_query($con,$sql);
		$row=mysqli_num_rows($run);
		
		if($row>0)
		{
		
			while($data=mysqli_fetch_array($run))
			{
			
				?>
			
				<div class="row" style="border:1px solid #000; padding:10px; margin:10px">
					<div class="col-sm-2 col-xs-12" style="border-right:1px solid;">
						<p style="font-size:18px; color:#000066">Warden Name</p>
						<p style="color:#000000; font-weight:700"><?php echo $data['warden_name'] ?></p>
					</div>
					<div class="col-sm-2 col-xs-12" style="border-right:1px solid;">
						<p style="font-size:18px; color:#000066">Mobile Number</p>
						<p style="color:#000000; font-weight:700"><?php echo $data['mobile'] ?></p>
					</div>
					<div class="col-sm-2 col-xs-12" style="border-right:1px solid;">
						<p style="font-size:18px; color:#000066">Gender</p>
						<p style="color:#000000; font-weight:700"><?php echo $data['gender'] ?></p>
					</div>
					<div class="col-sm-6 col-xs-12" >
						<p style="font-size:18px; color:#000066">Address</p>
						<p style="color:#000000; font-weight:700"><?php echo $data['address'] ?></p>
					</div>
					
				<?php  }
				
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