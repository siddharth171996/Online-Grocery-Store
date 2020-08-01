<?php
session_start();
require 'dbh.inc.php';

$id = $_SESSION['userId'];
$date=date('Y-m-d H:i:s');

$sql = "INSERT INTO orders(transaction_id, customer_id, vid, total_amount, order_date, status, payment_mode, address_id) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt,$sql)) {
   	header("Location: ../index.php?error1=sqlerror");
   	exit(); 	
   }
   else
   {
   	
   	$s="processing";
    $pm = "online";
   	mysqli_stmt_bind_param(
    	        		$stmt,"siidsssi",
    	        		$_SESSION['transaction_id'],
    	        		$_SESSION['userId'],
    	        		$_SESSION['vendor_id'],
    	        		$_SESSION['total_amount'],
    	        		$date,
    	        		$s,
                  $pm,
                  $_SESSION['a_id']     	        		 
					  );

    		        mysqli_stmt_execute($stmt);
    		       $_SESSION['order']="Paid Online";
              //  header("Location: ../index.php?payment=successful");
              //  exit();

   }


if (isset($_SESSION['order'])){

  // getting order_id from order table

  $sql5="SELECT * FROM orders WHERE customer_id=$id AND order_date='$date'";
  $stmt = mysqli_stmt_init($conn);

 if (!mysqli_stmt_prepare($stmt,$sql5)) {
  echo"-".$date;
    die("Connection failed:".mysqli_error($conn));
      
   }
   else
   {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($result)>0)
    {
      while ($row = mysqli_fetch_assoc($result))
      {
        $o_id=$row['order_id'];
        
      }
    }
   }
$_SESSION['orderId']=$o_id;


  //inserting into orderitems table

  foreach($_SESSION["shopping_cart"] as $keys => $values)
  {
    $s = "INSERT INTO orderitems(order_id, P_id, price, quantity, status, vid) VALUES(?, ?, ?, ?, ?, ?)";
    $stmtt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmtt,$s)) {
      header("Location: ../checkout.php?error3=sqlerror");
      exit();   
     }
     else
     {      
      $status1=null;
          mysqli_stmt_bind_param(
                    $stmtt,"iidisi",
                    $o_id,
                    $values['item_id'],
                    $values['item_price'],
                    $values['item_quantity'],
                    $status1,
                    $_SESSION['vendor_id']                                     
              );

                  mysqli_stmt_execute($stmtt);
     }
  }


  //deleting entry from cart
  $sql2 = "DELETE FROM cart where uid = $id";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql2)) {
     header("Location: ../index.php?error3=sqlerror");
     exit();   
    }
    else{
            mysqli_stmt_execute($stmt);
           /* unset($_SESSION['shopping_cart']);
            unset($_SESSION['vendor_id']);
            unset($_SESSION['total_amount']);
            unset($_SESSION['transaction_id']);
            unset($_SESSION['order']);
            unset($_SESSION['total_amount']);
            unset($_SESSION['total_items']);*/
            unset($_SESSION['shopping_cart']);
            header("Location: ../bill.php?orderPlaced=successful");
            exit();
        }
}
else
echo"cart not deleted";


?>