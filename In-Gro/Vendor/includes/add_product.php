<?php
session_start();
if(isset($_POST['submit'])){
	require 'dbh.inc.php';
   
    $name =$_POST['name'];
    $quantity =$_POST['quantity'];
    $desc = $_POST['desc'];
    $mrp = $_POST['mrp'];
    $disc_mrp = $_POST['discount'];
    $catid = $_POST['category'];
    $vid=$_SESSION["userId"];


    $fname = $_FILES['file']['name'];
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif","svg");

//echo $name." ".$quantity." ".$desc." ".$mrp ." ".$disc_mrp ." ".$catid ;


   	

//error handling
//empty fields check
    if(empty($name)||empty($quantity)||empty($desc)||empty($mrp)||empty($disc_mrp)||empty($catid)) {
       header("Location: ../add_category.php?error=emptyfields&name=".$name."cat".$catid);
       exit();
    }

    else 
    { 

         // Check extension
                if( in_array($imageFileType,$extensions_arr) ){                  
             
                // Upload file
                move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$fname);

    			$sql = "INSERT INTO product(Pname, cat_id, MRP, Discount_mrp, quantity, Descp, image,vid) VALUES(?,?,?,?,?,?,?,?)";
    			$stmt = mysqli_stmt_init($conn);
                 if (!mysqli_stmt_prepare($stmt,$sql)) {
    	         header("Location: ../add_product.php?error=sqlerror");
                 exit(); 	
    	        }
    	        else{
                  
    	        	mysqli_stmt_bind_param($stmt,"siiisssi", $name, $catid, $mrp, $disc_mrp, $quantity, $desc, $fname,$vid);
    		        mysqli_stmt_execute($stmt);
    		        header("Location: ../products.php?add_category=success");
                    exit();
    	        }
            }
    		
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
   
}
else
{
	header("Location: ../add_product.php?error");
    exit();
}

?>



