<?php
	session_start();
	include('checksession.php');
	
	unset($info);
	unset($errinfo);
	
	if (isset($_POST['btnAdd']))
	{
		include('dbcon.php');
		$productcode = $_POST['txtProductCode'];
		$productname = $_POST['txtProductName'];
		$productprice = $_POST['txtProductPrice'];
		$categoryname = $_POST['drpCategoryName'];
		$description = $_POST['txtDescription'];
		
		if (!$productcode == "" && !$productname == "" && !$description == "" && !$productprice == "" && isset($_FILES['fuImage']))
		{
			$query = "select * from tabproducts where productcode='" . $productcode . "'";
			$result = mysql_query($query, $con);
			
			if (mysql_num_rows($result) == 0)
			{
				$tmpName  = $_FILES['fuImage']['tmp_name'];  
				// Read the file 
				$fp      = fopen($tmpName, 'r');
				$data = fread($fp, filesize($tmpName));
				$data = addslashes($data);
				fclose($fp);
				
				$sql="INSERT INTO tabProducts (productcode, productname, categoryname, description, productprice, image) VALUES ('$productcode', '$productname','$categoryname','$description','$productprice','" . $data . "')";
			
				if (!mysql_query($sql,$con))
				{
					die('Error: ' . mysql_error());
					$errorinfo = "Error creating record.";
				}
				if(mysql_affected_rows() == 1)
				{
					$info = "Product created successfully!";
				}
			}
			else
			{
				$errinfo = "<strong>Error: </strong> Product Details already exists!";
			}
		}
		else
		{
			$errinfo = "<strong>Error: </strong> Enter all mandatory fields.";
		}
	}
?>

<?php include('top.php'); ?>

        <div id="page-wrapper" class="bottomline">
            <div class="row">
            	<div class="col-lg-4 col-md-4 col-sm-12" style="margin-bottom:50px;">
                	<h3 style="margin-bottom:40px;">Product Details</h3>
                    <form name="form1" method="post" enctype="multipart/form-data" action="" >
                    <div class="form-group">
    					<label for="inputCategoryName">Category Name</label>
						<select name="drpCategoryName" class="form-control">
							<?php
								include("dbcon.php");
								$query = "select categoryname from tabcategories";
								$result = mysql_query($query, $con);
								if (mysql_num_rows($result) > 0)
								{
									while ($record = mysql_fetch_array($result))
									{
										echo '<option>' . $record[0] . '</option>';
									}
								}
							?>
						</select>
  					</div>
					<div class="form-group">
						<label for="inputProductCode">Product Code</label>
						<input type="text" class="form-control" name="txtProductCode" />
					</div>
					<div class="form-group">
						<label for="inputProductName">Product Name</label>
						<input type="text" class="form-control" name="txtProductName" />
					</div>
					<div class="form-group">
						<label for="inputProductName">Description</label>
						<textarea class="form-control" name="txtDescription"></textarea>
					</div>
					<div class="form-group">
						<label for="inputProductPrice">Price</label>
						<input type="text" class="form-control" name="txtProductPrice" />
					</div>
					<div class="form-group">
						<label for="inputProductImage">Image</label>
						<input type="file" class="form-control" name="fuImage" />
					</div>
                    <input type="submit" name="btnAdd" value="New Product" class="btn btn-success">
                    <input type="reset" name="btnCancel" value="Cancel" class="btn btn-danger">
                    </form>
                    <?php
						if (isset($info))
						{
							include('showinfo.php');
						}
						if (isset($errinfo))
						{
							include('showerror.php');
						}
					?>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12">
                	<?php
						include('dbcon.php');
						
						$query = "select * from tabproducts";
						$result = mysql_query($query, $con);
						
						if (mysql_num_rows($result) > 0)
						{
							echo '<h3>Product List</h3>';
							echo '<table class="table table-hover">';
							echo '<tr>';
							echo '<th>Product Code</th>';
							echo '<th>Product Name</th>';
							//echo '<th style="text-align:right !important">Product Information</th>';
							echo '<th style="text-align:right !important">Delete?</th>';
							echo '</tr>';
							while($record = mysql_fetch_array($result))
							{
								echo '<tr>';
								echo '<td>' . $record[0] . '</td>';
								echo '<td>' . $record[1] . '</td>';
								//echo '<td align="right"><a href="productinfo.php?ProductID=' . $record[0] . '" type="button" class="btn btn-primary">Product Information</a>';
								echo '<td align="right"><a href="deleteproduct.php?ProductID=' . $record[0] . '" type="button" class="btn btn-danger">Delete</a>';
								echo '</tr>';
							}
							echo '</table>';
						}
					?>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

<?php include('bottom.php'); ?>
