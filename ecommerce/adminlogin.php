<?php
session_start();
if (isset($_SESSION['adminloginid'])) {
    header("Location:adminpanel.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
        .navbar-custom {
            height: 80px;
            background-color: #e0ebeb;
        }
    </style>
</head>

<body >
    <nav class="navbar navbar-custom">
        <!-- <a class="navbar-brand" href="#">
            <img src="admin_logo.png" width="30%" class="d-inline-block align-top" alt="">
        </a> -->
    </nav>
    <div class="container">

        <?php if (isset($_REQUEST['error'])) { ?>
            <div class="alert alert-danger" role="alert"><?php echo $_REQUEST['error']; ?></div>
        <?php } ?>
        
        <div class="col-md-3"></div>
        <div class="col-md-6 well">
            <h3 class="text-primary">Admin Login</h3>
            <hr style="border-top:1px dotted #ccc;" />
            <div class="col-md-5">
                <img src="img/loginicon.png" width="100%" alt="Login">
            </div>
            <div class="col-md-7">
                <form method="POST" action="adminloginpage.php">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="adminuser" placeholder="Enter Username" required="required" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="adminpass" placeholder="Enter Password" required="required" />
                    </div>
                    <center><button class="btn btn-primary" name="login">Login</button></center>
                </form>
            </div>
        </div>
    </div>
</body>

</html>