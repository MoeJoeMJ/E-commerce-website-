<?php 
	session_start(); 
	if (!isset($_SESSION['emailid']))
	{
		
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

		<?php 
		include("nav.php"); ?>
		<div class="container" style="margin-top:100px;">
			<div class="row">
				<div class="col-sm-12 col-md-12" style="color:white; text-align: center;"><h3><b><u>Profile</u></b></h3>
					<br></br>
				</div>
				<div class="col-sm-12 col-md-12" style="color:white; text-align: center;">
				      <p style=""> <img src="avatar.png" style="height:auto; width:150px"></p>
				</div></div></br>
				<div class=""  style="text-align: center;" >
				<?php
				/*include("getfullname.php");
				echo '<p class="" style="color:white; text-align: center;">' . $fullname . '</p>';
				include("getfullname.php");
				echo '<p style="color:white">Welcome ' . $fullname . '</p>';*/
				if (isset($_SESSION['emailid']))
		{
			if ($_SESSION['emailid'] == "admin")
			{
				
			}
			else
			{



				include("getfullname.php");
				echo '<p style="color:white; font-size:18px">' . $fullname . '</p>';
				
				include("getemailid.php");
				echo '<p style="color:white; font-size:18px">' . $emailid . '</p>';
				
				echo '<a href="orders.php"><button type="submit" name="btnorders" class="btn btn-primary btn-lg">Your Orders</button></a>';
				echo '</br><br>';
				echo '<a href="logout.php"><button type="submit" name="btnLogout" class="btn btn-primary btn-lg">Logout</button></a>';

				include("dbcon.php");
				$q1 = "select * from tabsold where cartid not in (select cartid from tabdeliver)";
				$r1 = mysql_query($q1, $con);
				if (mysql_num_rows($r1) > 0)
				{
					
				}
				
			}
		}
		else
		{
			echo '<a href="login.php"><button type="submit" name="btnLogin" class="btn btn-primary btn-lg">Login</button></a>';
		}
				?>
			</div>
		</div><br><br><br><br><br><br><br>
		<div>
     <?php  include("footer2.php"); ?>    
</div>
	</body>
</html>	