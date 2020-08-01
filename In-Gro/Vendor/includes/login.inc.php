<?php
session_start();

if(isset($_POST['login'])){

  require 'dbh.inc.php';
  $email = $_POST['email'];
  $password1 = $_POST['password'];


  if(empty($email) || empty($password1)) {
     header("Location: ../login.php?error=emptyfields");
     exit();
  }
  else {
    $sql = "SELECT * FROM vendor WHERE vemail=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
       header("Location: ../login.php?error=sqlerror");
     exit();
    }
    else
    {
        mysqli_stmt_bind_param($stmt,"s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row =mysqli_fetch_assoc($result)){
        $pwdCheck = password_verify($password1, $row['vpassword']);
           if($pwdCheck == false){
             header(
               "Location: ../login.php?error=wrongpassword");
            exit();
           }
           elseif ($pwdCheck == true) {
               
               $_SESSION['userId'] = $row['vid'];
               $_SESSION['username'] = $row['vname'];
               $_SESSION['useremail'] = $row['vemail'];
               $_SESSION['userphone'] = $row['vphone'];
               $vid = $row['vid'];
                $sql = "SELECT shop_id FROM shop WHERE vid=$vid";
                $result = mysqli_query($conn,$sql);
                $rows = mysqli_num_rows($result);                    
                echo "<script>alert('$rows');</script>";
                  if ($rows > 0) {
                        header("Location: ../index.php?login=success");

                        exit();
                    }
                 else{
               header("Location: ../add_shop.php?addshop=success");

               exit();
             }
           }
           else{
            header("Location: ../login.php?error=wrongpassword");
            exit();
           }

        }
        else{           
            header("Location: ../login.php?error=nouser");
            exit();
        }
    }
  }

}

else
{
    header("Location: ../login.php");
    exit();
}