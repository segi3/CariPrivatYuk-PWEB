<?php session_start(); ?>
<?php 
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/CariPrivatYuk-PWEB/db-connection.php";
    include_once($path);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CariPrivatYuk! - Homepage</title>


    <link href="assets/main_resources/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <link href="assets/main_resources/css/modern-business.css" rel="stylesheet">


    <link href="assets/main_resources/css/style.css" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />


    <style>
        body {
            font-family: poppins;
            max-width: 100%;
            overflow-x: hidden;
        }

        #mentorSection {
            background-color: black;
        }

        #kategoriSection {
            background-color: black;
        }

        #myVideo {
            width: 100vw;
        }

        #title-vid {
            position: absolute;
            /* Reposition logo from the natural layout */
            left: 75px;
            top: 500px;
            width: 300px;
            height: 200px;
            z-index: 2;
            color: #ffffff;
        }
        .dropdown:hover .dropdown-menu {
            display: block !important;
        }
    </style>

</head>

<body>

    <?php include('partials/navbars/nav-orange.php'); ?>

    <div style="background-color: black;">
        <video autoplay muted loop id="myVideo" style="z-index: -1;">
            <source src="assets/main_resources/superprof_trouvez-le-professeur-parfait_desktop.mp4" type="video/mp4">
        </video>
        <div id="title-vid">
            <h1><span id="jd1">Cari</span><span id="jd2">Privat</span><span id="jd3">Yuk!</span></h1>
            <p>Kuasai hobi dan bakatmu</p>
        </div>

    </div>



    <div id="mentorSection" class="px-5 py-5">
        <div class="row mt-5">
            <div class="col-lg-7">
                <div class="row" id="collagecontainer">
                    <div class="col-lg-4 mcollage">
                        <img src="assets/main_resources/home/mentor/pexels-startup-stock-photos-7369(1).jpg" alt="">
                        <img src="assets/main_resources/home/mentor/pexels-cottonbro-4753927.jpg" alt="">
                        <img src="assets/main_resources/home/mentor/pexels-rodnae-productions-6192176.jpg" alt="">
                    </div>
                    <div class="col-lg-4 mcollage">
                        <img src="assets/main_resources/home/mentor/pexels-kyle-loftus-3379933.jpg" alt="">
                        <img src="assets/main_resources/home/mentor/pexels-mentatdgt-2173508.jpg" alt="">
                        <img src="assets/main_resources/home/mentor/pexels-hitesh-choudhary-1261427.jpg" alt="">
                    </div>
                    <div class="col-lg-4 mcollage">
                        <img src="assets/main_resources/home/mentor/pexels-burst-374054.jpg" alt="">
                        <img src="assets/main_resources/home/mentor/pexels-gabriel-santos-fotografia-2102568.jpg"
                            alt="">
                        <img src="assets/main_resources/home/mentor/pexels-budgeron-bach-5149569.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="mheading">
                    Guru
                </div>
                <div class="mheading">
                    Pelatih
                </div>
                <div class="mheading">
                    Seniman
                </div>
                <div class="mheading">
                    Mentor
                </div>
                <div class="mheading">
                    Para ahli di bidangnya
                </div>
            </div>
        </div>

    </div>


    <div id="caraKerja">
        <div class="container">
            <div class="" style="margin-top: 100px; margin-bottom: 100px;">
                <h1 style="font-weight: 700; text-align: center;">Bagaimana cara kerja CariPrivatYuk?</h1>
            </div>

            <div class="row pt-5">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4 offset-lg-1 d-flex">
                            <div class="align-self-center" style="display: inline">
                                <h3 style="font-weight: 600;">Temukan tutor privat dengan cakupan materi terlengkap</h3>
                                <p>
                                    Cek masing-masing subjek yang tersedia dan pilih sesuai minat dan bakat kalian
                                </p>
                            </div>

                        </div>
                        <div class="col-lg-7">
                            <img style="width: 100%;" src="assets/main_resources/home/svg/undraw_studying_s3l7.svg"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-5 my-5">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-7">
                            <img style="width: 100%;" src="assets/main_resources/home/svg/undraw_teaching_f1cm.svg"
                                alt="">
                        </div>
                        <div class="col-lg-4 d-flex">
                            <div class="align-self-center" style="display: inline">
                                <h3 style="font-weight: 600;">Temukan tutor yang sempurna</h3>
                                <p>
                                    Cek tutor-tutor handal untuk setiap subjeknya dan temukan tutor favoritmu
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" id="mentor-pop">

        <h1 class="my-5" style="text-align: center;height:100vh">Privat Populer</h1>

        <div class="row" id="kurus-pop">
            <div class="col-lg-4 mb-4">
                <div class="card h-100 border-0">
                    <a href="privat"><img class="card-img-top" src="assets/main_resources/kursus/mentor/1.jpg"
                            alt=""></a>
                    <div class="card-body">
                        <h5 class="card-title">Eja Suryono</h5>
                        <p class="card-text">Bahasa Jerman</p>
                        <div class="row">
                            <div class="col-9">
                                <span class="price-tag">Rp 179.999 </span><span class="hr-tag">/jam</span>
                            </div>

                            <a href="privat" class="col-2 btn btn-primary beli-btn">Cek</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100 border-0">
                    <a href="privat"><img class="card-img-top" src="assets/main_resources/kursus/mentor/2.jpg"
                            alt=""></a>
                    <div class="card-body">
                        <h5 class="card-title">Chelsea Hassanah</h5>
                        <p class="card-text">Personal Trainer</p>
                        <div class="row">
                            <div class="col-9">
                                <span class="price-tag">Rp 179.999 </span><span class="hr-tag">/jam</span>
                            </div>

                            <a href="privat" class="col-2 btn btn-primary beli-btn">Cek</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100 border-0">
                    <a href="privat"><img class="card-img-top" src="assets/main_resources/kursus/mentor/3.jpg"
                            alt=""></a>
                    <div class="card-body">
                        <h5 class="card-title">Banara Wisnu Pranowo</h5>
                        <p class="card-text">Pemrograman Web/Android</p>
                        <div class="row">
                            <div class="col-9">
                                <span class="price-tag">Rp 179.999 </span><span class="hr-tag">/jam</span>
                            </div>

                            <a href="privat" class="col-2 btn btn-primary beli-btn">Cek</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100 border-0">
                    <a href="privat"><img class="card-img-top" src="assets/main_resources/kursus/mentor/4.jpg"
                            alt=""></a>
                    <div class="card-body">
                        <h5 class="card-title">Winda Prastuti</h5>
                        <p class="card-text">Akting Seni Peran</p>
                        <div class="row">
                            <div class="col-9">
                                <span class="price-tag">Rp 179.999 </span><span class="hr-tag">/jam</span>
                            </div>

                            <a href="privat" class="col-2 btn btn-primary beli-btn">Cek</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100 border-0">
                    <a href="privat"><img class="card-img-top" src="assets/main_resources/kursus/mentor/5.jpg"
                            alt=""></a>
                    <div class="card-body">
                        <h5 class="card-title">Irfan Maulana</h5>
                        <p class="card-text">Ilmu Pengetahuan Alam</p>
                        <div class="row">
                            <div class="col-9">
                                <span class="price-tag">Rp 179.999 </span><span class="hr-tag">/jam</span>
                            </div>

                            <a href="privat" class="col-2 btn btn-primary beli-btn">Cek</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100 border-0">
                    <a href="privat"><img class="card-img-top" src="assets/main_resources/kursus/mentor/6.jpg"
                            alt=""></a>
                    <div class="card-body">
                        <h5 class="card-title">Rini Paramita Lestari</h5>
                        <p class="card-text">Biola</p>
                        <div class="row">
                            <div class="col-9">
                                <span class="price-tag">Rp 179.999 </span><span class="hr-tag">/jam</span>
                            </div>

                            <a href="privat" class="col-2 btn btn-primary beli-btn">Cek</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ribbon-yellow mt-5 pt-5 pb-5">
        <h1 class="">Kursus Privat</h1>
        <p>Kami privat bagi kalian yang sedang mencari tutor</p>
        <div class="d-flex justify-content-center">
            <a href="#" class="btn btn-primary ">Cari tutor</a>
        </div>
    </div>


    <div class="row" style="height: 50vh;">
        <div class="col-6 ribbon-orange d-flex">
            <div class="align-self-center">
                <h1 class="">Tunggu apalagi? Temukan tutor favoritmu!</h1>
                <p>Daftar akun sekarang</p>
                <div class="d-flex justify-content-center">
                    <a href="/user-register" class="btn btn-primary ">Daftar Akun</a>
                </div>
            </div>

        </div>
        <div class="col-6 ribbon-ligreen d-flex">
            <div class="align-self-center">
                <h1 class="">Berbagi ilmu dengan semua orang!</h1>
                <p>Daftar menjadi mentor</p>
                <div class="d-flex justify-content-center">
                    <a href="/mentor-register" class="btn btn-primary ">Daftar Tutor</a>
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


    <script src="assets/main_resources/vendor/jquery/jquery.min.js"></script>
    <script src="assets/main_resources/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



</body>

</html>