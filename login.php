<?php
session_start();
include "db_con.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {
	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	 }
	$uname = validate($_POST['uname']);
	$password = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($password)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{

		$sql = "SELECT * FROM comptes WHERE user='$uname' AND passwd='$password'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result)  === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['user'] === $uname && $row['passwd'] === $password) {
            	$_SESSION['user'] = $row['user'];
				$_SESSION['ID']=$row['ID'];
        header("Location: Afficher.php");
		        exit();
            }else{
				header("Location: index.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: Afficher.php");
	        exit();
		}
	}
}else{
	header("location:index.php");
}
