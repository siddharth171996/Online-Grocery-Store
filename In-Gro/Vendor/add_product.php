<?php
 session_start();
 ?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from gambolthemes.net/html-items/gambo_admin/add_product.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jun 2020 15:39:08 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description-gambolthemes" content="">
	<meta name="author-gambolthemes" content="">
	<title>In-Gro Supermarket Admin</title>
	<link href="css/styles.css" rel="stylesheet">
	<link href="css/admin-style.css" rel="stylesheet">
	
	<!-- Vendor Stylesheets -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
	
	<!-- froala Editor Stylesheets -->
	<link rel="stylesheet" href="../../../cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="vendor/froala_editor_3.1.1/css/froala_editor.css">
	<link rel="stylesheet" href="vendor/froala_editor_3.1.1/css/froala_style.css">
	<link rel="stylesheet" href="vendor/froala_editor_3.1.1/css/plugins/code_view.css">
	<link rel="stylesheet" href="vendor/froala_editor_3.1.1/css/plugins/colors.css">
	<link rel="stylesheet" href="vendor/froala_editor_3.1.1/css/plugins/emoticons.css">
	<link rel="stylesheet" href="vendor/froala_editor_3.1.1/css/plugins/image_manager.css">
	<link rel="stylesheet" href="vendor/froala_editor_3.1.1/css/plugins/image.css">
	<link rel="stylesheet" href="vendor/froala_editor_3.1.1/css/plugins/line_breaker.css">
	<link rel="stylesheet" href="vendor/froala_editor_3.1.1/css/plugins/table.css">
	<link rel="stylesheet" href="vendor/froala_editor_3.1.1/css/plugins/char_counter.css">
	<link rel="stylesheet" href="vendor/froala_editor_3.1.1/css/plugins/video.css">
	<link rel="stylesheet" href="vendor/froala_editor_3.1.1/css/plugins/fullscreen.css">
	<link rel="stylesheet" href="vendor/froala_editor_3.1.1/css/plugins/file.css">
	<link rel="stylesheet" href="../../../cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
	
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
                        <h2 class="mt-30 page-title">Products</h2>
                        <ol class="breadcrumb mb-30">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="products.php">Products</a></li>
                            <li class="breadcrumb-item active">Add Product</li>
                        </ol>
                        <div class="row">
							<div class="col-lg-6 col-md-6">
								<div class="card card-static-2 mb-30">
									<div class="card-title-2">
										<h4>Add New Product</h4>
									</div>
									<div class="card-body-table">
										<div class="news-content-right pd-20">

											  <form action="includes/add_product.php" method="post" enctype="multipart/form-data">
											<div class="form-group">
												<label class="form-label">Name*</label>
												<input type="text" class="form-control" name="name" placeholder="Product Name">
											</div>
											<div class="form-group">
												<label class="form-label">Category*</label>
												<select id="categtory" name="category" class="form-control">
													<option>-Select Category-</option>


											<?php
				                                    require '/xampp/htdocs/groceryAdmin/includes/dbh.inc.php';



				                                    $sql = "SELECT * FROM category";
				                                    $stmt = mysqli_stmt_init($conn);
				                                    if (!mysqli_stmt_prepare($stmt,$sql)) {
				    	                                 header("Location: ../add_product.php?error=sqlerror");
				                                         exit(); 	
				    	                               }
				    	                            else 
				    	                           {
				    	                           	 mysqli_stmt_execute($stmt);
				    	                           	 $result = mysqli_stmt_get_result($stmt);
				                                    if(mysqli_num_rows($result)>0)
				                                    { 
				                                       while ($row = mysqli_fetch_assoc($result)) {
				                                       	
				                                        echo '

				                                      
													<option value="'.$row["cat_id"].'">'.$row["cat_name"].'</option>
													
												
				                                        ';
				                                    	 }
				                                   }
				                                }
				                                    ?>
											

											</select>
											</div>
											<div class="form-group">
												<label class="form-label">MRP*</label>
												<input type="text" name="mrp" class="form-control" placeholder="0">
											</div>
											<div class="form-group">
												<label class="form-label">Discount MRP*</label>
												<input type="text" name="discount" class="form-control" placeholder="0">
											</div>
											<div class="form-group">
												<label class="form-label">Quantity*</label>
												<input type="text" name="quantity" class="form-control" placeholder="0">
											</div>
											<div class="form-group">
												<label class="form-label">Description*</label>
												<div class="card card-editor">
													<div class="content-editor">
														 <input type="textarea" name="desc" class="form-control" placeholder="Type Something">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="form-label">Product Image*</label>
												<div class="input-group">
													<div class="custom-file">
														<input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="file">
														<label class="custom-file-label" for="inputGroupFile04">Choose Image</label>
													</div>
												</div>
												
											</div>
											
											<button class="save-btn hover-btn" type="submit" name="submit">Add New Product</button>
											</form>




											
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
		
		<!-- froala Editor Javascripts -->
		<script type="text/javascript" src="../../../cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
		<script type="text/javascript" src="../../../cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
		<script type="text/javascript" src="vendor/froala_editor_3.1.1/js/froala_editor.min.js"></script>
		<script type="text/javascript" src="vendor/froala_editor_3.1.1/js/plugins/align.min.js"></script>
		<script type="text/javascript" src="vendor/froala_editor_3.1.1/js/plugins/code_beautifier.min.js"></script>
		<script type="text/javascript" src="vendor/froala_editor_3.1.1/js/plugins/code_view.min.js"></script>
		<script type="text/javascript" src="vendor/froala_editor_3.1.1/js/plugins/colors.min.js"></script>
		<script type="text/javascript" src="vendor/froala_editor_3.1.1/js/plugins/emoticons.min.js"></script>
		<script type="text/javascript" src="vendor/froala_editor_3.1.1/js/plugins/draggable.min.js"></script>
		<script type="text/javascript" src="vendor/froala_editor_3.1.1/js/plugins/font_size.min.js"></script>
		<script type="text/javascript" src="vendor/froala_editor_3.1.1/js/plugins/font_family.min.js"></script>
		<script type="text/javascript" src="vendor/froala_editor_3.1.1/js/plugins/image.min.js"></script>
		<script type="text/javascript" src="vendor/froala_editor_3.1.1/js/plugins/file.min.js"></script>
		<script type="text/javascript" src="vendor/froala_editor_3.1.1/js/plugins/image_manager.min.js"></script>
		<script type="text/javascript" src="vendor/froala_editor_3.1.1/js/plugins/line_breaker.min.js"></script>
		<script type="text/javascript" src="vendor/froala_editor_3.1.1/js/plugins/link.min.js"></script>
		<script type="text/javascript" src="vendor/froala_editor_3.1.1/js/plugins/lists.min.js"></script>
		<script type="text/javascript" src="vendor/froala_editor_3.1.1/js/plugins/paragraph_format.min.js"></script>
		<script type="text/javascript" src="vendor/froala_editor_3.1.1/js/plugins/paragraph_style.min.js"></script>
		<script type="text/javascript" src="vendor/froala_editor_3.1.1/js/plugins/video.min.js"></script>
		<script type="text/javascript" src="vendor/froala_editor_3.1.1/js/plugins/table.min.js"></script>
		<script type="text/javascript" src="vendor/froala_editor_3.1.1/js/plugins/url.min.js"></script>
		<script type="text/javascript" src="vendor/froala_editor_3.1.1/js/plugins/entities.min.js"></script>
		<script type="text/javascript" src="vendor/froala_editor_3.1.1/js/plugins/char_counter.min.js"></script>
		<script type="text/javascript" src="vendor/froala_editor_3.1.1/js/plugins/inline_style.min.js"></script>
		<script type="text/javascript" src="vendor/froala_editor_3.1.1/js/plugins/save.min.js"></script>
		<script type="text/javascript" src="vendor/froala_editor_3.1.1/js/plugins/fullscreen.min.js"></script>
		<script type="text/javascript" src="vendor/froala_editor_3.1.1/js/plugins/quote.min.js"></script>
		<script>
			(function () {
			  new FroalaEditor("#edit", {
				zIndex: 10
			  })
			})()
		</script>
		
    </body>

<!-- Mirrored from gambolthemes.net/html-items/gambo_admin/add_product.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jun 2020 15:39:11 GMT -->
</html>
