<?php session_start(); ?>
<?php 
    $path = $_SERVER['DOCUMENT_ROOT'];
    $dbcon = $path."/CariPrivatYuk-PWEB/db-connection.php";
    include($dbcon);
    
    $head = "/CariPrivatYuk-PWEB/login/user";
    if(isset($_SESSION['role'])){
        if(strcmp($_SESSION['role'],'user')!=0){
            
            header($head);
        }
    }
    else{
        header("location: ".$head);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CariPrivatYuk! - My Privat</title>


    <link href="../../assets/main_resources/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <link href="../../assets/main_resources/css/modern-business.css" rel="stylesheet">


    <link href="../../assets/main_resources/css/style.css" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />


    <style>
        .kursus-head {
            margin-top: 40px;
        }

        .child-div {
            height: 100%
        }

        .kursus-head-ks {
            background-color: #FAAB36;
            padding: 20px;
            border-radius: 20px;
        }

        .kursus-title-ks {
            color: #FFFFFF;
            font-weight: 600;
            margin: auto 0;
        }

        .dropdown:hover .dropdown-menu {
            display: block !important;
        }
    </style>


</head>

<body>

    <?php include('../../partials/navbars/nav-orange.php'); ?>

    <div class="pt-5" style="background-color: #F3F3F3;">
        <div class="container">
            <h3 class="kursus-body-header">Permintaan Privat</h3>
            <?php
                $query_permintaan="
                    Select 
                    E.id as enroll_id, P.id as private_id, T.id as tutor_id,
                    T.fullname as tutor_name,P.title as private_title,
                    E.payment_status as enroll_bayar, E.approval_status as enroll_approval,
                    E.bukti_pembayaran as bukti_bayar
                    from private_enrolls E
                    INNER JOIN users U on E.user_id=U.id
                    INNER JOIN privates P on E.private_id=P.id
                    INNER JOIN tutors T on P.tutor_id=T.id
                    WHERE U.id=".$_SESSION['user_id']."
                ";
                // print_r($query_permintaan);die();

                $con=open_connection();

                $enroll_res=$con->query($query_permintaan);

            
            ?>
            <div class="row">

                <div class="col-lg-12 my-5">
                    <div class="card border-0">
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Mentor</th>
                                        <th scope="col">Privat</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if($enroll_res->num_rows){
                                            while($en=$enroll_res->fetch_assoc()){
                                    ?>
                                    <tr>
                                        <td><?php echo $en['tutor_name']?></td>
                                        <td><?php echo $en['private_title']?></td>
                                        <td>
                                            <?php
                                                    if($en['enroll_approval']==2 && $en['enroll_bayar']==2){
                                                        echo "<span class='badge badge-warning'>Menunggu konfirmasi mentor</span>";
                                                    }else if($en['enroll_approval']==1 && $en['enroll_bayar']==2 && is_null($en['bukti_bayar'])){
                                                        echo "<span class='badge badge-warning'>Menunggu pembayaran</span>";
                                                    }else if($en['enroll_approval']==1 && $en['enroll_bayar']==2 && !is_null($en['bukti_bayar'])){
                                                        echo "<span class='badge badge-warning'>Menunggu verifikasi tutor</span>";
                                                    }
                                                    else if($en['enroll_approval']==1 && $en['enroll_bayar']==1){
                                                        echo "<span class='badge badge-success'>Telah disetujui mentor</span>";
                                                    }
                                                
                                                ?>
                                        </td>
                                    </tr>
                                    <?php
                                        
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <h3 class="kursus-body-header">Privat Saya</h3>
            <div class="row">
                <div class="col-lg-12 my-3">
                    <div class="card border-0">
                        <div class="card-body">

                            <!-- Satu Privat -->
                            <div class="col-lg-12 mt-4">
                                <div class="row">
                                    <div class="col-lg-12 row mt-3 pl-5">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <th scope="col">Judul</th>
                                                    <th scope="col">Tutor</th>
                                                    <th scope="col">Waktu</th>
                                                    <th scope="col">Meeting</th>
                                                    <th scope="col">Durasi (jam)</th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        
                                                        $query_jadwal="
                                                            select P.title as judul_privat, T.fullname as nama_tutor,
                                                            S.tanggal as tanggal_jadwal,S.jam as jam_jadwal,
                                                            S.lokasi as lokasi_jadwal,S.durasi as durasi_jadwal,
                                                            S.online as online,S.offline as offline
                                                            from schedules S
                                                            INNER JOIN private_enrolls E on E.id=S.enroll_id
                                                            INNER JOIN privates P on P.id=E.private_id
                                                            INNER JOIN tutors T on P.tutor_id=T.id
                                                            WHERE E.user_id = ".$_SESSION['user_id']."
                                                        ";
                                                        // print_r($query_jadwal);die();
                                                        $res=$con->query($query_jadwal);
                                                        if($res->num_rows>0){
                                                            while($r = $res->fetch_assoc()){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $r['judul_privat']?></td>
                                                        <td><?php echo $r['nama_tutor']?></td>
                                                        <td><?php echo $r['tanggal_jadwal']?> <span class="badge badge-dark"><?php echo $r['jam_jadwal']?>
                                                                WIB</span>
                                                        </td>
                                                        <td>
                                                            <?php if($r['online']){?>
                                                                <a href="//<?php echo $r['lokasi_jadwal']?>">Meeting</a>
                                                            <?php }?>
                                                            <?php if($r['offline']){?>
                                                                <p><?php echo $r['lokasi_jadwal']?></p>
                                                            <?php }?>
                                                        </td>
                                                        <td><?php echo $r['durasi_jadwal']?></td>
                                                    </tr>
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <!-- End of Satu Privat -->
                        </div>
                        </div>
                    </div>
                </div>



                <footer class="py-5 mt-5">
                    <div class="container">
                        <p class="m-0 text-center text-white">Copyright &copy; CariPrivatYuk 2021</p>
                    </div>
                    <!-- /.container -->
                </footer>


                <script src="../../assets/main_resources/vendor/jquery/jquery.min.js"></script>
                <script src="../../assets/main_resources/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>