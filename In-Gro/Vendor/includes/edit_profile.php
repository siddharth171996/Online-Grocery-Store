<?php
session_start();
 
if (isset($_POST['editprofile']))
{    
    require 'dbh.inc.php';   
    $uname =$_POST['vname'];
    $email=$_POST['vemail'];
    $phone=$_POST['vphone'];
    $addr=$_POST['address'];
    $userid=$_SESSION['userId'];
    
    if (empty($email))
    {
        header("Location: ../edit_profile.php?error=emptyemail");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        header("Location: ../edit_profile.php?error=invalidmail");
        exit();
    }
    else
    {
         $sql = "UPDATE vendor SET vname=?, vemail=?, vphone=? ,address=? where vid= $userid";
                                     
         $stmt = mysqli_stmt_init($conn);
                    
            if (!mysqli_stmt_prepare($stmt, $sql))
             {
                header("Location: ../edit_profile.php?error=sqlerror");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt, "ssss", $uname, $email, $phone,$addr );
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $_SESSION['username'] =$uname; 
                $_SESSION['useremail'] =$email;
                $_SESSION['userphone'] =$phone;
 
                header("Location: ../edit_profile.php?edit=success");
                exit();
            }
            
        
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);    
}
else
{
    header("Location: ../edit_profile.php");
    exit();
}
?>
