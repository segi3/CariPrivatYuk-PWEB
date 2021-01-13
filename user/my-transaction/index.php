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
    
    <div class="pt-5" style="background-color: #F3F3F3; height: 1000px;">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 mt-5">
                <h3 class="kursus-body-header mb-4">Transaksi Reservasi Privat</h3>
                <div class="card border-0 px-3">
                    <div class="card-body">
                        <div class="row mt-2">
                            <div class="col-12 row">
                                <table style="width:100%" class="table table-striped">
                                    <tr>
                                        <th>Invoice</th>
                                        <th>Kursus</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                        <th>Harga</th>
                                        <th>Status Pembayaran</th>
                                    </tr>
                                    <tr>
                                        <td>PVT/CT1/U2/4</td>
                                        <td>Mahir recorder dengan cepat!</td>
                                        <td>14 Nov 2020</td>
                                        <td>10</td>
                                        <td>Rp 179.000</td>
                                        <td><span class="badge badge-warning">Unpaid</span></td>
                                    </tr>
                                    <tr>
                                        <td>PVT/CT1/U2/4</td>
                                        <td>Bahasa Jepang</td>
                                        <td>16 Nov 2020</td>
                                        <td>10</td>
                                        <td>Rp 179.000</td>
                                        <td><span class="badge badge-success">Paid</span></td>
                                    </tr>
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
