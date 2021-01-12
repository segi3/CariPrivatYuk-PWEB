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

    <title>Privat Baru</title>


    <link href="../../../assets/dashboard_resources/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">


    <link href="../../../assets/dashboard_resources/css/sb-admin-2.min.css" rel="stylesheet">

    <link href="../../../assets/dashboard_resources/css/style.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        function add_subject() {
            var newnode = document.querySelector(".subjek-in").cloneNode(true);
            document.getElementById('subjContainer').appendChild(newnode);
        }
    </script>

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
                <?php
                    $con=open_connection();
                    // Get all categories title's and slug's
                    $query="SELECT title,slug,id From categories ORDER BY id ASC;";
                    try {
                        $categories = $con->query($query);
                    }catch (Exception $e){
                        echo "Gagal mendapatkan data categories : , " . $con->error."<br>";
                    }
                    
                    close_connection($con);
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="container d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Buat Privat Baru</h1>
                    </div>
                    <div class="container">
                        <?php require($path.'/CariPrivatYuk-PWEB/partials/flash_messages/flash.php'); ?>
                        <form method="POST" action="/CariPrivatYuk-PWEB/controller/createPrivat.php"
                            enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-12 card shadow ">
                                    <div class="card-body" style="height:80vh">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="judulInput">Judul Privat</label>
                                                    <input type="text" class="form-control" id="judulInput"
                                                        aria-describedby="judulHelp" placeholder="Judul"
                                                        name="judul_privat" required>
                                                    <small id="judulHelp" class="form-text text-muted">Judul dari
                                                        privat yang ditawarkan</small>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="hargaInput">Harga /jam</label>
                                                    <input type="text" class="form-control" id="hargaInput"
                                                        aria-describedby="hargaHelp" placeholder="0000.00"
                                                        name="harga_privat" required>
                                                    <small id="hargaHelp" class="form-text text-muted">Hanya Nominal
                                                        dalam rupiah</small>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="kategoriSelector">Kategori</label>
                                                    <select class="form-control" id="kategoriSelector"
                                                        name="kategori_privat">
                                                        <option value="" selected disabled hidden>Pilih Kategori</option>
                                                        <?php
                                                            
                                                            if (isset($categories)){
                                                                if ($categories->num_rows > 0) {
                                                                    // output data of each row
                                                                    while($row = $categories->fetch_assoc()) {
                                                                    echo "<option value=".$row["id"].">".$row["title"]."</option>";
                                                                    }
                                                                }
                                                            }
                                                        ?>
                                                    </select>
                                                    <small id="hargaHelp" class="form-text text-muted">Hanya Nominal
                                                        dalam rupiah</small>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="descInput">Jenis Pelaksanaan Privat</label>
                                                    <div class="form-control">
                                                        <div class="form-check form-check-inline">
                                                            <input name="checkboxPelaksanaan[offline]" class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1">
                                                            <label class="form-check-label" for="inlineCheckbox1">Offline</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input name="checkboxPelaksanaan[online]" class="form-check-input" type="checkbox" id="inlineCheckbox2" value="1">
                                                            <label class="form-check-label" for="inlineCheckbox2">Online</label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="descInput">Metodologi Privat</label>
                                                    <textarea class="form-control" id="descInput" rows="10"
                                                        name="metodologi_privat" required></textarea>
                                                    <small id="metodologiHelp" class="form-text text-muted">Metode pengajaran yang digunakan</small>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary my-3">Submit</button>
                        </form>
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