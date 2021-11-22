<?php 


//Code author: Pangestu (2031154)
session_start();

	if(isset($_SESSION['adminId'])) {
		unset($_SESSION['adminId']);
		session_destroy();
		header("Location: ../index.php");
	}
	else if(isset($_SESSION['userId'])) {
		unset($_SESSION['userId']);
		session_destroy();
		header("Location: ../index.php");
	}

?>
