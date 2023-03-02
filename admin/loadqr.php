<?php
	if (isset($_GET['RollNumber']))
	{
		$RollNumber = $_GET['RollNumber'];
		
		echo '<div class="col-lg-4 col-md-4 col-sm-12">';
			echo '<a href="loadfullqr.php?RollNumber=' . $RollNumber . '"><img src="./qr/' . $RollNumber . '.png" class="img img-responsive" /></a>';
		echo '</div>';
	}
?>