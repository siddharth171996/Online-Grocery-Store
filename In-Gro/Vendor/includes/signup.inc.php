<?php
session_start();
if(isset($_POST['register'])){
	require 'dbh.inc.php';
   
    $uname =$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $phone=$_POST['phone'];

	

//error handling
//empty fields check
    if(empty($uname)||empty($email)||empty($password)||empty($phone)) {
       header("Location: ../register.php?error=emptyfields&fullname=".$uname."&emailaddress=".$email);
       exit();
    }

//email validation
    elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    	header("Location: ../register.php?error=invalidemail&fullname=".$uname);
       exit(); 
    }

    
    else 
    { 


    	$sql = "SELECT vemail FROM vendor WHERE vemail=?";
    	$stmt = mysqli_stmt_init($conn);
    	if (!mysqli_stmt_prepare($stmt,$sql)) {
    	     header("Location: ../register.php?error=sqlerror");
             exit(); 	
    	}
    	else {

    		mysqli_stmt_bind_param($stmt,"s",$email);
    		mysqli_stmt_execute($stmt);
    		mysqli_stmt_store_result($stmt);
    		$resultCheck = mysqli_stmt_num_rows($stmt);

    		if ($resultCheck > 0) {
    		header("Location: ../register.php?error=usertaken&emailaddress=".$email);
             exit(); 	
    		}
    		else{

    			$sql = "INSERT INTO vendor(vname, vemail, vphone, vpassword) VALUES(?, ?, ?, ?)";
    			$stmt = mysqli_stmt_init($conn);
                 if (!mysqli_stmt_prepare($stmt,$sql)) {
    	         header("Location: ../register.php?error=sqlerror");
                 exit(); 	
    	        }
    	        else{
                   $hashedPwd=password_hash($password, PASSWORD_DEFAULT); 

    	        	mysqli_stmt_bind_param($stmt,"ssss", $uname, $email, $phone, $hashedPwd);
    		        mysqli_stmt_execute($stmt);
    		        header("Location: ../login.php?signup=success");
                    exit();
    	        }



    		}
    	}
   }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
   
}
else{
	header("Location: ../register.php");
    exit();
    

}

?>



