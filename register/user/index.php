<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CariPrivatYuk! - Register User</title>


    <link href="../../assets/main_resources/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <link href="../../assets/main_resources/css/modern-business.css" rel="stylesheet">


    <link href="../../assets/main_resources/css/style.css" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />


    <style>
        .register {
            margin-top: 40px;
        }

        .child-div {
            height: 100%
        }

        #register-area {
            height: 79vh;
        }

        .dropdown:hover .dropdown-menu {
            display: block !important;
        }
    </style>


</head>

<body>

    <?php include('../../partials/navbars/nav-orange.php'); ?>
    <div class="container py-5 mt-5" id="register-area">
        <div class="row register d-flex justify-content-center">
            <div class="col-lg-4 parent-div">
                <div class="row child-div">
                    <div class="col-12">
                        <?php require('../../partials/flash_messages/flash.php'); ?>
                        <h3 id="daftar" style="font-weight: bold;">Daftar Akun</h3>
                        <form method="POST" action="/CariPrivatYuk-PWEB/controller/registerUser.php" enctype="multipart/form-data">
                            <!-- <input type="hidden" name="_token" value="8DvzUWwZHqPd4WWWQagoTWfikvIXqDmIQbKjmqkP"> -->
                            <div class="form-group">
                                <label for="username">Nama Lengkap</label>
                                <input type="text" class="form-control" name="name_user" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" name="address_user" required>
                            </div>
                            <div class="form-group">
                                <label for="email1">Email</label>
                                <input type="email" class="form-control" name="email_user" required>
                            </div>
                            <div class="form-group">
                                <label for="password1">Password</label>
                                <input type="password" class="form-control" name="password_user" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Daftar</button>
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