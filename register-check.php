<?php 
session_start(); 
include "db_con.php";

if (isset($_POST['uname']) && isset($_POST['password']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['re_password']);
	
    if (empty($uname) || empty($pass) || empty($re_pass)) {
		header("Location: register.php?error=Fill in theboxes");
	    exit();
    }
	if (empty($uname)) {
		header("Location: register.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: register.php?error=Password is required");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: register.php?error=Re Password is required");
	    exit();
	}


	else if($pass !== $re_pass){
        header("Location: register.php?error=The confirmation password  does not match");
	    exit();
	}

	else{

		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM comptes WHERE user='$uname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: register.php?error=The username is taken try another");
	        exit();
		}else {
           $sql2 = "INSERT INTO comptes(user, passwd) VALUES('$uname', '$password')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: register.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: register.php?error=unknown error occurred");
		        exit();
           }
		}
	}
	
}else{
	header("Location: register.php");
	exit();
}