<?php session_start(); ?>
<?php 
    $path = $_SERVER['DOCUMENT_ROOT'];
    $dbcon = $path."/CariPrivatYuk-PWEB/db-connection.php";
    include($dbcon);
    $privat_image = "/CariPrivatYuk-PWEB/berkas/foto_tutor/";
?>

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
            object-fit: cover;
        }

        .dropdown:hover .dropdown-menu {
            display: block !important;
        }

        .kotak {
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

        .judulprivat {
            font-weight: bold;
            color: white;
        }

        .judulprivat2 {
            color: white;
        }

        .judulprivat3 {
            font-size: 20 px;
        }
    </style>

</head>

<body>
    <!-- Nav -->
    <?php include($path.'/CariPrivatYuk-PWEB/partials/navbars/nav-orange.php'); ?>
    <?php 
        $privat_id = $_GET['id'];

        // echo($_GET['slug']);die();
    
        $con = open_connection();
    
        $query = "
            SELECT P.id AS privat_id,P.method AS metodologi_privat, P.pelaksanaan_offline AS offline,P.pelaksanaan_online AS online, P.title AS judul_privat, T.fullname AS nama_tutor,T.id AS id_tutor, P.price_per_hour AS harga_privat, T.path_foto AS foto_privat
            FROM privates P
            INNER JOIN tutors T ON T.id = P.tutor_id
            WHERE P.id=".$privat_id.";
        ";
        
    
        try {
            $data = $con->query($query);
        }catch (Exception $e){
            echo "Gagal mendapatkan data privat, " . $con->error;
        }
        if($data->num_rows>0){
            $rawData=$data->fetch_assoc();
        }

        $query2 = "
            SELECT R.id AS id_review, R.description AS deskripsi_review,U.fullname AS nama_user FROM reviews R
            INNER JOIN users U ON U.id = R.user_id
            WHERE R.privat_id=".$privat_id." ORDER BY R.privat_id DESC LIMIT 4;
        ";
        try {
            $data_ulasan = $con->query($query2);
        }catch (Exception $e){
            echo "Gagal mendapatkan data privat, " . $con->error;
        }
        
    ?>
    <div class="kotak">
        <div class="col kursus-head">
            <div>
                <img class="card-img-top" src="<?php echo $privat_image.$rawData['foto_privat']; ?>" alt=""
                    id="thumbPrivat">
            </div>
            <div class="col kursus-head">
                <div class="row child-div">
                    <div class="col-12">
                        <h3 class="judulprivat"><?php echo $rawData['judul_privat']?></h3>
                        <h3 class="judulprivat2" style="margin-bottom: 25px;"><?php echo $rawData['nama_tutor']?></h3>
                    </div>
                </div>
            </div>

            <div class="parent-div">
                <div class="row child-div d-flex">
                    <div>
                        <h5 style="color: white; margin-bottom: 75px">
                            <?php echo "Rp. ".$rawData['harga_privat']."/jam"?></h5>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <div class="pt-5" style="background-color: #F3F3F3; height: 1000px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row ">
                        <div class="col-12">
                            <div class="card border-0">
                                <div class="card-body" style="min-height:30vh">
                                    <h5 class="mb-4 kursus-body-header">Metodologi</h5>
                                    <p>
                                        <?php echo $rawData['metodologi_privat']?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mt-5">
                   
                    <!-- Motode belajar-->
                    <?php
                    if(isset($_SESSION["login"])){
                    ?>
                    <div class="row" id="alert">
                        <div class="col-12 mt-5">
                            <div class="card border-0">
                                <div class="card-body">
                                    <?php require($_SERVER['DOCUMENT_ROOT'].'/CariPrivatYuk-PWEB/partials/flash_messages/flash.php'); ?>
                                    <div class="row">
                                        <div class="col-6">
                                            <h5 class="kursus-body-header" style="margin-bottom:20px">
                                                Pilih metode belajar
                                            </h5>
                                            <form method="POST" action="/CariPrivatYuk-PWEB/controller/createPrivatEnroll.php">
                                                <?php
                                                if($rawData['online']){?>
                                                <div class="form-check mb-3">
                                                    <input name="checkboxPelaksanaan[online]" class="form-check-input" type="checkbox" id="inlineCheckbox2" value="1">
                                                    <label class="form-check-label" for="inlineCheckbox2">Online</label>
                                                </div>
                                                <?php }?>
                                                <?php
                                                if($rawData['offline']){?>
                                                <div class="form-check mb-3">
                                                    <input name="checkboxPelaksanaan[offline]" class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1">
                                                    <label class="form-check-label" for="inlineCheckbox1">Offline</label>
                                                </div>
                                                <?php }?>
                                        </div>
                                        <div class="col-">
                                            <h5 class="kursus-body-header" style="margin-bottom:20px">
                                                Pilih durasi belajar
                                            </h5>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="durasiInput"
                                                        aria-describedby="durasiHelp" placeholder="Angka dimulai dari 1"
                                                        name="durasi_privat" required>
                                                    <small id="durasiHelp" class="form-text text-muted">Hanya
                                                        angka</small>
                                                </div>
                                                <input type="hidden" name="id_privat" value="<?php echo $rawData['privat_id']?>">
                                        </div>
                                    </div>
                                        <?php
                                            if(strcmp($_SESSION['role'],"tutor")!=0){
                                        ?>

                                        <button href="" type="submit" class="btn btn-primary"
                                            style="width:100%; margin-bottom:10px">Ajukan permintaan</button>
                                        <?php }else{ ?>

                                        <a href="#" type="submit" class="btn btn-secondary" 
                                            style="width:100%; margin-bottom:10px; pointer-events: none;">Silahkan buat akun user untuk mengajukan privat.</a>
                                        
                                        <?php }?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    else{
                    ?>
                    <div class="row">
                        <div class="col-12 mt-5">
                            <div class="card border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="kursus-body-header" class="mx-auto mt-20 mb-10">
                                                Anda harus login terlebih dahulu untuk mengajukan permintaan kursus.
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    <!-- end of metode -->

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