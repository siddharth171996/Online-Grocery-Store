<?php 
session_start();
if (isset($_GET['pid'])) {
	 $pid=base64_decode($_GET['pid']);
	}

require '/xampp/htdocs/groceryAdmin/includes/dbh.inc.php';
$sql = "SELECT * from product where Pid = $pid";
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
            $row = mysqli_fetch_assoc($result);
           	$image = $row['image'];
           	$image_src = "uploads/".$image;
           	$pname=$row['Pname'];
           	$mrp=$row['MRP'];
           	$description= $row['Descp'];
          	if($row['quantity']<5)
				$st="Not in Stock";
				   else
				$st="In Stock";
           
          }
    }

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from gambolthemes.net/html-items/gambo_admin/product_view.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jun 2020 15:39:33 GMT -->
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
                        <h2 class="mt-30 page-title">Product</h2>
                        <ol class="breadcrumb mb-30">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="products.php">Product</a></li>
                            <li class="breadcrumb-item active">Product view</li>
                        </ol>
                        <div class="row">
							<div class="col-lg-5 col-md-6">
								<div class="card card-static-2 mb-30">
									<div class="card-body-table">
										<div class="shopowner-content-left text-center pd-20">
											<div class="shop_img">
													<img src=<?php echo $image_src;?> alt="">
													
													<h6><?php echo $pname; ?></h6>
											</div>
											<ul class="product-dt-purchases">
												<li>
													<div class="product-status">
														Orders <span class="badge-item-2 badge-status">10</span>
													</div>
												</li>
												
											</ul>
											<div class="shopowner-dts">
												<div class="shopowner-dt-list">
													<span class="left-dt">Price</span>
													<span class="right-dt"><?php echo $mrp; ?></span>
												</div>
												<div class="shopowner-dt-list">
													<span class="left-dt">Status</span>
													<span class="right-dt"><?php echo $st; ?></span>
												</div>
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

<!-- Mirrored from gambolthemes.net/html-items/gambo_admin/product_view.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jun 2020 15:39:33 GMT -->
</html>
