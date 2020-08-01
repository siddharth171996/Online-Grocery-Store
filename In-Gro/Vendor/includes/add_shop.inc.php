<?php
session_start();
if(isset($_POST['save_shop'])){
	require 'dbh.inc.php';
   
    $sname =$_POST['sname'];
    $gstno=$_POST['gstno'];
    $licence=$_POST['licence'];
    $address=$_POST['address'];
    $pincode=$_POST['pincode'];
    $vid=$_SESSION['userId'];

    if(empty($sname)||empty($gstno)||empty($licence)||empty( $address)||empty( $pincode))
     {
       header("Location: ../add_shop.php?error=emptyfields&fullname=".$sname);
       exit();
    }
    
   
    else{

    $sql = "INSERT INTO shop(shop_name, street_address, pincode, gst_no, license_no, vid) VALUES(?, ?, ?, ?, ? , ?)";
    $stmt = mysqli_stmt_init($conn);
     if (!mysqli_stmt_prepare($stmt,$sql)) {
       header("Location: ../add_shop.php?error=sqlerror");
        exit(); 	
    	   }
    else{
                   

    	        	mysqli_stmt_bind_param($stmt,"ssisii", $sname  ,$address, $pincode, $gstno, $licence ,$vid);
    		        mysqli_stmt_execute($stmt);

    		        header("Location: ../index.php?signup=success");
                    exit();
    	        }



    		}
    	
   
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
   
}
else{
	header("Location: ../add_shop.php");
    exit();
    

}

?>



