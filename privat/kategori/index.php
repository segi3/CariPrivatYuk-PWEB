<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CariPrivatYuk! - Homepage</title>


    <link href="../../assets/main_resources/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <link href="../../assets/main_resources/css/modern-business.css" rel="stylesheet">


    <link href="../../assets/main_resources/css/style.css" rel="stylesheet">


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

    <?php include('../../partials/navbars/nav-orange.php'); ?>

    <?php

    require_once('../../db-connection.php');

    $slug = $_GET['slug'];

    // echo($_GET['slug']);die();

    $con = open_connection();

    $query = "
        SELECT C.title as nama_kategori, P.title as judul_privat, T.fullname as nama_tutor, P.price_per_hour as harga_privat, T.path_foto as foto_privat FROM privates P
        INNER JOIN categories C ON C.id = P.category_id
        INNER JOIN tutors T ON T.id = P.mentor_id
        WHERE C.slug='".$slug."';
    ";

    try {
        $data = $con->query($query);
    }catch (Exception $e){
        echo "Gagal mendapatkan data privat, " . $con->error;
    }
    $kursus = [];
    if(!isset($data)){
        if ($data->num_rows > 0) {
            while($row = $data->fetch_assoc()){
                array_push($kursus, $row);
            }
        }
    }

    // Getting Categories
    $query2 = "
    SELECT title FROM categories WHERE slug = '".$_GET['slug']."' LIMIT 1;
    ";

    try {
        $nama_kategori = $con->query($query2);
    }catch (Exception $e){
        echo "Gagal mendapatkan data ketergori, " . $con->error;
    }
    $kategori = [];
    if(isset($nama_kategori)){
        if ($nama_kategori->num_rows > 0) {
            while($row = $nama_kategori->fetch_assoc()) {
                array_push($kategori,$row);
            }
        }
    }
    close_connection($con);
    
    ?>

    <div class="container" id="mentor-pop">

        <h1 class="my-5" style="text-align: center;">Kategori: <?php echo $kategori[0]['title']; ?></h1>

        <div class="row" id="kurus-pop" style="height:100vh">
            <?php
            foreach($kursus as $k) {
                ?>
            <div class="col-lg-4 mb-4">
                <div class="card h-100 border-0">
                    <a href="privat"><img class="card-img-top"
                            src="../../berkas/foto_tutor/<?php echo($k['foto_privat']); ?>" alt=""></a>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo($k['nama_tutor']); ?></h5>
                        <p class="card-text"><?php echo($k['judul_privat']); ?></p>
                        <div class="row">
                            <div class="col-9">
                                <span class="price-tag"><?php echo($k['harga_privat']); ?> </span><span
                                    class="hr-tag">/jam</span>
                            </div>
                            <a href="privat" class="col-2 btn btn-primary beli-btn">Cek</a>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            }
        ?>
            <!-- <div class="col-lg-4 mb-4">
                <div class="card h-100 border-0">
                    <a href="privat"><img class="card-img-top" src="../../assets/main_resources/kursus/mentor/1.jpg"
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
                    <a href="privat"><img class="card-img-top" src="../../assets/main_resources/kursus/mentor/2.jpg"
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
                    <a href="privat"><img class="card-img-top" src="../../assets/main_resources/kursus/mentor/3.jpg"
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
                    <a href="privat"><img class="card-img-top" src="../../assets/main_resources/kursus/mentor/4.jpg"
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
                    <a href="privat"><img class="card-img-top" src="../../assets/main_resources/kursus/mentor/5.jpg"
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
            </div> -->
            <!-- <div class="col-lg-4 mb-4">
                <div class="card h-100 border-0">
                    <a href="privat"><img class="card-img-top" src="../../assets/main_resources/kursus/mentor/6.jpg"
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
            </div> -->
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