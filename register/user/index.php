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

    <!-- Navigation -->
    <nav id="navorange" class="navbar fixed-top navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/CariPrivatYuk-PWEB/"><span id="jd1">Cari</span><span
                    id="jd2">Privat</span><span id="jd3">Yuk!</span></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <!-- Form cari nama tutor -->
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-primary my-2 my-sm-0" type="submit">Cari</button>
                </form>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="/CariPrivatYuk-PWEB">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Privat
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                            <a class="dropdown-item" href="#">Akademik</a>
                            <a class="dropdown-item" href="#">Development</a>
                            <a class="dropdown-item" href="#">Bisnis</a>
                            <a class="dropdown-item" href="#">Finansial</a>
                            <a class="dropdown-item" href="#">Teknologi dan Software</a>
                            <a class="dropdown-item" href="#">Desain</a>
                            <a class="dropdown-item" href="#">Olahraga</a>
                            <a class="dropdown-item" href="#">Seni</a>
                            <a class="dropdown-item" href="#">Musik</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                         <a href="/CariPrivatYuk-PWEB/login" class="nav-link dropdown-toggle" id="navbarDropdownBlog">Login <span class="caret"></span></a>
                         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                            <a class="dropdown-item" href="/CariPrivatYuk-PWEB/login/user">User</a>
                            <a class="dropdown-item" href="/CariPrivatYuk-PWEB/login/tutor">Tutor</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                         <a href="/CariPrivatYuk-PWEB/register" class="nav-link dropdown-toggle" id="navbarDropdownBlog">Register <span class="caret"></span></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                            <a class="dropdown-item active" href="/CariPrivatYuk-PWEB/register/user">User</a>
                            <a class="dropdown-item" href="/CariPrivatYuk-PWEB/register/tutor">Tutor</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>




    <div class="container py-5 mt-5" id="register-area">
        <div class="row register d-flex justify-content-center">
            <div class="col-lg-4 parent-div">
                <div class="row child-div">
                    <div class="col-12">
                        <h3 id="daftar" style="font-weight: bold;">Daftar Akun</h3>
                        <form method="POST" action="#" enctype="multipart/form-data">
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