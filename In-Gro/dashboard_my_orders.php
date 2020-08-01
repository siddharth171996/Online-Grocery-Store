<?php
session_start();
 require '/xampp/htdocs/MainSite/includes/dbh.inc.php';
 $id=$_SESSION['userId'];      
?>

<!DOCTYPE html>
<html lang="en">

	
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, shrink-to-fit=9">
		<meta name="description" content="In-Grolthemes">
		<meta name="author" content="In-Grolthemes">		
		<title>In-Gro - My Orders</title>
		
		<!-- Favicon Icon -->
		<link rel="icon" type="image/png" href="images/fav.png">
		
		<!-- Stylesheets -->
		<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
		<link href='vendor/unicons-2.0.1/css/unicons.css' rel='stylesheet'>
		<link href="css/style.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
		<link href="css/night-mode.css" rel="stylesheet">
		<link href="css/step-wizard.css" rel="stylesheet">
		
		<!-- Vendor Stylesheets -->
		<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
		<link href="vendor/OwlCarousel/assets/owl.carousel.css" rel="stylesheet">
		<link href="vendor/OwlCarousel/assets/owl.theme.default.min.css" rel="stylesheet">
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="vendor/semantic/semantic.min.css">	
		
	</head>

<body>
	<!-- Category Model Start-->
	
	<!-- Header Start -->
	<?php include('header.php'); ?>
	<!-- Header End -->
	<!-- Body Start -->
	<div class="wrapper">
		<div class="In-Gro-Breadcrumb">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">My Orders</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<?php include('myprofile.php'); ?>

		<div class="">
			<div class="container">
				<div class="row">
					<?php include('minisidebar.php'); ?>
				<div class="col-lg-9 col-md-8">
						<div class="dashboard-right">
							<div class="row">
								<div class="col-md-12">
									<div class="main-title-tab">
										<h4><i class="uil uil-box"></i>My Orders</h4>
									</div>
								</div>
								<div class="col-lg-12 col-md-12">
<?php
$sql5="SELECT orders.order_id,orders.total_amount,orders.order_date,orders.payment_mode,shop.shop_name, shop.shop_image  FROM orders JOIN shop on orders.vid=shop.vid WHERE customer_id=$id";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql5)) {
    
    echo "error";   
   }
   else
   {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($result)>0)
    {
      while ($row = mysqli_fetch_assoc($result))
      {
        $orderid=$row["order_id"];
        $total_amt=$row["total_amount"];
        $order_date=$row["order_date"];
        $status=$row["payment_mode"];
        $sname=$row["shop_name"];
        $image=$row["shop_image"]; 
?>									
									<div class="pdpt-bg">
										<div class="pdpt-title">
											<!-- <h6>Delivery Timing 10 May, 3.00PM - 6.00PM</h6> -->
										</div> 
										<div class="order-body10">
											<ul class="order-dtsll">
												<li>
													<div class="order-dt-img">
														<img src="uploads/<?php echo $image; ?>" alt="">
													</div>
												</li>
												<li>
													<div class="order-dt47">
														<h4><?php echo $sname;?> </h4>
														<p>Payment mode: <?php echo $status; ?> - In-Gro</p>
														<div ><!-- class="smll-history"Loop for numbers of orders -->
<?php
$sql="SELECT product.Pname,orderitems.Price, orderitems.quantity FROM orderitems RIGHT JOIN product on orderitems.P_id=product.Pid WHERE orderitems.order_id=$orderid";
        $stmt2 = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt2,$sql)) {    
          echo "error1<br>"; 
          die("Connection failed:".mysqli_error($conn));  
          }
        else{
          mysqli_stmt_execute($stmt2);
          $result2 = mysqli_stmt_get_result($stmt2);
          if(mysqli_num_rows($result2)>0){
            while ($row = mysqli_fetch_assoc($result2)){
              $pname=$row["Pname"];
              $pprice=$row["Price"];
              $pqty=$row["quantity"]; ?>             
  

              												<br>
															<div class="order-title"><?php echo $pname.'  : ₹' . $pprice.'   Qty :'.$pqty;?> 

														       </div>
																
																

<?php          
            }
          }
        }
?>
														</div>
															
													</div>
												</li>
											</ul>
											<div class="total-dt">
												<div class="total-checkout-group">
													<div class="cart-total-dil">
														<h4>Sub Total</h4>
														<span>₹<?php echo $total_amt-20;?></span>
													</div>
													<div class="cart-total-dil pt-3">
														<h4>Delivery Charges</h4>
														<span>₹20</span>
													</div>
												</div>
												<div class="main-total-cart">
													<h2>Total</h2>
													<span>₹<?php echo $total_amt;?></span>
												</div>
											</div>
											<div class="track-order">
												<h4>Track Order</h4>
												<div class="bs-wizard" style="border-bottom:0;">   
													<div class="bs-wizard-step complete">
														<div class="text-center bs-wizard-stepnum">Placed</div>
														<div class="progress"><div class="progress-bar"></div></div>
														<a href="#" class="bs-wizard-dot"></a>
													</div>
													<div class="bs-wizard-step complete"><!-- complete -->
														<div class="text-center bs-wizard-stepnum">Packed</div>
														<div class="progress"><div class="progress-bar"></div></div>
														<a href="#" class="bs-wizard-dot"></a>
													</div>
													<div class="bs-wizard-step active"><!-- complete -->
														<div class="text-center bs-wizard-stepnum">On the way</div>
														<div class="progress"><div class="progress-bar"></div></div>
														<a href="#" class="bs-wizard-dot"></a>
													</div>
													<div class="bs-wizard-step disabled"><!-- active -->
														<div class="text-center bs-wizard-stepnum">Delivered</div>
														<div class="progress"><div class="progress-bar"></div></div>
														<a href="#" class="bs-wizard-dot"></a>
													</div>
												</div>
											</div>
											
											<div class="call-bill">
												<div class="delivery-man">
													Delivery Boy - <a href="#"><i class="uil uil-phone"></i> Call Us</a>
												</div>
												<div class="order-bill-slip">
													<a href="#" class="bill-btn5 hover-btn">View Bill</a>
												</div>
											</div>
										</div>
									</div>
 <?php    
 	 }//end of 1st while loop
    }
    else
    {
    							echo'		<div class="pdpt-bg">
										<div class="pdpt-title">
											<h6>No Orders Yet</h6>';
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
	</div>
	<!-- Body End -->
	<!-- Footer Start -->
	<?php include('footer.php'); ?>
	<!-- Footer End -->

	<!-- Javascripts -->
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="vendor/OwlCarousel/owl.carousel.js"></script>
	<script src="vendor/semantic/semantic.min.js"></script>
	<script src="js/jquery.countdown.min.js"></script>
	<script src="js/custom.js"></script>
	<script src="js/product.thumbnail.slider.js"></script>
	<script src="js/offset_overlay.js"></script>
	<script src="js/night-mode.js"></script>
	
	
</body>

</html>