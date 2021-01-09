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
                    <?php
                    $con=open_connection();
                    // Get all private and count their enroll
                    $query="SELECT id,title,category_id,price_per_hour,pelaksanaan_online,pelaksanaan_offline,method FROM privates;";
                    try {
                        $privates = $con->query($query);
                    }catch (Exception $e){
                        echo "Gagal mendapatkan data privates : , " . $con->error."<br>";
                    }
                   
                    close_connection($con);
                ?>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Privat Ku</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Buat Privat</a>
                    </div>

                    <div class="containerrow">
                        <div class="col-lg-12 card shadow">
                            <div class="card-body">
                                <div class="table-responsive">
                                <?php require($path.'/CariPrivatYuk-PWEB/partials/flash_messages/flash.php'); ?>
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Judul Kursus</th>
                                                <th>Harga /jam</th>
                                                <th>Peserta</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Judul Kursus</th>
                                                <th>Harga</th>
                                                <th>Peserta</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                                 if (isset($privates)){
                                                    if ($privates->num_rows > 0) {
                                                        // output data of each row
                                                        // print_r($privates);
                                                        // die();
                                                        while($row = $privates->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['title']?></td>
                                                <td><?php echo "Rp. ".$row['price_per_hour']?></td>
                                                <?php
                                                        $con=open_connection();
                                                        // Get count
                                                        $query="SELECT COUNT(*) as jumlah_murid FROM private_enrolls WHERE private_id=".$row['id'].";";
                                                        try {
                                                            $result = $con->query($query);
                                                        }catch (Exception $e){
                                                            echo "Gagal mendapatkan data privates : , " . $con->error."<br>";
                                                        }
                                                        $count= $result->fetch_assoc();
                                                        close_connection($con);
                                                ?>
                                                <td><?php echo $count['jumlah_murid']?></td>
                                                <td>
                                               
                                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                    <a href="<?php echo "/CariPrivatYuk-PWEB/controller/deletePrivat.php?id=".$row['id']?>" class="btn btn-primary btn-sm">Hapus</a>
                                                </td>
                                            </tr>
                                            <?php                
                                                        }
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