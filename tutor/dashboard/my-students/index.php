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

    <title>Murid Privat</title>


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
                        <h1 class="h3 mb-0 text-gray-800">Murid Privat</h1>
                    </div>

                    <div class="containerrow">
                        <div class="col-lg-12 card shadow">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Privat</th>
                                                <th>Jam Total</th>
                                                <th>Jam Terlaksana</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Abdur Rohman</td>
                                                <td>Python Master Class</td>
                                                <td>6</td>
                                                <td>4</td>
                                            </tr>
                                            <tr>
                                                <td>M Frediansyah</td>
                                                <td>Fotografi Bagi Pemula</td>
                                                <td>12</td>
                                                <td>3</td>
                                            </tr>
                                            <tr>
                                                <td>Rafi Yudhistira</td>
                                                <td>Fotografi Bagi Pemula</td>
                                                <td>15</td>
                                                <td>10</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="d-sm-flex align-items-center justify-content-between my-4">
                        <h1 class="h3 mb-0 text-gray-800">Jadwal</h1>
                        <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                            data-toggle="modal" data-target="#jadwalModal">
                            Buat Jadwal
                        </button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="jadwalModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Buat Jadwal</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect2">Pilih Privat</label>
                                            <select class="form-control" id="exampleFormControlSelect2">
                                                <option selected="selected">Fotografi Bagi Pemula</option>
                                                <option>Python Master Class</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect3">Pilih Murid</label>
                                            <select class="form-control" id="exampleFormControlSelect3">
                                                <option>M Frediansyah</option>
                                                <option>Rafi Yudhistira</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect4">Pilih Subjek</label>
                                            <select class="form-control" id="exampleFormControlSelect4">
                                                <option>Komposisi cahaya</option>
                                                <option>Komposisi foto</option>
                                                <option>Foto Makro</option>
                                                <option>Foto Landscape</option>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Waktu</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail5">Durasi (jam)</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail5"
                                                        aria-describedby="emailHelp" placeholder="durasi">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-check">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="exampleRadios" id="exampleRadios1" value="option1"
                                                            checked>
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            Online
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="exampleRadios" id="exampleRadios2" value="option2">
                                                        <label class="form-check-label" for="exampleRadios2">
                                                            Offline
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail6">Lokasi</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail6"
                                                        aria-describedby="emailHelp" placeholder="lokasi">
                                                    <small id="emailHelp" class="form-text text-muted">Online hanya
                                                        tulis link meeting</small>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="containerrow">
                        <div class="col-lg-12 card shadow">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Privat</th>
                                                <th>Subjek</th>
                                                <th>Waktu</th>
                                                <th>Durasi</th>
                                                <th>Lokasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Rafi Yudhistira</td>
                                                <td>Fotografi Bagi Pemula</td>
                                                <td>Komposisi foto</td>
                                                <td>20 Nov 2020 <span class="badge badge-dark">19.00 WIB</span></td>
                                                <td>2 Jam</td>
                                                <td>Rumah Murid</td>
                                            </tr>
                                            <tr>
                                                <td>Rafi Yudhistira</td>
                                                <td>Fotografi Bagi Pemula</td>
                                                <td>Komposisi foto</td>
                                                <td>18 Nov 2020 <span class="badge badge-dark">19.00 WIB</span></td>
                                                <td>2 Jam</td>
                                                <td>Rumah Murid</td>
                                            </tr>
                                            <tr>
                                                <td>Rafi Yudhistira</td>
                                                <td>Fotografi Bagi Pemula</td>
                                                <td>Komposisi foto</td>
                                                <td>14 Nov 2020 <span class="badge badge-dark">19.00 WIB</span></td>
                                                <td>2 Jam</td>
                                                <td>Rumah Murid</td>
                                            </tr>
                                            <tr>
                                                <td>Abdur Rohman</td>
                                                <td>Python Master Class</td>
                                                <td>Komposisi foto</td>
                                                <td>14 Nov 2020 <span class="badge badge-dark">08.00 WIB</span></td>
                                                <td>2 Jam</td>
                                                <td><a href="">Zoom</a></td>
                                            </tr>
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