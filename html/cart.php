<?php 
	session_start(); 
	if (!isset($_SESSION['emailid']))
	{
		header("Location: login.php");
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

		<div>

			<?php include("nav.php"); ?>
			</div>
		<div class="container" style="margin-top:100px; color:white">
			<div class="row">
				<h3>Cart</h3>
				<?php
					$emailid = $_SESSION['emailid'];
					$query = "select * from tabcart where emailid='$emailid'";
					$result = mysql_query($query, $con);
					if (mysql_num_rows($result) > 0)
					{
						echo '<table class="table table-bordered table-hovered">';
						echo '<tr>';
							echo '<th>Product</th>';
							echo '<th>Product Name</th>';
							echo '<th>Quantity</th>';
							echo '<th>Product Price</th>';
							echo '<th>Amount</th>';
							echo '<th style="align:right !important;">Delete?</th>';
						echo '</tr>';
						$totalamount = 0;
						while ($record = mysql_fetch_array($result))
						{
							echo '<tr>';
								$entryid = $record[0];
								$productcode = $record[2];
								$query2 = "select * from tabproducts where productcode='$productcode'";
								$result2 = mysql_query($query2);
								$record2 = mysql_fetch_array($result2);
								echo '<td><img height="128" width="128" src="data:image/jpeg;base64,'.base64_encode($record2['image'] ).'"/></td>';
								include("getproductname.php");
								echo '<td>' . $productname . '</td>';
								$quantity = $record[5];
								echo '<td>' . $quantity . '</td>';
								$productprice = $record2[4];
								echo '<td>Rs. ' . $productprice . '</td>';
								$amount = $quantity * $productprice;
								echo '<td>Rs. ' . $amount . '</td>';
								$totalamount = $totalamount + $amount;
								echo '<td align="right"><a href="deletecart.php?EntryID=' . $entryid . '" class="btn btn-danger">Delete</a></td>';
							echo '</tr>';
						}
						echo '<tr>';
							echo '<td colspan="5" align="right">Total</td>';
							echo '<td colspan="2"><b>Rs. ' . $totalamount . '</b></td>';
						echo '</tr>';
						echo '<tr>';
							echo '<td colspan="5" align="right"></td>';
							echo '<td colspan="2"><a class="btn btn-primary" href="address.php">Check Out</a></td>';
						echo '</tr>';
						echo '</table>';
					}
					else
					{
						$info = "No products available in cart";
						include("showinfo.php");
					}
				?>
			</div>
		</div><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<div>
     <?php  include("footer2.php"); ?>    
</div>

		
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>