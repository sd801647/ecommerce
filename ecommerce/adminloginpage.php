<?php
session_start();

function input_filter($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['login'])){
    $adminuser = input_filter($_POST['adminuser']);
    $adminpass = input_filter($_POST['adminpass']);

    $user_pass = '$2y$10$QjzEg9bvPiSOMkw4JSqqUuL31N3bpW0YPPZmOhmol2wkOhry8.Tr6';

    if($adminuser == 'admin' && (password_verify($adminpass, $user_pass))){
        session_start();
        $_SESSION['adminloginid'] = $adminuser;
        header("location: adminpanel.php");
    }
    else{
        header("Location:adminlogin.php?error=Invalid Login Details");	
    }
}

?>