<?php
require_once '../lib/init.php';

if (isset($_SESSION['customer_login'])) {
    header('location: index.php');
}

if (isset($_POST['customer_register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    $input_errors = array();

    if (empty($name)) {
        $input_errors['name'] = "Name field is required";
    }
    if (empty($email)) {
        $input_errors['email'] = "Email field is required";
    }
    if (empty($password)) {
        $input_errors['password'] = "Password field is required";
    }
    if (empty($contact)) {
        $input_errors['contact'] = "Contact Number field is required";
    }
    if (empty($address)) {
        $input_errors['address'] = "Address field is required";
    }

    if (count($input_errors) == 0) {

        $emali_check = mysqli_query($con, query: "SELECT * FROM `customer` WHERE `email`='$email'");
        $emali_check_row = mysqli_num_rows($emali_check);
        if ($emali_check_row == 0) {
            $password_hash = password_hash($password, algo: PASSWORD_DEFAULT);
            $result = mysqli_query($con, query: "INSERT INTO `customer`(`name`, `email`, `password`, `contact`, `address`) VALUES ('$name','$email','$password_hash','$contact','$address')");

            if ($result) {
                $success = "Registration Successfully!";
            } else {
                $error = "Something Wrong!";
            }
        } else {
            $emali_exists = "This email already exists";
        }
    }
}
?>
<!doctype html>
<html lang="en" class="fixed accounts sign-in">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Customer Registration</title>

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
</head>

<body>
    <div class="wrap">
        <!-- page BODY -->
        <!-- ========================================================= -->
        <div class="page-body animated slideInDown">


            <div class="wrap">
                <ul class="nav nav-pills">
                    <li role="presentation" class="active"><a href="../index.php">Home</a></li>
                </ul>

                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <!--LOGO-->
                <div class="logo">
                    <h1 class="text-center">Customer Registration</h1>

                    <?php
                    if (isset($success)) {
                    ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <?= $success ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    if (isset($error)) {
                    ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <?= $error ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    if (isset($emali_exists)) {
                    ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <?= $emali_exists ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    <?php
                    }
                    ?>

                </div>
                <div class="box">
                    <!--SIGN IN FORM-->
                    <div class="panel mb-none">
                        <div class="panel-content bg-scale-0">
                            <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
                                <div class="form-group mt-md">
                                    <span class="input-with-icon">
                                        <input type="text" class="form-control" placeholder="Name" name="name" value="<?= isset($name) ? $name : '' ?>">
                                        <i class="fa fa-user"></i>
                                    </span>

                                    <?php
                                    if (isset($input_errors['name'])) {
                                        echo '<span class="input-error">' . $input_errors['name'] . '</span>';
                                    }
                                    ?>

                                </div>
                                <div class="form-group mt-md">
                                    <span class="input-with-icon">
                                        <input type="email" class="form-control" placeholder="Email" name="email" value="<?= isset($email) ? $email : '' ?>">
                                        <i class="fa fa-envelope"></i>
                                    </span>

                                    <?php
                                    if (isset($input_errors['email'])) {
                                        echo '<span class="input-error">' . $input_errors['email'] . '</span>';
                                    }
                                    ?>

                                </div>
                                <div class="form-group">
                                    <span class="input-with-icon">
                                        <input type="password" class="form-control" placeholder="Password" name="password">
                                        <i class="fa fa-key"></i>
                                    </span>

                                    <?php
                                    if (isset($input_errors['password'])) {
                                        echo '<span class="input-error">' . $input_errors['password'] . '</span>';
                                    }
                                    ?>

                                </div>
                                <div class="form-group mt-md">
                                    <span class="input-with-icon">
                                        <input type="text" class="form-control" placeholder="Contact Number" name="contact" value="<?= isset($contact) ? $contact : '' ?>">
                                        <i class="fa fa-user"></i>
                                    </span>

                                    <?php
                                    if (isset($input_errors['contact'])) {
                                        echo '<span class="input-error">' . $input_errors['contact'] . '</span>';
                                    }
                                    ?>

                                </div>
                                <div class="form-group mt-md">
                                    <span class="input-with-icon">
                                        <input type="text" class="form-control" placeholder="Address" name="address" value="<?= isset($address) ? $address : '' ?>">
                                        <i class="fa fa-home"></i>
                                    </span>

                                    <?php
                                    if (isset($input_errors['address'])) {
                                        echo '<span class="input-error">' . $input_errors['address'] . '</span>';
                                    }
                                    ?>

                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary btn-block" type="submit" name="customer_register" value="Register">
                                </div>
                                <div class="form-group text-center">
                                    Have an account?, <a href="sign-in.php">Sign In</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            </div>
        </div>
        <!--BASIC scripts-->
        <!-- ========================================================= -->
        <script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
        <!--TEMPLATE scripts-->
        <!-- ========================================================= -->
        <script src="../assets/javascripts/template-script.min.js"></script>
        <script src="../assets/javascripts/template-init.min.js"></script>
        <!-- SECTION script and examples-->
        <!-- ========================================================= -->
</body>


</html>