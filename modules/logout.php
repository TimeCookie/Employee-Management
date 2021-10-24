<?php 


//Code author: Pangestu (2031154)
session_start();

	if(isset($_SESSION['adminId'])) {
		unset($_SESSION['adminId']);
		session_destroy();
		header("Location: ../index.php");
	}




?>
