<?php
	session_start();
	include('checksession.php');
	
	unset($info);
	unset($errinfo);
?>

<?php include('top.php'); ?>

        <div id="page-wrapper" class="bottomline">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                	<?php
						include('dbcon.php');
						
						$query = "select distinct emailid, cartid from tabsold where cartid not in (select cartid from tabdeliver)";
						$result = mysql_query($query, $con);
						
						if (mysql_num_rows($result) > 0)
						{
							echo '<h3>Product List</h3>';
							echo '<table class="table table-hover">';
							echo '<tr>';
							echo '<th>Email ID</th>';
							echo '<th>Cart ID</th>';
							echo '<th>Quantity</th>';
							echo '<th>Total Price</th>';
							echo '<th>Open Cart</th>';
							echo '</tr>';
							while($record = mysql_fetch_array($result))
							{
								echo '<tr>';
								echo '<td>' . $record[0] . '</td>';
								echo '<td>' . $record[1] . '</td>';
								$query2 = "select sum(quantity) from tabsold where cartid='$record[1]'";
								$result2 = mysql_query($query2, $con);
								$record2 = mysql_fetch_array($result2);
								
								$query3 = "select sum(productprice) from tabsold where cartid='$record[1]'";
								$result3 = mysql_query($query3, $con);
								$record3 = mysql_fetch_array($result3);
								
								echo '<td>' . $record2[0] . '</td>';
								echo '<td>Rs. ' . $record3[0] . '</td>';
								echo '<td align="right"><a href="opencart.php?CartID=' . $record[1] . '" type="button" class="btn btn-primary">Open</a>';
								echo '</tr>';
							}
							echo '</table>';
						}
						else
						{
							$errinfo = "No products available in sold list";
							include("showerror.php");
						}
					?>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

<?php include('bottom.php'); ?>
