<?php
	session_start();
	if (isset($_POST['btnLogin']))
	{
		$emailid = $_POST['txtEmailID'];
		$password = $_POST['txtPassword'];
		
		include("dbcon.php");
		$query = "select * from tabusers where emailid='$emailid' and password='$password'";
		$result = mysql_query($query, $con);
		if (mysql_num_rows($result) > 0)
		{
			$_SESSION['emailid'] = $emailid;
		}
		else
		{
			$errinfo = "Login Failed: Invalid Email ID or Password.";
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
		<div >

		<?php include("nav.php"); ?>
	    </div>
	    <div class="tab-group" style="margin-top:150px;">

		<div class="container" style="margin-top:150px;">
			<div class="row">
				<div class="col-sm-12 col-md-8" style="color:white">
					<h3>User Login</h3>
					
					<form name="form1" method="post" action="" class="form-horizontal" style="margin-top:30px;">
						<div class="form-group">
							<label for="inputEmailID" class="col-sm-3 control-label" >Email ID</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="inputEmailID" name="txtEmailID" placeholder="Enter your Email ID">
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword" class="col-sm-3 control-label" >Password</label>
							<div class="col-sm-9">
								<input type="password" class="form-control" id="inputPassword" name="txtPassword" placeholder="Enter your Password">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">
								<button type="submit" name="btnLogin" class="btn btn-primary btn-lg">Login</button>
							</div>
						</div>
						<div class="form-group">
							<div 
							class="col-sm-offset-3 col-sm-9" >Don't have an account? <a href=register.php>REGISTER</a>  |  <a href=forgotpassword.php>Forgot Password?</a></div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">
								<?php include("showinfo.php"); include("showerror.php"); ?>
							</div>
						</div>
					</form>
				</div>
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