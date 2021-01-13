<?php session_start();

if (isset($_SESSION['login'])){
    if ($_SESSION['login'] == true){
        header('Location: http://localhost/CariPrivatYuk-PWEB/');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CariPrivatYuk! - Login User</title>


    <link href="../../assets/main_resources/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <link href="../../assets/main_resources/css/modern-business.css" rel="stylesheet">


    <link href="../../assets/main_resources/css/style.css" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />


    <style>
        .login {
            margin-top: 40px;
        }

        .child-div {
            height: 100%
        }

        #login-area {
            height: 79vh;
        }

        .dropdown:hover .dropdown-menu {
            display: block !important;
        }
    </style>


</head>

<body>

    <?php include('../../partials/navbars/nav-orange.php'); ?>

    <div class="container py-5 mt-5" style="height:100vh" id="login-area">
        <div class="row login mt-5 pt-5">
            <div class="col-lg-6">
                <?php require('../../partials/flash_messages/flash.php'); ?>
                <img class="card-img" src="../../assets/main_resources/imgs/jumbotron1.jpeg" alt="">
            </div>
            <div class="col-lg-3 parent-div">
                <div class="row child-div">
                    <div class="col-12">
                        <h3 id="login" style="font-weight: bold;">Login User</h3>
                        <form method="POST" action="/CariPrivatYuk-PWEB/controller/loginUser.php">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Enter Email" name="email"
                                    required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Enter Password" name="password"
                                    required>
                            </div>
                            <div class="form-group">
                                Belum punya akun? <a href="/CariPrivatYuk-PWEB/register/user"> daftar disini </a>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <footer class="py-5">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; CariPrivatYuk 2021</p>
        </div>
        <!-- /.container -->
    </footer>


    <script src="../../assets/main_resources/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/main_resources/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>