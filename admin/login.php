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
                                    <div id="error-message" class="error-message text-danger"></div>

                                    <form class="user" id="login-form">
                                        <div class="row">
                                            <div class="col-12 form-group">
                                                <input type="text" class="form-control form-control-user" name="webusername" id="webusername" placeholder="Username">
                                            </div>

                                            <div class="col-12 form-group">
                                                <div class="input-group mb-3">
                                                    <input type="password" class="form-control form-control-user" name="webpassword" id="webpassword" placeholder="Password" autocomplete="off">
                                                    <div class="input-group-append">
                                                        <button type="button" id="show_password" class="btn btn-outline-secondary btn-user btn-block">
                                                            <i class="fa fa-eye"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
<script>
    $(document).ready(function() {
        $('#show_password').click(function() {
            var passwordField = $('#webpassword');
            var fieldType = passwordField.attr('type');
            
            // Toggle password visibility
            if (fieldType === 'password') {
                passwordField.attr('type', 'text');
                $(this).html('<i class="fa fa-eye-slash"></i>');
            } else {
                passwordField.attr('type', 'password');
                $(this).html('<i class="fa fa-eye"></i>');
            }
        });
    });
</script>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="js/script.js"></script>