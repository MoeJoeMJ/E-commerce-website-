<?php session_start(); ?>
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

		<div class="" style="margin-top:100px; margin-left: 150px;">
			<div class="row">
				<?php
					include("dbcon.php");
					$productcode = "";
					if (isset($_GET['productcode']))
						$productcode = $_GET['productcode'];


					if ($productcode == "")
					{
						
					}
					else
					{
						$query = "select * from tabproducts where productcode='$productcode'";
						
					}
					$result = mysql_query($query, $con);
					while ($record = mysql_fetch_array($result))
					{
						echo '<div class="row" >';
						echo '<img height="500" width="500" src="data:image/jpeg;base64,'.base64_encode($record['image'] ).'"/>';
						echo '<div class="col-md-0" style="color:white; display:inline-block; text-align:left; margin-left:20px; font-family:; font-size:20px; width="" >';
						echo '<h1>'. $record[1] . '</h1>';
						echo '<p>Price: Rs.' . $record[4] . '</p>';
						echo '<p>Description: ' . $record[3] . '</p>';
						//echo '<p><a href="productdetails.php?ProductID=' . $record[0] . '" class="btn btn-success" role="button">Product Information</a>';
						if (isset($_SESSION['emailid']))
						{
							echo ' <a href="addcart.php?ProductID=' . $record[0] . '" class="btn btn-primary" role="button">Add to Cart</a></p>';
						}
						echo '</div>';
						echo '</div>';
					}
				?>
			</div><br><br><br><br><br>
		</div>
		<div>
     <?php  include("footer2.php"); ?>    
</div>
	</body>
	</html>