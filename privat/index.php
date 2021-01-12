<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CariPrivatYuk! - Privat</title>


    <link href="../assets/main_resources/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <link href="../assets/main_resources/css/modern-business.css" rel="stylesheet">


    <link href="../assets/main_resources/css/style.css" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />


    <style>
        .kursus-head {
            margin-top: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .parent-div {}

        .child-div {
            height: 100%;
        }

        #thumbPrivat {
            height: 200px !important;
            width: 200px !important;
            margin-top: 100px;
            border-radius: 150px;
        }
        .dropdown:hover .dropdown-menu {
            display: block !important;
        }

        .kotak{
            margin-left: 5%;
            margin-right: 5%;
            background-image: url(../assets/main_resources/imgs/bgjunc.png);
            /* Full height */
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            
        }
        .judulprivat{
            font-weight: bold;
            color: white;
        }
        .judulprivat2{
            color: white;
        }

        .judulprivat3{
            font-size: 20 px;
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

    <div class="kotak">
        <div class="col kursus-head">
            <div>
                <img class="card-img-top" src="https://place-hold.it/286x286/F78104" alt="" id="thumbPrivat">
            </div>
            <div class="col kursus-head">
                <div class="row child-div">
                    <div class="col-12">
                        <h3 class="judulprivat">Judul - Privat</h3>
                        <h3 class="judulprivat2" style="margin-bottom: 25px;">Nama - Tutor</h3>
                    </div>
                </div>
            </div>

            <div class="parent-div">
                <div class="row child-div d-flex">
                    <div>
                        <h5 style="color: white; margin-bottom: 75px">Rp 79.999/jam</h5>
                    </div>
                    
                </div>

            </div>

        </div>
    </div>

    <div class="pt-5" style="background-color: #F3F3F3; height: 1000px;">
        <div class="container">
            <div class="row">
                <!-- <div class="col-lg-5">
                    <div class="row">
                        <div class="col-12 mb-5">
                            <div class="card border-0">
                                <div class="card-body">
                                    <h5 class="mb-4 kursus-body-header">Subjek yang diajarkan</h5>
                                    <div class="div-subject">
                                        <span class="subject">Subjek 1</span>
                                    </div>
                                    <div class="div-subject">
                                        <span class="subject">Subjek 2</span>
                                    </div>
                                    <div class="div-subject">
                                        <span class="subject">Subjek 3</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="col-lg-12" >
                    <div class="row ">
                        <div class="col-12">
                            <div class="card border-0">
                                <div class="card-body">
                                    <h5 class="mb-4 kursus-body-header">Metodologi</h5>
                                    <p >
                                        Salah satu metodologi pengajaran saya adalah dengan sering mempraktekan bahasa
                                        inggris dengan siswa dan mengajak siswa untuk menggunakan vocabulary yang sudah
                                        siswa kuasai sehingga siswa terbiasa dan percaya diri dalam berbahasa Inggris.
                                    </p>
                                    <p>
                                        Menganalisa kelemahan siswa sehingga kita bisa mengetahui kemampuan apa saja
                                        yang harus ditingkatkan.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mt-5">
                    <div class="card border-0">
                        <div class="card-body">
                            <h5 class="kursus-body-header">
                                Ulasan untuk judul - privat
                            </h5>
                            <div class="row mt-5">
                                <div class="col-12 row">
                                    <div class="col-12">
                                        <p><span style="color: blue; font-weight: bold;">Pengguna 1 </span>Mengajar dengan cara yang mudah dipahami dan sabar</p>
                                        <p><span style="color: blue; font-weight: bold;">Pengguna 2 dari syurga </span>Mantap betulll</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-12 mt-5" >
                            <div class="card border-0">
                                <div class="card-body">
                                    <h5 class="kursus-body-header" style="margin-bottom:20px">
                                        Pilih metode belajar
                                    </h5>
                                        <form action="">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label judulprivat3" for="exampleCheck1">Daring</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label judulprivat3" style="margin-bottom:25px" for="exampleCheck1">Luring</label>
                                        </div>
                                        <a href="" type="submit" class="btn btn-primary" style="width:100%; margin-bottom:10px">Ajukan permintaan</a>
                                        </form>
                                    </div>
                        </div>
                    </div>
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


    <script src="../assets/main_resources/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/main_resources/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



</body>

</html>