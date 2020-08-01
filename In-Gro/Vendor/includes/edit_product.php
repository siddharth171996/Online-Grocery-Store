<?php
session_start();
 
if (isset($_POST['submit']))
{    
    require 'dbh.inc.php';   
    $name =$_POST['name'];
    $mrp=$_POST['mrp'];
    $discount=$_POST['discount'];
    $quantity=$_POST['quantity'];
    $descp=$_POST['desc'];
    $pid=$_POST['pid'];



    
    if (empty($name)||empty($mrp)||empty($discount)||empty($quantity)||empty($descp))
    {
        header("Location: ../product_edit.php?error=emptyfields");
        exit();
    }
    else
    {
         $sql = "UPDATE product SET Pname=?, MRP=?, Discount_mrp=? ,quantity=? ,Descp=? where Pid= $pid";
                                     
         $stmt = mysqli_stmt_init($conn);
                    
            if (!mysqli_stmt_prepare($stmt, $sql))
             {
                header("Location: ../product_edit.php?error=sqlerror");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt, "sddis", $name, $mrp, $discount,$quantity,$descp );
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);

 
                header("Location: ../product_edit.php?pid=".base64_encode($pid));
                exit();
            }
            
        
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);    
}
else
{
    header("Location: ../product_edit.php");
    exit();
}
?>
