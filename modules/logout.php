<?php 

session_start();

	if(isset($_SESSION['adminId'])) {
		unset($_SESSION['adminId']);
		session_destroy();
		header("Location: ../index.php");
	}




?>
