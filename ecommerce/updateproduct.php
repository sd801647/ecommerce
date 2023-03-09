<?php
//session_start();
require('user_auth.php');
session_regenerate_id(true);
if (isset($_SESSION['adminloginid'])) {

$p_id = $_GET['p_id'];

if (isset($_POST['updateproduct'])) {

    $p_name_mod = $_POST['p_name_mod'];
    $aprice_mod = $_POST['aprice_mod'];
    $dprice_mod = $_POST['dprice_mod'];

    $data = file_get_contents('json/product.json');
    $json = json_decode($data, true);
    $no_of_product = count($json);

    for ($it = 0; $it < $no_of_product; $it++) {
        try {
            $get_id = $json[$it]['p_id'];
            if ($get_id == $p_id) {
                if ($p_name_mod != '') {
                    $json[$it]['pname'] = $p_name_mod;
                }
                if ($aprice_mod != '') {
                    $json[$it]['actprice'] = $aprice_mod;
                }
                if ($dprice_mod != '') {
                    $json[$it]['disprice'] = $dprice_mod;
                }
                $json = json_encode($json, JSON_PRETTY_PRINT);
                file_put_contents('json/product.json', $json);
                echo '<script>alert("Updated Successfully...")
					header("location:javascript://history.go(-1)");
					</script>';
            } else {
                echo '<script>alert("Some Error Occurred")
					header("location:javascript://history.go(-1)");
					</script>';
            }
        } catch (Error $e) {
            header("location:adminpanel.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Product Details</title>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
        .navbar-custom {
            height: 80px;
            background-color: #e0ebeb;
        }

        .btn-logout {
            margin-top: 5px;
            margin-right: 30px;
        }

        .btn-dashboard {
            margin-top: 5px;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script type="text/javascript" src="js/user_auth.js"></script>
</head>

<body>
    <nav class="navbar navbar-custom">
        <a class="navbar-brand" href="#">
            <img src="admin_logo.png" width="30%" class="d-inline-block align-top" alt="">
        </a>
        <a class="navbar-brand nav navbar-nav navbar-right" href="adminlogout.php">
            <button class="btn btn-logout btn-danger">LOG OUT</button>
        </a>
        <a class="navbar-brand nav navbar-nav navbar-right" href="adminpanel.php">
            <button class="btn btn-dashboard btn-warning">DASHBOARD</button>
        </a>
    </nav>
    <div class="col-md-4"></div>
    <div class="col-md-4 well">
        <h3 class="text-primary">Edit Product</h3>
        <hr style="border-top:1px dotted #ccc;" />
        <div class="col-md-12">
            <div>
                <button class="btn btn-sm btn-info" onclick="window.location.reload();">Refresh</button>
            </div><br>
            <form method="POST" action="">
                <div class="form-group">
                    <label>Name to Modified</label>
                    <input type="text" class="form-control" name="p_name_mod" placeholder="Enter Modified Name" />
                </div>
                <div class="form-group">
                    <label>Actual Price to Modified</label>
                    <input type="text" class="form-control" name="aprice_mod" placeholder="Enter Modified Actual Price" />
                </div>
                <div class="form-group">
                    <label>Discounted  Price to Modified</label>
                    <input type="text" class="form-control" name="dprice_mod" placeholder="Enter Modified Discounted Price" />
                </div>
                <center><button class="btn btn-primary" name="updateproduct">Update</button></center>
            </form>
        </div>
    </div>
</body>
</html>

<?php

} else {
	header("Location:adminlogin.php?error=UnAuthorized Access");
}	  
?>