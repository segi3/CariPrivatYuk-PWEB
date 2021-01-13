<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/CariPrivatYuk-PWEB/db-connection.php";
$ROOT = $_SERVER['DOCUMENT_ROOT'];
include_once($path);
?>
<!-- Navigation -->
<nav id="navorange" class="navbar fixed-top navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/CariPrivatYuk-PWEB/"><span id="jd1">Cari</span><span
                    id="jd2">Privat</span><span id="jd3">Yuk!</span></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <!-- Form cari nama tutor -->
                <form class="form-inline my-2 my-lg-0" action="/CariPrivatYuk-PWEB/cari/?" method="GET">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                    <button class="btn btn-primary my-2 my-sm-0" type="submit">Cari</button>
                </form>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="/CariPrivatYuk-PWEB">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Privat
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                            <?php
                                $con=open_connection();
                                // Get all categories title's and slug's
                                $query="SELECT title,slug,id From categories ORDER BY id ASC;";
                                try {
                                    $categories = $con->query($query);
                                }catch (Exception $e){
                                    echo "Gagal mendapatkan data categories : , " . $con->error."<br>";
                                }
                                if (isset($categories)){
                                    if ($categories->num_rows > 0) {
                                        // output data of each row
                                        while($row = $categories->fetch_assoc()) {
                                          echo "<a class='dropdown-item' href='/CariPrivatYuk-PWEB/privat/kategori?slug=".$row["slug"]."'>".$row["title"]."</a>";
                                        }
                                    }
                                }
                                close_connection($con);
                            ?>
                        </div>
                    </li>
                    
                    <?php

                    if (isset($_SESSION['login']) && $_SESSION['login']==true) {
                        ?>
                        <li class="nav-item dropdown">
                            <!-- <a class="nav-link dropdown-toggle" href="user/" id="navbarDropdownPages" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Rafi Nizar A.
                            </a> -->
                            <a href="/CariPrivatYuk-PWEB/user" class="nav-link dropdown-toggle"
                                id="navbarDropdownBlog"><?php echo($_SESSION['name']); ?><span class="caret"></span></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPages">
                                <?php
                                if ($_SESSION['role'] == 'user'){
                                    ?>
                                    <a class="dropdown-item" href="/CariPrivatYuk-PWEB/user/my-privat">My Privat</a>    
                                    <a class="dropdown-item" href="/CariPrivatYuk-PWEB/user/my-transaction">My Transaction</a>
                                    <?php
                                }
                                if ($_SESSION['role'] == 'tutor'){
                                    ?>
                                    <a class="dropdown-item" href="/CariPrivatYuk-PWEB/tutor/dashboard">Dashboard</a>
                                    <?php
                                }
                                ?>
                                
                                <a class="dropdown-item" href="/CariPrivatYuk-PWEB/controller/logout.php">Logout</a>
                            </div>
                        </li>
                        <?php
                    }else {
                        ?>
                        <a href="/CariPrivatYuk-PWEB/login/user" class="btn btn-sm btn-success">Login</a>
                        <a href="/CariPrivatYuk-PWEB/register/user" class="btn btn-sm btn-primary">Register</a>
                        <?php
                    }

                    ?>
                </ul>
            </div>
        </div>
    </nav>