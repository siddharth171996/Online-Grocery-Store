<?php 
session_start();
$userid= $_SESSION['userId'];
	require './includes/dbh.inc.php';
 


?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from gambolthemes.net/html-items/gambo_admin/edit_profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jun 2020 15:37:54 GMT -->
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

    <?php
       require "header.php";
    ?>

 <body class="bg-sign">

  <div id="layoutSidenav">
            
                <?php
       require "sidebar.php";
    ?>
           
            <div id="layoutSidenav_content">
                <main>
                		 <?php
				
					
				$sql = "SELECT * from vendor where vid=$userid ";
    			$result = mysqli_query($conn, $sql) ;
					while($row = mysqli_fetch_array($result))
				   	{
				?>
                    <div class="container-fluid">
                        <h2 class="mt-30 page-title">Edit Profile</h2>
                        <ol class="breadcrumb mb-30">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Profile</li>
                        </ol>
                        <div class="row">
							<div class="col-lg-4 col-md-5">
								<div class="card card-static-2 mb-30">
									<div class="card-body-table">
										<div class="shopowner-content-left text-center pd-20">
											<div class="shop_img mb-3">
												<img src="images/avatar/img-1.jpg" alt="">
											</div>

											<div class="shopowner-dts">
												<div class="shopowner-dt-list">
													<span class="left-dt">Username</span>
													<span class="right-dt"><?php echo $row["vname"]; ?></h6></span>

												</div>
												<div class="shopowner-dt-list">
													<span class="left-dt">Phone</span>
													<span class="right-dt"><?php echo $row["vemail"]; ?></span>
												</div>
												<div class="shopowner-dt-list">
													<span class="left-dt">Email</span>
													<span class="right-dt"><?php echo $row["vphone"]; ?></span>
												</div>
												<div class="shopowner-dt-list">
													<span class="left-dt">Address</span>
													<span class="right-dt"><?php echo $row["address"]; ?></span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-8 col-md-7">
								<div class="card card-static-2 mb-30">
									<div class="card-title-2">
										<h4>Edit Profile</h4>
									</div>
			
									<form action="includes/edit_profile.php" method="post">
									<div class="card-body-table">
										<div class="news-content-right pd-20">
				
											<div class="row">
												<div class="col-lg-6">
													<div class="form-group mb-3">
														<label class="form-label">Name*</label>
														<input type="text" class="form-control" value="<?php echo $row["vname"]; ?>" name="vname">
													</div>
												</div>
			
										

												<div class="col-lg-6">
													<div class="form-group mb-3">
														<label class="form-label">Email*</label>
														<input type="email" class="form-control" value="<?php echo $row["vemail"]; ?>" name="vemail">
													</div>
												</div>
												<div class="col-lg-6">
													<div class="form-group mb-3">
														<label class="form-label">Phone*</label>
														<input type="text" class="form-control" value="<?php echo $row["vphone"]; ?>" name="vphone">
													</div>
												</div>
									
												<div class="col-lg-6">
													<div class="form-group mb-3">
														<label class="form-label">Address*</label>
														<input type="text" class="form-control" value="<?php echo $row["address"]; ?>" name="address">													
													</div>
												</div>
												<div class="col-lg-12">
													<button class="save-btn hover-btn" type="submit" name="editprofile">Save Changes</button>
												</div>
											</div>
											 <?php
					   
				   }
				
			?>
										</div>
									</div>
									</form>
       
             

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

<!-- Mirrored from gambolthemes.net/html-items/gambo_admin/edit_profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jun 2020 15:38:02 GMT -->
</html>
