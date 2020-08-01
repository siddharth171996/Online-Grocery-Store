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
                                        <h3 class="text-center font-weight-light my-4">Shop Details</h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="includes/add_shop.inc.php" method="post">
                                            <div class="form-group">
                                                <label class="form-label" for="inputEmailAddress">Shop Name*</label>
                                                <input class="form-control py-3" id="SName" type="text" name="sname" placeholder="Shop's Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="inputEmailAddress">GST No.*</label>
                                                <input class="form-control py-3" id="inputEmailAddress" type="text" name="gstno" placeholder="Enter GST Number" required>
                                            </div>
                                            
                                            
                                             
                                            <div class="form-group">
                                                <label class="form-label" for="inputEmailAddress">Licence Number*</label>
                                                <input class="form-control py-3" id="inputPass1" type="text" name="licence" placeholder="Enter Licence Number" required>
                                            </div>
                                             <div class="form-group">
                                                <label class="form-label" for="inputEmailAddress">Address*</label>
                                                <input class="form-control py-3" id="inputPass2" type="text" placeholder="Enter Address" name="address" required>
                                            </div>
                                               <div class="form-group">
                                                <label class="form-label" for="inputEmailAddress">Pincode*</label>
                                                <input class="form-control py-3" id="inputPass2" type="text" placeholder="Enter Pincode" name="pincode"  required>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-sign hover-btn" type="submit" name="save_shop">Save Details</button>
                                            </div>

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
