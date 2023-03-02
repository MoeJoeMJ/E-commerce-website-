<!--<?php session_start(); ?>-->
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

<div class="" style="margin-top:100px; margin-left: 50px;">
			<div class="row">
<?php
					include("dbcon.php");
					

					$search="";
					if (isset($_POST['search']))
						$search = $_POST['search'];
					{

					if ($search=="")
							$query = "select * from tabproducts";
						else
							$query = "select * from tabproducts where productname like '%$search%'";
					}
					
					$result = mysql_query($query, $con);
					while ($record = mysql_fetch_array($result))
					{
						$productcode=$record[0];
						echo '<div class="col-sm-6 col-md-4" style="padding:30px;">';
						echo '<div class="" style="position:relative">';
						echo '<div class="img-thumbnail">';
						echo '<a href="productdetails.php?productcode=' . $productcode . '"><img height="400" width="400" src="data:image/jpeg;base64,'.base64_encode($record['image'] ).'"/>';
						echo '<div class="" style="position:absolute; bottom:5px; width:86%; font-size:30px; color:white; background-image:linear-gradient(to top, rgba(0,0,0.85), transparent); text-shadow: 0 2px 3px rgba(0,0,0.3); height:100%; overflow:hidden; padding-top:370px; text-align:center; letter-spacing:3px">';
						echo '<p>' . $record[1] . '</p>';
						echo '</div>';
						echo '</a>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
					}
				?>
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