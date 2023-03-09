<?php
//session_start();
require('user_auth.php');
session_regenerate_id(true);
if (isset($_SESSION['adminloginid'])) {
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width ,initial-scale = 1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <script type="text/javascript" src="js/user_auth.js"></script>
    <title>Admin Panel</title>
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
    <script type="text/javascript" src="user_auth.js"></script>
</head>

<body>
    <nav class="navbar navbar-custom">
        <a class="navbar-brand" href="#">
            <img src="admin_logo.png" width="30%" class="d-inline-block align-top" alt="">
        </a>
        <a class="navbar-brand nav navbar-nav navbar-right" href="adminlogout.php">
            <button class="btn btn-logout btn-danger">LOG OUT</button>
        </a>
    </nav>




    <div class="container">
        <div class="col-md-1"></div>
        <div class="col-md-10 well">
            <h3 class="text-primary">Add Product</h3>
            <hr style="border-top:1px dotted #ccc;" />
            <div class="col-md-4">
                <div>
                    <button class="btn btn-sm btn-info" onclick="window.location.reload();">Refresh</button>
                </div><br>
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control" name="pname" placeholder="Enter Product Name" required="required" />
                    </div>
                    <div class="form-group">
                        <label>Actual Price</label>
                        <input type="text" class="form-control" name="actprice" placeholder="Enter Actual Price" required="required" />
                    </div>
                    <div class="form-group">
                        <label>Discounted Price</label>
                        <input type="text" class="form-control" name="disprice" placeholder="Enter Discounted Price" required="required" />
                    </div>
                    <div class="form-group">
                        <label>Upload Image</label>
                        <input type="file" class="form-control" name="productimage" required="required" />
                    </div>
                    <center><button class="btn btn-success" name="addproduct">Add Product</button></center>
                </form>

                <?php
                if (isset($_POST['addproduct'])) {
                    $data = file_get_contents('json/product.json');
                    $json = json_decode($data);

                    $productimage = $_FILES['productimage']['name'];
                    $tmp_name = $_FILES['productimage']['tmp_name'];
                    $imgfolder = 'img/';
                    move_uploaded_file($tmp_name, $imgfolder . $productimage);

                    $imagepath = $imgfolder . $productimage;

                    $array = array(
                        'p_id' => uniqid(),
                        'pname' => $_POST['pname'],
                        'actprice' => $_POST['actprice'],
                        'disprice' => $_POST['disprice'],
                        'imagepath' => $imagepath
                    );

                    $json[] = $array;

                    $json = json_encode($json, JSON_PRETTY_PRINT);
                    file_put_contents('json/product.json', $json);
                    echo '<script>alert("Product Added Successfully...")
					history.back();
					</script>';
                    //header("location:javascript://history.go(-1)");
                }
                ?>

            </div>
            <div class="col-md-8">
                <table class="table table-bordered table-striped">
                    <thead class="alert-info">
                        <th>Name</th>
                        <th>Actual Price</th>
                        <th>Discounted Price</th>
                        <th>Link</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                        $data = file_get_contents('json/product.json');
                        $data = json_decode($data);
                        $index = 0;
                        foreach ($data as $fetch) {
                        ?>
                            <tr>
                                <td><?php echo $fetch->pname ?></td>
                                <td><?php echo $fetch->actprice ?></td>
                                <td><?php echo $fetch->disprice ?></td>
                                <td><?php echo $fetch->imagepath ?></td>
                                <td style='white-space: nowrap'><a class="btn" href="updateproduct.php?p_id=<?php echo $fetch->p_id ?>"><img src="img/editbtn.jpg"  width="25px" alt="Edit"></a>
							    <a class="btn" href="deleteproduct.php?p_id=<?php echo $index ?>"><img src="img/deletebtn.png"  width="25px" alt="Delete"></a></td>
                            </tr>
                        <?php
                            $index++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>

<?php
} else {
    header("location: adminlogin.php?error=UnAuthorized Access");
}
?>