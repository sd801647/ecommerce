<?php
//session_start();
require('user_auth.php');
session_regenerate_id(true);
if (isset($_SESSION['adminloginid'])) {
	$p_id = $_GET['p_id'];
 
	$data = file_get_contents('json/product.json');
	$json = json_decode($data);
	$no_of_product = count($json);
	$max_p_id = $no_of_product - 1;
	
	if($p_id == $max_p_id) {
		unset($json[$p_id]);
 
		$json = json_encode($json, JSON_PRETTY_PRINT);
		file_put_contents('json/product.json', $json);
	
		echo '<script>alert("Deleted Successfully...")
		history.back();
		</script>';
		//header("location:javascript://history.go(-1)");
	}
	else{
		echo '<script>alert("Delete From Middle is Not Possible. Please Delete From Below")
		history.back();
		</script>';
		//header("location:javascript://history.go(-1)");
	}
    
} else {
  header("Location:adminlogin.php?error=UnAuthorized Access");
}
?>