<?php 
session_start();
 


?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from gambolthemes.net/html-items/gambo_admin/add_shop.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jun 2020 15:38:59 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description-gambolthemes" content="">
	<meta name="author-gambolthemes" content="">
	<title>In-Gro Supermarket Vendor</title>
	<link href="css/styles.css" rel="stylesheet">
	<link href="css/admin-style.css" rel="stylesheet">
	
	<!-- Vendor Stylesheets -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
	
</head>

    <body class="sb-nav-fixed">
         <?php
       require "header.php";
        ?>
      <div id="layoutSidenav">
             <?php
       require "sidebar.php";
        ?>
            <div id="layoutSidenav_content">
                <main>
                	
                    <div class="container-fluid">
                        <h2 class="mt-30 page-title">Shop Settings</h2>
                        <ol class="breadcrumb mb-30">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Shop Settings</li>
                        </ol>
                        <div class="row">
							<div class="col-lg-12">
								<div class="add-new-shop">
									<div class="card card-static-2 mb-30">
										<div class="row no-gutters">
											<div class="col-lg-6 col-md-6">
												<?php 
                	require '/xampp/htdocs/groceryAdmin/includes/dbh.inc.php';
                      $userid= $_SESSION['userId'];

				     $sql = "SELECT * from shop where vid=$userid";
				      $stmt = mysqli_stmt_init($conn);
				      if (!mysqli_stmt_prepare($stmt,$sql)) {
				       echo"errorrrr";
				       exit(); 	
				    	 }
				         else 
				    	   {
				    	     mysqli_stmt_execute($stmt);
				    	     $result = mysqli_stmt_get_result($stmt);
				           if(mysqli_num_rows($result)>0)
				          { 
				   	        
				         while ($row = mysqli_fetch_assoc($result)) {
				   			$image = $row['shop_image'];
				            $image_src = "uploads/".$image;
				?>
												<div class="card-body-table">
													<form action="includes/edit_shop.inc.php" method="Post" enctype="multipart/form-data">
													<div class="add-shop-content pd-20">
														<div class="form-group">
															<label class="form-label">Name*</label>
															<input type="text" class="form-control" placeholder="Shop Name" value="<?php echo $row["shop_name"]; ?>" name="sname">
														</div>
														<div class="form-group">
															<label class="form-label">GST Number*</label>
															<input type="text" class="form-control" placeholder="GST Number" value="<?php echo $row["gst_no"]; ?>" name="gstno" >
														</div>
														<div class="form-group">
															<label class="form-label">License Number*</label>
															<input type="text" class="form-control" placeholder="Liscence Number" value="<?php echo $row["license_no"]; ?>" name="license">
														</div>
														<div class="form-group">
															<label class="form-label">Address*</label>
															<input type="text" class="form-control" placeholder="Enter Address" value="<?php echo $row["street_address"]; ?>" name="address">
														</div>
														<div class="form-group">
															<label class="form-label">City*</label>
															<input type="text" class="form-control" placeholder="Location" value="<?php echo $row["city"]; ?>" name="city">
														</div>
														<div class="form-group">
															<label class="form-label">State*</label>
															<input type="text" class="form-control" placeholder="Location" value="<?php echo $row["state"]; ?>" name="state">
														</div>
														<div class="form-group">
															<label class="form-label">Pincode*</label>
															<input type="text" class="form-control" placeholder="Location" value="<?php echo $row["pincode"]; ?>" name="pincode">
														</div>
														<div class="form-group">
															<label class="form-label">Opening Time*</label>
															<input type="time" id="default-picker" class="form-control" placeholder="Select time" value="<?php echo $row["open_time"]; ?>" name="optime">
														</div>
														<div class="form-group">
															<label class="form-label">Close Time*</label>
															<input type="time" id="default-picker" class="form-control" placeholder="Select time" value="<?php echo $row["close_time"]; ?>" name="cltime">
														</div>
													
														<div class="form-group">
															<label class="form-label">Status*</label>
															<select id="status" name="status" class="form-control" value="<?php echo $row["status"]; ?>">
																<option selected value="Active">Active</option>
																<option value="Inactive">Inactive</option>
															</select>
														</div>
														
														
														<div class="form-group">
															<label class="form-label">Shop Image*</label>
															<div class="input-group">
																<div class="custom-file">
                                                   <img width="50" height="60" src="<?php echo $image_src;?>" >																
					                           	<input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="files">
																</div>
															</div>
														</div>
														<button class="save-btn hover-btn" type="submit" name="edit_shop">Save Changes</button>
													</div> 
													</form>
												</div>
												<?php
						   }
						}
				   }
				
			?>						
											</div>
										</div>
									</div>
								</div>
							</div>
                        </div>
                    </div>
				
                </main>
                 <?php 
             require "footer.php";
        ?>

            </div>
        </div>
		
		<!-- Javascripts -->
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
		
    </body>

<!-- Mirrored from gambolthemes.net/html-items/gambo_admin/add_shop.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jun 2020 15:39:00 GMT -->
</html>
