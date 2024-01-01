<?php
    session_start();
    //check if user is already logged in
    if(isset($_SESSION['webID']) && isset($_SESSION['webUsername'])){
        header('Location: index.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="css/login.css?v=<?php echo time(); ?>">
</head>

<body class="login-box">

    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">

                                    <div class="text-center">
                                        <h1 class="login-title">DepEd Manila</h1>
                                    </div>
                                    <?php if (isset($_GET['error'])) { ?>
                                        <p class="text-danger"><?php echo $_GET['error']; ?></p>
                                    <?php }?>
                                    <form class="user" action="database/login_inc.php" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="webusername" id="webusername" placeholder="Username" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="webpassword" id="webpassword" placeholder="Password" autocomplete="off" required>
                                        </div>

                                        <!-- <input class="btn btn-primary btn-user btn-block" type="submit" id="btnSubmit" value="Login"> -->
                                        <button type="submit" id="submit" name="loginButton" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>

                                    </form>

                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="#" data-id="" data-toggle="modal" data-target="#forgotpassword" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Forgot Password?</a>
                                        <!-- modals -->
                                        <?php include 'includes/modals/forgotpasswordmodal.php'; ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>



</body>

</html>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>