<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>CariPrivatYuk! - My Trasaction</title>

<link href="../../assets/main_resources/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<link href="../../assets/main_resources/css/modern-business.css" rel="stylesheet">

<link href="../../assets/main_resources/css/style.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />


<style>
    .kursus-head {
        margin-top: 40px;
    }

    .child-div {
        height: 100%
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

    $con = open_connection();

    $query = "
        SELECT PE.id as id_enroll, PE.bukti_pembayaran, P.title, P.price_per_hour, PE.total_hours, PE.tanggal_pembelian, PE.payment_status FROM private_enrolls PE
        INNER JOIN users U ON U.id = PE.user_id
        INNER JOIN privates P ON P.id = PE.private_id
        WHERE PE.approval_status = 2 AND U.id = ".$_SESSION['user_id']."
    ";
    try {
        $data = $con->query($query);
    }catch (Exception $e){
        echo "Gagal mendapatkan datas " . $con->error;
    }
    $transaksi = [];
    if(isset($data)){
        if ($data->num_rows > 0) {
            while($row = $data->fetch_assoc()){
                array_push($transaksi, $row);
            }
        }
    }
    // print_r($transaksi);die();


    ?>
    
    <div class="pt-5" style="background-color: #F3F3F3; height: 1000px;">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 mt-5">
                <h3 class="kursus-body-header mb-4">Transaksi Reservasi Privat</h3>
                <div class="card border-0 px-3">
                    <div class="card-body">
                        <div class="row mt-2">
                            <div class="col-12 row">
                                <?php require('../../partials/flash_messages/flash.php'); ?>
                                <table style="width:100%" class="table table-striped">
                                    <tr>
                                        <th>Kursus</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                        <th>Harga</th>
                                        <th>Status Pembayaran</th>
                                        <th>Upload Bukti Pembayaran</th>
                                    </tr>
                                    <?php
                                    // 2 belum dibayar
                                    // 1 udah dibayar
                                    foreach($transaksi as $tr) {
                                        ?><td><?php echo($tr['title']); ?></td><?php
                                        ?><td><?php echo($tr['tanggal_pembelian']); ?></td><?php
                                        ?><td><?php echo($tr['total_hours']); ?></td><?php
                                        ?><td><?php echo($tr['price_per_hour']); ?></td><?php
                                        ?>
                                            <td>
                                                <?php
                                                
                                                if ($tr['payment_status'] == 2) {
                                                    echo '<span class="badge badge-warning">Belum dibayar</span>';
                                                }else if ($tr['payment_status'] == 1) {
                                                    echo '<span class="badge badge-success">Sudah dibayar</span>';
                                                }
                                                
                                                ?>
                                            </td>
                                        <?php
                                        ?>
                                            <td>
                                                <?php 
                                                    if($tr['bukti_pembayaran']) {
                                                        echo('Sudah upload');
                                                    }else if ($tr['payment_status'] == 2) {
                                                        ?>
                                                        <form action="/CariPrivatYuk-PWEB/controller/uploadBuktiPembayaran.php" enctype="multipart/form-data" method="POST">
                                                            <div class="row">
                                                                <div class="col-9">
                                                                    <input type="file" class="form-control-file" id="Foto" name="bukti_bayar" accept="image/*">
                                                                    <input type="hidden" name="tanggal_pembelian" value="<?php echo($tr['tanggal_pembelian']); ?>">
                                                                    <input type="hidden" name="judul_privat" value="<?php echo($tr['title']); ?>">
                                                                    <input type="hidden" name="id_enroll" value="<?php echo($tr['id_enroll']); ?>">
                                                                </div>
                                                                <div class="col-3">
                                                                    <button type="submit" class="btn btn-primary btn-sm">Upload</button>
                                                                </div>
                                                            </div>
                                                        </form>

                                                        <?php
                                                    }else {
                                                        echo('-');
                                                    }
                                                ?>
                                                
                                                
                                            </td>
                                        <?php
                                    }
                                    ?>
                                </table>
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

    
    <script src="../../assets/main_resources/vendor/jquery/jquery.min.js"></script>
<script src="../../assets/main_resources/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    
</body>

</html>
