<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from gambolthemes.net/html-items/gambo_admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jun 2020 15:38:02 GMT -->
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

    <body class="bg-sign">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header card-sign-header">
										<h3 class="text-center font-weight-light my-4">Register</h3>
									</div>
                                    <div class="card-body">
                                        <form action="includes/signup.inc.php" method="post">
                                            <div class="form-group">
												<label class="form-label" for="inputEmailAddress">Name*</label>
												<input class="form-control py-3" id="inputName" type="text" name="name" placeholder="Owners's Name">
											</div>
                                            <div class="form-group">
                                                <label class="form-label" for="inputEmailAddress">Email*</label>
                                                <input class="form-control py-3" id="inputEmailAddress" type="email" name="email" placeholder="Enter Email Address">
                                            </div>
                                            
                                             <div class="form-group">
                                                <label class="form-label" for="inputEmailAddress">Phone Number*</label>
                                                <input class="form-control py-3" id="inputEmailAddress" type="text" name="phone" placeholder="Enter Phone Number">
                                            </div>
                                             
                                            <div class="form-group">
                                                <label class="form-label" for="inputEmailAddress">Password*</label>
                                                <input class="form-control py-3" id="inputPass1" type="Password" name="password" placeholder="Enter Password">
                                            </div>
                                             <div class="form-group">
                                                <label class="form-label" for="inputEmailAddress">Re-enter Password*</label>
                                                <input class="form-control py-3" id="inputPass2" type="Password" placeholder="Re-enter Password">
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-sign hover-btn" type="submit" name="register">Register</button>
											</div>
                                            <br>
                                             <h6>Already a Member..??  <a  href="login.php">Click Here</a></h6>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
		 <script src="js/jquery-3.4.1.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>		
		
    </body>

<!-- Mirrored from gambolthemes.net/html-items/gambo_admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jun 2020 15:38:03 GMT -->
</html>
