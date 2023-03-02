 <!--
				include("dbcon.php");
				$query = "select * from tabcategories";
				$result = mysql_query($query, $con);
				while ($record = mysql_fetch_array($result))
				{
					$categoryid = $record[0];
					$categoryname = $record[1];
					$image = $record[2];




					echo <div> ;

       echo <table id="k3" class="k3" > ;
                
          echo  <tr  data-aos="zoom-in-up";> ;
            echo  <th></th> ;
             echo <th></th> ;
             echo </tr> ;
           echo  <tr data-aos="zoom-in-up";> ;
                echo <td><a href="products.php?CategoryID=' . $categoryid . '">' . $image . '<br' . $categoryname . '</a>;
            echo </td> ;
               echo  <td> <a href="index.html"><img id="k1" ;
               echo  class="k1"src=".jpeg"><p class="overlay"></p> </a></td> ;
               echo  <td> <a href="index.html"><img id="k1" ;
                echo class="k1" src=".jpeg"><p class="overlay"></p> </a></td> ;
          echo </tr> ;
           <tr data-aos="zoom-in-up";>
                 <td><a href="index.html"><img id="k1"
                 class="k1" src=".png"></a></td>
                 <td><a href="index.html"><img id="k1"
                 class="k1" src=".jpeg"></a></td> 
                 <td><a href="index.html"><img id="k1"
                 class="k1" src=".jpeg"></a></td>
          </tr>
          <tr data-aos="zoom-in-up";>
                <td><a href="index.html"><img  id="k1"
                 class="k1"src=".jpeg"></a></td>
                <td><a href="index.html"><img id="k1"
                 class="k1" src=".jpg"></a></td> 
                <td><a href="index.html"><img id="k1"
                 class="k1" src=".jpg"></a></td>
          </tr>
          <tr data-aos="zoom-in-up";>
                <td><a href="index.html"><img id="k1"
                 class="k1" src=".jpeg"></a></td>
                <td><a href="index.html"><img id="k1"
                 class="k1" src=".jpg"></a></td> 
                <td><a href="index.html"><img id="k1"
                 class="k1" src=".jpg"></a></td>
          </tr>    <th></th>      
      </table>
        </div>
        



					echo '<p style="color:white"><a href="products.php?CategoryID=' . $categoryid . '">' . $image . '<br' . $categoryname . '</a></p>';
				} */
			?> 

			<?php session_start(); ?> -->
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

<style type="text/css">

.ho {
	overflow: hidden;
	cursor: pointer;
	position: relative;
}
	.ho_content{
		position: absolute;
		padding-top: 60px;
		background: linear-gradient(to top, rgba(0,0,0.85), transparent);
		transition: .4s ease;
	}
	.ho:after{
		opacity: .4s;

	}

</style>

	<body>
		
<div>
		<div class="" style="margin-top:50px; margin-left: 50px;">
			<div class="row">
				<?php
					include("dbcon.php");
					$categoryid = "";
					if (isset($_GET['CategoryID']))
						$categoryid = $_GET['CategoryID'];
					if ($categoryid == "")
					{
						$query = "select * from tabcategories";
					}
					else
					{
						$query_get_categoryName = "select categoryname from tabcategories where categoryid='$categoryid'";
						$result_get_categoryName = mysql_query($query_get_categoryName, $con);
						$record_get_categoryName = mysql_fetch_array($result_get_categoryName);
						$query = "select * from tabcategories where categoryname='" . $record_get_categoryName[0] . "'";
					}
					$result = mysql_query($query, $con);
					while ($record = mysql_fetch_array($result))
					{
						$categoryid = $record[0];
						echo '<div class="col-sm-6 col-md-4" style="padding:30px;">';
						echo '<div class="" style="position:relative">';
						echo '<div class="img-thumbnail" style="border: 2px solid grey;">';
						
						echo '<a href="products.php?CategoryID=' . $categoryid . '"><img height="400" width="400" src="data:image/jpeg;base64,'.base64_encode($record['image'] ).'"/>';
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
		</div>
</div>
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>