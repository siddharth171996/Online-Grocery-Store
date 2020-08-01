<?php
session_start();
 
if (isset($_POST['edit_shop']))
{    
    require 'dbh.inc.php';   
    $sname =$_POST['sname'];
    $optime=$_POST['optime'];
    $cltime=$_POST['cltime'];
    $status=$_POST['status'];
    $addr=$_POST['address'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $pincode=$_POST['pincode'];
    $gstno=$_POST['gstno'];
    $license=$_POST['license'];
    $vid=$_SESSION['userId'];



    $fname = $_FILES['files']['name'];
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["files"]["name"]);

  // Select file type
     $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
      $extensions_arr = array("jpg","jpeg","png","gif","svg");

 // Check extension
       if( in_array($imageFileType,$extensions_arr) ){                  
             move_uploaded_file($_FILES['files']['tmp_name'],$target_dir.$fname);
         $sql = "UPDATE shop SET shop_name=? , shop_image=?  , open_time=? , close_time=? , status=? , street_address=? , city=? , state=? , pincode=? , gst_no=? , license_no=?  where vid=$vid ";
                                     
         $stmt = mysqli_stmt_init($conn);
                    
            if (!mysqli_stmt_prepare($stmt, $sql))
             {
                header("Location: ../edit_shop.php?error=sqlerror");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt, "ssddssssisi", $sname , $fname  , $optime , $cltime , $status , $addr , $city , $state , $pincode , $gstno , $license );
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
 
                header("Location: ../edit_shop.php?edit=success");
                exit();
            }
        
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    }    
}
else
{
    header("Location: ../edit_shop.php");
    exit();
}
?>
