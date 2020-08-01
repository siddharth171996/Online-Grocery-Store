<?php
session_start();
require 'dbh.inc.php';


/*$date=date('Y-m-d H:i:s');

$sql5="SELECT order_date FROM orders WHERE customer_id=1";
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
        echo "<br> ".$row['order_date'];
      }
    }
   }*/


//$id=1;
   /*$sql5="SELECT orders.order_id,orders.total_amount,orders.order_date,orders.status,shop.shop_name, shop.shop_image  FROM orders JOIN shop on orders.vid=shop.vid WHERE customer_id=$id";
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
        $orderid=$row["order_id"];
        $t_amt=$row["total_amount"];
        $orderdate=$row["order_date"];
        $s=$row["status"];
        $sname=$row["shop_name"];
        $image=$row["shop_image"];
    //echo "<br><br>order_id:".$orderid." /total_amount:".$t_amt."shop_name ".$sname."shop_image".$image;
        
        $sql="SELECT product.Pname,orderitems.Price, orderitems.quantity FROM orderitems RIGHT JOIN product on orderitems.P_id=product.Pid WHERE orderitems.order_id=$orderid";
        $stmt2 = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt2,$sql)) {    
          echo "error1<br>"; 
          die("Connection failed:".mysqli_error($conn));  
          }
        else{
          mysqli_stmt_execute($stmt2);
          $result2 = mysqli_stmt_get_result($stmt2);
          if(mysqli_num_rows($result2)>0){
            while ($row = mysqli_fetch_assoc($result2)){
              $pname=$row["Pname"];
              $pprice=$row["Price"];
              $pqty=$row["quantity"];              
              //echo "<br>Pname:".$pname."<br>Price:".$pprice."quantity ".$pqty;
            }
          }
        }





      }
    }
   }
*/




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
        echo " ".$row["Pname"];
      }
     }
   }
   

?>