<?php
	if (isset($info))
	{
		echo '<div class="alert alert-success alert-dismissible" role="alert" style="margin-top:20px;">';
			echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
			echo $info;  
		echo '</div>';
	}
?>
