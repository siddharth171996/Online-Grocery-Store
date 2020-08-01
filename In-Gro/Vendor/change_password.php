<?php
session_start();
require 'includes/dbh.inc.php';

if (count($_POST) > 0){
	$password1=$_POST["currentPassword"];

	$query="SELECT * from vendor WHERE vid='" . $_SESSION["userId"] . "'";
    $result = mysqli_query($conn, $query) or die( mysqli_error($conn));
    $row = mysqli_fetch_array($result);
  
    	$pwdCheck = password_verify($password1, $row['vpassword']);
    if ($password1 == $pwdCheck) {
    	$hashedPwd=password_hash($_POST["newPassword"], PASSWORD_DEFAULT); 
        mysqli_query($conn, "UPDATE vendor set vpassword='" . $hashedPwd. "' WHERE vid='" . $_SESSION["userId"] . "'");
      echo '<script>alert("Password Changed")</script>'; 

    } else
echo '<script>alert("Old Password is Wrong")</script>'; 
    
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from gambolthemes.net/html-items/gambo_admin/change_password.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jun 2020 15:38:02 GMT -->
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
	<script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
	currentPassword.focus();
	document.getElementById("currentPassword").innerHTML = "required";
	output = false;
}
else if(!newPassword.value) {
	newPassword.focus();
	document.getElementById("newPassword").innerHTML = "required";
	output = false;
}
else if(!confirmPassword.value) {
	confirmPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "required";
	output = false;
}
if(newPassword.value != confirmPassword.value) {
	newPassword.value="";
	confirmPassword.value="";
	newPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "not same";
	output = false;
} 	
return output;
}
</script>
</head>

    <body class="bg-sign">
           <?php
       require "header.php";
        ?>
    <div id="layoutSidenav">
                   <?php
       require "sidebar.php";
        ?>
 <div id="layoutSidenav_content">
             <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header card-sign-header">
										<h3 class="text-center font-weight-light my-4">Change Password</h3>
									</div>
                                   
                                        <form name="frmChange" method="post" action=""
                                           onSubmit="return validatePassword()">
                                            <div class="form-group">
												<label class="form-label" for="inputPasswordOld">Old Password*</label>
												<input class="form-control py-3" name="currentPassword"
												id="currentPassword" type="password" placeholder="Enter old password" required>
											</div>
											<div class="form-group">
												<label class="form-label" for="inputPasswordNew">New Password*</label>
												<input class="form-control py-3" name="newPassword" id="newPassword" type="password" placeholder="Enter new password">
											</div>
											<div class="form-group">
												<label class="form-label" for="inputPasswordNewConfirm">Confirmation Password*</label>
												<input class="form-control py-3" name="confirmPassword" id="confirmPassword" type="password" placeholder="Enter New confirmation password">
											</div>
                                            <div class="col-lg-12">
													<button class="save-btn hover-btn" type="submit" name="submit">Save Changes</button>
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

<!-- Mirrored from gambolthemes.net/html-items/gambo_admin/change_password.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jun 2020 15:38:02 GMT -->
</html>
