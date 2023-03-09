<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width ,initial-scale = 1.0">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!-- <script type="text/javascript" src="js/product.js"></script> -->
    <!-- <script type="text/javascript" src="js/loadproducts.js"></script> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Garments Shop</title>
    <script>

    </script>
</head>

<body>
    <div class="bg">

    </div>
    <nav class="navbar">
        <div class="logo">My Garments</div>
        <ul class="nav-links">
            <input type="checkbox" id="checkbox_toggle" />
            <label for="checkbox_toggle" class="hamburger">&#9776;</label>
            <div class="menu">
                <li><a href="/">Home</a></li>
                <li><a href="/">About</a></li>
                <li class="services">
                    <a href="/">Services</a>
                    <ul class="dropdown">
                        <li><a href="/">Dropdown 1 </a></li>
                        <li><a href="/">Dropdown 2</a></li>
                        <li><a href="/">Dropdown 2</a></li>
                        <li><a href="/">Dropdown 3</a></li>
                        <li><a href="/">Dropdown 4</a></li>
                    </ul>
                </li>
                <li><a href="/">Pricing</a></li>
                <li><a href="/">Contact</a></li>
            </div>
        </ul>
    </nav>



    <div id="product-header"><h3>Our Products</h3></div>
    <div class="container" id="container">
        <script type="text/javascript" src="js/product.js"></script>
            
       
    </div>
    <br>

    <div id="product-header"><h3>Contact Us</h3></div>
    <div class="contact">
        <div class="row">
                <h4 style="text-align:center">Please send a Message about your Query...</h4>
        </div>
        <br>

        <?php 
            $Msg = "";
            if(isset($_GET['error']))
            {
                $Msg = " Please Fill in the Blanks ";
                ?>
                <div class="danger-alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                <?php echo $Msg ?>
                </div>
                <?php
            }

            if(isset($_GET['success']))
            {
                $Msg = " Your Message Has Been Sent ";
                ?>
                <div class="success-alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                <?php echo $Msg; ?>
                </div>
                <?php
            }
        ?>

        <div class="row input-contact">
        <form action="process.php" method="post">
                <div class="col-xs-12">
                    <div class="styled-input wide">
                        <input type="text" name="name" required />
                        <label>Name</label> 
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="styled-input">
                        <input type="text" name="email" required />
                        <label>Email</label> 
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="styled-input" style="float:right;">
                        <input type="text" name="phone" required />
                        <label>Phone Number</label> 
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="styled-input wide">
                        <textarea name="message" required></textarea>
                        <label>Message</label>
                    </div>
                </div>
                <div class="col-xs-12">
                    <button class="btn-lrg submit-btn" name="send_email">Send Message</button>
                </div>
        </form>
        </div>
    </div>


    <br>
    <footer>
        <div class="footer-content">
            <h3>About My Garments</h3>
            <p>This is all about My Garments Shop</p>
            <ul class="socials">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p>copyright &copy; <a href="#">My Garments</a> </p>
        </div>

    </footer>
</body>

</html>