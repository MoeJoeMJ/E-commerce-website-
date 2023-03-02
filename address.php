<?php 
	session_start(); 
	if (!isset($_SESSION['emailid']))
	{
		header("Location: login.php");
	}
	if (isset($_POST['btnDeliver']))
	{
		$line1 = $_POST['txtLine1'];
		$line2 = $_POST['txtLine2'];
		$line3 = $_POST['txtLine3'];
		$pincode = $_POST['txtPIN'];
		
		$emailid = $_SESSION['emailid'];
		include("dbcon.php");
		
		$cartid = rand(1001,9999);
		$dateadded = date("d-m-Y");
		
		$query1 = "insert into tabaddress (emailid, cartid, line1, line2, line3, pincode) values('$emailid','$cartid','$line1','$line2','$line3','$pincode')";
		mysql_query($query1, $con);
		
		$query2 = "select * from tabcart where emailid='$emailid'";
		$result2 = mysql_query($query2, $con);
		while ($record2 = mysql_fetch_array($result2))
		{
			$productcode = $record2[2];
			$productname = $record2[3];
			$productprice = $record2[4];
			$quantity = $record2[5];
			$query3 = "insert into tabsold (emailid, cartid, productcode, productname, productprice, quantity, dateadded) values('$emailid','$cartid','$productcode','$productname','$productprice','$quantity','$dateadded')";
			mysql_query($query3, $con);
			
			
		}
		$query4 = "delete from tabcart where emailid='$emailid'";
		mysql_query($query4);
		if (mysql_affected_rows($con) > 0)
		{
			$info = "Products purchased successfully!";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title><?php include("title.txt"); ?></title>

		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
			<div class="row" style="margin-top:10px;">
				<?php include("usercontrol.php"); ?>
			</div>

		<?php include("nav.php"); ?>

		<div class="container" style="margin-top:100px; color: white;">
			<div class="row">
				<h3>Deliver to Address</h3>
				<form name="form1" method="post" action="" class="form-horizontal" style="margin-top:30px;">
					<div class="form-group">
						<label for="inputLine1" class="col-sm-3 control-label">Address Line 1</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputLine1" name="txtLine1" placeholder="Enter your Address Line 1">
						</div>
					</div>
					<div class="form-group">
						<label for="inputLine2" class="col-sm-3 control-label">Address Line 2</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputLine2" name="txtLine2" placeholder="Enter your Address Line 2">
						</div>
					</div>
					<div class="form-group">
						<label for="inputLine3" class="col-sm-3 control-label">Address Line 3</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputLine3" name="txtLine3" placeholder="Enter your Address Line 3">
						</div>
					</div>
					<div class="form-group">
						<label for="inputPIN" class="col-sm-3 control-label">PIN Code</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputPIN" name="txtPIN" placeholder="Enter your Postal PIN Code">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-9">
							<button type="submit" name="btnDeliver" class="btn btn-primary btn-lg">Deliver</button>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-9">
							<?php include("showinfo.php"); include("showerror.php"); ?>
						</div>
					</div>
				</form>
			</div>
		</div><br><br><br><br><br><br><br><br><br><br><br><br>
		<div>
     <?php  include("footer2.php"); ?>    
</div>

		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>