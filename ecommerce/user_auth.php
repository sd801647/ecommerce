<?php
	session_start();
	if(isset($_POST['type']) && $_POST['type'] == 'ajax'){
		if((time() - $_SESSION['LAST_ACTIVE_TIME']) > 420){
			echo "logout";
		}
	} else {
		if(isset($_SESSION['LAST_ACTIVE_TIME'])){
			if((time() - $_SESSION['LAST_ACTIVE_TIME']) > 420){
				header('location: adminlogout.php');
				die();
			}
		}
		$_SESSION['LAST_ACTIVE_TIME'] = time();
		if(!isset($_SESSION['adminloginid'])){
			header('location: adminlogin.php');
			die();
		}
	}
?>