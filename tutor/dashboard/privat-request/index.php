<?php session_start(); ?>
<?php 
    $path = $_SERVER['DOCUMENT_ROOT'];
    $dbcon = $path."/CariPrivatYuk-PWEB/db-connection.php";
    include($dbcon);
    
    $head = "/CariPrivatYuk-PWEB/login/tutor";
    if(isset($_SESSION['role'])){
        if(strcmp($_SESSION['role'],'tutor')!=0){
            
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PrivatKu</title>


    <link href="../../../assets/dashboard_resources/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">


    <link href="../../../assets/dashboard_resources/css/sb-admin-2.min.css" rel="stylesheet">

    <link href="../../../assets/dashboard_resources/css/style.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>




</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- Sidebar -->
        <?php include($path.'/CariPrivatYuk-PWEB/partials/sidebars/side-tutor.php'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include($path.'/CariPrivatYuk-PWEB/partials/navbars/nav-tutor.php'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Permintaan Privat</h1>
                    </div>

                    <div class="containerrow">
                        <div class="col-lg-12 card shadow">
                            <div class="card-body">
                                <?php require($_SERVER['DOCUMENT_ROOT'].'/CariPrivatYuk-PWEB/partials/flash_messages/flash.php'); ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Privat</th>
                                                <th>Durasi</th>
                                                <th>Action</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $con = open_connection();
                                                $query = "
                                                SELECT P.tutor_id AS id_tutor, E.total_hours AS total_jam, E.approval_status AS persetujuan,
                                                       E.pelaksanaan_online AS online, E.pelaksanaan_offline AS offline,E.payment_status as pembayaran,
                                                       E.bukti_pembayaran AS bukti_bayar, U.fullname AS nama_user, E.total_hours*P.price_per_hour as harga,
                                                       U.email AS email_user, P.title AS judul_privat, E.id as id_enroll
                                                FROM private_enrolls E
                                                INNER JOIN users U ON U.id=E.user_id
                                                INNER JOIN privates P ON P.id=E.private_id
                                                WHERE (E.payment_status=2 OR E.approval_status=2) AND P.tutor_id=".$_SESSION['tutor_id'].";
                                                ";
                                                // print_r($query);die();

                                                try {
                                                    $data = $con->query($query);
                                                }catch (Exception $e){
                                                    echo "Gagal mendapatkan data permintaan privat, " . $con->error;
                                                }
                                                if($data->num_rows>0){
                                                    while($raw_data=$data->fetch_assoc()){
                                            ?>
                                            <tr>
                                                <td><?php echo $raw_data['nama_user']?></td>
                                                <td><?php echo $raw_data['email_user']?></td>
                                                <td><?php echo $raw_data['judul_privat']?></td>
                                                <td><?php echo $raw_data['total_jam']." Jam"?></td>
                                                <td>
                                                <?php
                                                    if($raw_data['persetujuan']==1){
                                                        if(!is_null($raw_data["bukti_bayar"])){
                                                ?>
                                                    <a href="<?php echo "/CariPrivatYuk-PWEB/controller/updateVerifyEnrolls.php?id=".$raw_data["id_enroll"];?>" class="btn btn-success btn-sm">Verify</a>
                                                    <a href="<?php echo "/CariPrivatYuk-PWEB/berkas/bukti_bayar/".$raw_data["bukti_bayar"];?>" class="btn btn-info btn-sm">Bukti Pembayaran</a>
                                                <?php   }else{ echo "Menunggu Pembayaran";}
                                                    }else{?>
                                                    <a href="<?php echo "/CariPrivatYuk-PWEB/controller/updateAproveEnrolls.php?id=".$raw_data["id_enroll"];?>" class="btn btn-success btn-sm">Terima</a>
                                                    <a href="<?php echo "/CariPrivatYuk-PWEB/controller/updateRejectEnrolls.php?id=".$raw_data["id_enroll"];?>" class="btn btn-danger btn-sm">Tolak</a>
                                                <?php }?>

                                                </td>

                                                <td>
                                                <?php
                                                    if($raw_data['persetujuan']==1){
                                                ?>
                                                    <p><?php echo "Total harga : Rp. ".$raw_data["harga"];?></p>
                                                <?php }else{?>
                                                    <p><?php echo "Total harga : Rp. ".$raw_data["harga"];?></p>
                                                <?php }?>

                                                </td>
                                                
                                            </tr>
                                            <?php
                                                    }
                                                }

                                            ?>
                                            
                                            <!-- <tr>
                                                <td>Nodas</td>
                                                <td>nodas@email.com</td>
                                                <td>Python Master Class</td>
                                                <td>12 jam</td>
                                                <td><a href="#" class="btn btn-success btn-sm">Terima</a><a href="#"
                                                        class="btn btn-danger btn-sm">Tolak</a></td>
                                            </tr>
                                            <tr>
                                                <td>Kinas</td>
                                                <td>meow@email.com</td>
                                                <td>Python Master Class</td>
                                                <td>10 jam</td>
                                                <td><a href="#" class="btn btn-success btn-sm">Terima</a><a href="#"
                                                        class="btn btn-danger btn-sm">Tolak</a></td>
                                            </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; CariPrivatYuk 2021</span>
                    </div>
                </div>
            </footer> <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="../../../assets/dashboard_resources/vendor/jquery/jquery.min.js"></script>
    <script src="../../../assets/dashboard_resources/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../../assets/dashboard_resources/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../../assets/dashboard_resources/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../../assets/dashboard_resources/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../../assets/dashboard_resources/js/demo/chart-area-demo.js"></script>
    <script src="../../../assets/dashboard_resources/js/demo/chart-pie-demo.js"></script>



</body>

</html>