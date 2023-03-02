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
					include("dbcon.php");
					$cartid = $_GET['CartID'];
					$query = "select * from tabsold where cartid='$cartid'";
					$result = mysql_query($query, $con);
					if (mysql_num_rows($result) > 0)
					{
						echo '<h3>Products List</h3>';
						echo '<table class="table table-bordered table-hovered">';
						echo '<tr>';
							echo '<th>Product</th>';
							echo '<th>Product Name</th>';
							echo '<th>Quantity</th>';
							echo '<th>Product Price</th>';
							echo '<th>Amount</th>';
						echo '</tr>';
						$totalamount = 0;
						while ($record = mysql_fetch_array($result))
						{
							echo '<tr>';
								$entryid = $record[0];
								$productcode = $record[3];
								$query2 = "select * from tabproducts where productcode='$productcode'";
								$result2 = mysql_query($query2);
								$record2 = mysql_fetch_array($result2);
								echo '<td><img height="128" width="128" src="data:image/jpeg;base64,'.base64_encode($record2['image'] ).'"/></td>';
								include("getproductname.php");
								echo '<td>' . $productname . '</td>';
								$quantity = $record[6];
								echo '<td>' . $quantity . '</td>';
								$productprice = $record2["productprice"];
								$amount = $quantity * $productprice;
								echo '<td>Rs. ' . $amount . '</td>';
								$totalamount = $totalamount + $amount;
								echo '<td>Rs. ' . $totalamount . '</td>';
							echo '</tr>';
						}
						echo '<tr>';
							echo '<td colspan="4" align="right">Total</td>';
							echo '<td><b>Rs. ' . $totalamount . '</b></td>';
						echo '</tr>';
						echo '<tr>';
							echo '<td colspan="4" align="left">';
								$q1 = "select * from tabaddress where cartid='$cartid'";
								$r1 = mysql_query($q1, $con);
								$d1 = mysql_fetch_array($r1);
								
								echo "<h4>Delivery Address:</h4>";
								echo '<p>' . $d1[3] . '</p>';
								echo '<p>' . $d1[4] . '</p>';
								echo '<p>' . $d1[5] . '</p>';
								echo '<p>PIN Code: ' . $d1[6] . '</p>';
								
							echo '</td>';
							echo '<td colspan="2"><a class="btn btn-primary" href="deliverproduct.php?CartID=' . $cartid . '">Deliver</a></td>';
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
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

<?php include('bottom.php'); ?>
