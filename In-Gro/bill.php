<?php 
session_start();

$vendor_id = $_SESSION['vendor_id'];
$total_amount = $_SESSION['total_amount'];
$order = $_SESSION['order'];
$orderId = $_SESSION['orderId'];
$total_items = $_SESSION['total_items'];
$amount_delivery_charges = $_SESSION['amount_delivery_charges'];

unset($_SESSION['vendor_id']);
unset($_SESSION['total_amount']);
unset($_SESSION['transaction_id']);
unset($_SESSION['order']);
unset($_SESSION['amount_delivery_charges']);
unset($_SESSION['total_items']);

?>
<!DOCTYPE html>
<html lang="en">

	
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, shrink-to-fit=9">
		<meta name="description" content="In-Grolthemes">
		<meta name="author" content="In-Grolthemes">		
		<title>In-Gro - Bill Invoice</title>
		
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
	<!-- Header Start -->
	<?php include('header.php'); ?>
	</header>
	<!-- Header End -->
	<!-- Body Start -->
	<div class="bill-dt-bg">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="bill-detail">
						<div class="bill-dt-step">
							<div class="bill-title">
								<h4>ORDER ID:<?php echo $orderId;?></h4>
							</div>
							<div class="bill-title">
								<h4>Items</h4>
							</div>
							<div class="bill-descp">								
								<div class="itm-ttl"><?php echo $total_items;?></div>

<?php
$sql5="SELECT product.Pname  FROM orderitems JOIN product on orderitems.P_id=product.Pid WHERE orderitems.order_id=52";
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
        echo'<span class="item-prdct">'.$row["Pname"].'</span>';
      }
     }
   }

 ?>
					
							</div>
						</div>
						<div class="bill-dt-step">
							<div class="bill-title">
								<h4>Delivery Address</h4>
							</div>
							<div class="bill-descp">
								<?php echo'
								<div class="itm-ttl">'.$_SESSION['type'].'</div>
							    <p class="bill-address">'.$_SESSION['address_name'].', '.$_SESSION['locality'].', '
							    	.$_SESSION['city'].', '
							    	.$_SESSION['state'].', '
							    	.$_SESSION['pincode'].'</p>';
								?>
							</div>
						</div>
						<div class="bill-dt-step">
							<div class="bill-title">
								<h4>Payment</h4>
							</div>
							<div class="bill-descp">
								<div class="total-checkout-group p-0 border-top-0">
									<div class="cart-total-dil">
										<h4>Subtotal</h4>
										<span>₹<?php echo $total_amount;?></span>
									</div>
									<div class="cart-total-dil pt-3">
										<h4>Delivery Charges</h4>
										<span>₹20</span>
									</div>
								</div>
								<div class="main-total-cart pl-0 pr-0 pb-0 border-bottom-0">
									<h2>Total</h2>
									<span>₹<?php echo $amount_delivery_charges;?></span>
								</div>
							</div>
						</div>
						
						<div class="bill-dt-step">
							<div class="bill-title">
								<h4>Payment Option</h4>
							</div>
							<div class="bill-descp">
								<p class="bill-dt-sl"><span class="dlr-ttl25 mr-1"><i class="uil uil-check-circle"></i></span><?php echo $order;?></p>
							</div>
						</div>
						<div class="bill-dt-step">
							<div class="bill-bottom">
								<div class="thnk-ordr">Thanks for Ordering</div>
								<a class="print-btn hover-btn" href="index.php">continue shopping</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Body End -->
	
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