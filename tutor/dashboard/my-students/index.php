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

    <script src="https://use.fontawesome.com/5f8983e405.js"></script>
    <link href="../../../assets/dashboard_resources/css/sb-admin-2.min.css" rel="stylesheet">

    <link href="../../../assets/dashboard_resources/css/style.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
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
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $con = open_connection();
                                                $query = "
                                                SELECT P.tutor_id AS id_tutor, E.total_hours AS total_jam,E.hours_done AS progress_jam, E.approval_status AS persetujuan,
                                                       U.fullname AS nama_user, E.completion_status as complete,
                                                       P.title AS judul_privat, E.id as enroll_id, E.pelaksanaan_online as online,
                                                       E.pelaksanaan_offline as offline
                                                FROM private_enrolls E
                                                INNER JOIN users U ON U.id=E.user_id
                                                INNER JOIN privates P ON P.id=E.private_id
                                                WHERE E.approval_status=1 AND E.payment_status=1 AND E.completion_status=2 AND P.tutor_id=".$_SESSION['tutor_id'].";
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
                                                <td><?php echo $raw_data['judul_privat']?></td>
                                                <td><?php echo $raw_data['total_jam']?></td>
                                                <td><?php echo $raw_data['progress_jam']?></td>
                                                <td>

                                                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                                                        data-target="#jadwalModal-<?php echo $raw_data['enroll_id']?>">Buat
                                                        Jawdal</a>
                                                    <!-- Modal -->
                                                    <div class="modal fade"
                                                        id="jadwalModal-<?php echo $raw_data['enroll_id']?>"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <form method="POST"
                                                                action="/CariPrivatYuk-PWEB/controller/createJadwal.php"
                                                                enctype="multipart/form-data">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Buat Jadwal
                                                                            <?php echo $raw_data['judul_privat']." ".$raw_data['nama_user']?>
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <input type="hidden" name="enroll_id"
                                                                            value="<?php echo $raw_data['enroll_id']?>">
                                                                        <div class="row">
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label for="inputHari">Hari</label>
                                                                                    <input name="jadwal_hari"
                                                                                        id="inputHari" type="text"
                                                                                        class="form-control single-input form-control datepicker"
                                                                                        aria-describedby="datepickerHelp">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label for="inputJam">Jam</label>
                                                                                    <input class="form-control"
                                                                                        type="time" name="jadwal_jam"
                                                                                        id="inputJam">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        for="exampleInputEmail5">Durasi
                                                                                        (jam)</label>
                                                                                    <input type="number"
                                                                                        name="jadwal_durasi"
                                                                                        class="form-control"
                                                                                        id="inputDurasi"
                                                                                        placeholder="Durasi">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        for="inputLokasi">Lokasi</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="inputLokasi"
                                                                                        name="jadwal_lokasi"
                                                                                        aria-describedby="lokasiHelp"
                                                                                        placeholder="Lokasi Pertemuan/Link Meeting">
                                                                                    <small
                                                                                        class="form-text text-muted">Online
                                                                                        hanya
                                                                                        tulis link meeting</small>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label for="descInput">Jenis
                                                                                        Pelaksanaan
                                                                                        Privat</label>
                                                                                    <div class="form-control">
                                                                                        <div
                                                                                            class="form-check form-check-inline">
                                                                                            <input
                                                                                                <?php if(!$raw_data['offline'])echo "disabled"; ?>
                                                                                                name="checkboxPelaksanaan[offline]"
                                                                                                class="form-check-input"
                                                                                                type="checkbox"
                                                                                                id="inlineCheckbox1"
                                                                                                value="1">
                                                                                            <label
                                                                                                class="form-check-label"
                                                                                                for="inlineCheckbox1">Offline</label>
                                                                                        </div>
                                                                                        <div
                                                                                            class="form-check form-check-inline">
                                                                                            <input
                                                                                                <?php if(!$raw_data['online'])echo "disabled"; ?>
                                                                                                name="checkboxPelaksanaan[online]"
                                                                                                class="form-check-input"
                                                                                                type="checkbox"
                                                                                                id="inlineCheckbox2"
                                                                                                value="1">
                                                                                            <label
                                                                                                class="form-check-label"
                                                                                                for="inlineCheckbox2">Online</label>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Save
                                                                            changes</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- End of Modal  -->

                                                </td>
                                            </tr>
                                            <?php
                                                    }
                                                }
                                                close_connection($con);

                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="d-sm-flex align-items-center justify-content-between my-4">
                        <h1 class="h3 mb-0 text-gray-800">Jadwal</h1>
                    </div>
                    <?php
                        $con=open_connection();
                        $query2 = "
                                SELECT S.id as jadwal_id, S.tanggal as jadwal_hari,S.jam as jadwal_jam,
                                       S.durasi as jadwal_durasi, S.lokasi as jadwal_lokasi,
                                       S.online as online,S.offline as offline, E.pelaksanaan_online as e_online,
                                       E.pelaksanaan_offline as e_offline,
                                       U.fullname as user_nama,P.title as privat_judul
                                FROM schedules S
                                INNER JOIN private_enrolls E ON S.enroll_id=E.id
                                INNER JOIN users U ON E.user_id=U.id
                                INNER JOIN privates P ON E.private_id = P.id
                                WHERE E.approval_status=1 AND E.payment_status=1 AND E.completion_status=2 AND P.tutor_id=".$_SESSION['tutor_id']."
                                ";
                        // print_r($query2);die();
                            
                        try {
                            $data = $con->query($query2);
                        }catch (Exception $e){
                            echo "Gagal mendapatkan data permintaan privat, " . $con->error;
                        }
                        

                    ?>


                    <div class="containerrow">
                        <div class="col-lg-12 card shadow">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Privat</th>
                                                <th>Waktu</th>
                                                <th>Durasi</th>
                                                <th>Lokasi</th>
                                                <th>Action</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if($data->num_rows>0){
                                                    while($jadwal=$data->fetch_assoc()){
                                            ?>
                                            <tr>
                                                <td><?php echo $jadwal['user_nama']?></td>
                                                <td><?php echo $jadwal['privat_judul']?></td>
                                                <td><?php echo $jadwal['jadwal_hari']?> <span
                                                        class="badge badge-dark"><?php echo $jadwal['jadwal_jam']?>
                                                        WIB</span></td>
                                                <td><?php echo $jadwal['jadwal_durasi']." jam"?></td>
                                                <td>
                                                    <?php
                                                        if($jadwal['offline']){
                                                            echo "<p>".$jadwal['jadwal_lokasi']."</p>";
                                                        }else{
                                                            echo "<a href=".$jadwal['jadwal_lokasi'].">Link Meet</a>";
                                                            echo "<br><a href=".$jadwal['jadwal_lokasi']."><small>".$jadwal['jadwal_lokasi']."</small></a>";
                                                        }
                                                    ?>
                                                </td>

                                                <td>
                                                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                                                        data-target="#jadwalModal2-<?php echo $jadwal['jadwal_id']?>">Edit</a>
                                                    <!-- Modal -->
                                                    <div class="modal fade"
                                                        id="jadwalModal2-<?php echo $jadwal['jadwal_id']?>"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <form method="POST"
                                                                action="/CariPrivatYuk-PWEB/controller/editJadwal.php"
                                                                enctype="multipart/form-data">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Edit Jadwal
                                                                            <?php echo $jadwal['privat_judul']." ".$jadwal['user_nama']?>
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <input type="hidden" name="jadwal_id"
                                                                            value="<?php echo $jadwal['jadwal_id']?>">
                                                                        <div class="row">
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label for="inputHari">Hari</label>
                                                                                    <input name="jadwal_hari"
                                                                                        id="inputHari" type="text"
                                                                                        class="form-control single-input form-control datepicker"
                                                                                        aria-describedby="datepickerHelp" value="<?php echo $jadwal['jadwal_hari']?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label for="inputJam">Jam</label>
                                                                                    <input class="form-control"
                                                                                        type="time" name="jadwal_jam"
                                                                                        id="inputJam" value="<?php echo $jadwal['jadwal_jam']?>">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        for="exampleInputEmail5">Durasi
                                                                                        (jam)</label>
                                                                                    <input type="number"
                                                                                        name="jadwal_durasi"
                                                                                        class="form-control"
                                                                                        id="inputDurasi"
                                                                                        placeholder="Durasi" value="<?php echo $jadwal['jadwal_durasi']?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        for="inputLokasi">Lokasi</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="inputLokasi"
                                                                                        name="jadwal_lokasi" value="<?php echo $jadwal['jadwal_lokasi']?>"
                                                                                        aria-describedby="lokasiHelp"
                                                                                        placeholder="Lokasi Pertemuan/Link Meeting">
                                                                                    <small
                                                                                        class="form-text text-muted">Online
                                                                                        hanya
                                                                                        tulis link meeting</small>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label for="descInput">Jenis
                                                                                        Pelaksanaan
                                                                                        Privat</label>
                                                                                    <div class="form-control">
                                                                                        <div
                                                                                            class="form-check form-check-inline">
                                                                                            <input
                                                                                                <?php if(!$jadwal['e_offline'])echo "disabled "; ?>
                                                                                                <?php if($jadwal['offline'])echo "checked ";?>
                                                                                                name="checkboxPelaksanaan[offline]"
                                                                                                class="form-check-input"
                                                                                                type="checkbox"
                                                                                                id="inlineCheckbox1"
                                                                                                value="1">
                                                                                            <label
                                                                                                class="form-check-label"
                                                                                                for="inlineCheckbox1">Offline</label>
                                                                                        </div>
                                                                                        <div
                                                                                            class="form-check form-check-inline">
                                                                                            <input 
                                                                                                <?php if(!$jadwal['e_online'])echo "disabled "; ?> 
                                                                                                <?php if($jadwal['online'])echo "checked ";?>
                                                                                                name="checkboxPelaksanaan[online]"
                                                                                                class="form-check-input"
                                                                                                type="checkbox"
                                                                                                id="inlineCheckbox2"
                                                                                                value="1">
                                                                                            <label
                                                                                                class="form-check-label"
                                                                                                for="inlineCheckbox2">Online</label>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Save
                                                                            changes</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- End of Modal  -->

                                                </td>
                                                <td>
                                                    <p>Menunggu Konfirmasi</p>

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
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
    $(function () {
        $(".datepicker").datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true,
        });
    });
</script>