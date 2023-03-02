<div class="col-md-3 text-right" style="margin-top:20px; position: fixed; z-index: 998;" >
	<?php
		if (isset($_SESSION['emailid']))
		{
			if ($_SESSION['emailid'] == "admin")
			{
				
			}
			else
			{


				include("getfullname.php");
				echo '<p style="color:white">Welcome ' . $fullname . '!</p>';
				

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
			echo '<p style="color:white">Welcome Guest!</p>';
		}
	?>
</div>



<div class="col-md-9 text-right" style="margin-left: 390px; position: fixed; z-index: 998;">
	<?php
		if (isset($_SESSION['emailid']))
		{
			if ($_SESSION['emailid'] == "admin")
			{
				
			}
			else
			{
				include("getcartcount.php");
				if ($cartcount == 0)
				{
					echo '<span class="badge">0</span> ';
				}
				else
				{
					echo '<span class="badge">' . $cartcount . '</span> ';
				}
			}
		}
		else
		{
		}
	?>
</div>