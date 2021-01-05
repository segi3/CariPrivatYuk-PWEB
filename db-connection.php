<?php
// File php untuk mangatur koneksi ke database

// versi php
// phpinfo();

// Fungsi untuk mengecek dan membuat koneksi ke database
function open_connection() {
    // $con = new mysqli("localhost", "id15327665_root", "!qwertyQAZ9i03");
    $con = new mysqli("localhost", "root", "");
    if ($con->connect_errno) {
        printf("Database connection failed: %s\n", $con->connect_errno);
        exit();
    }

    if (!$con->select_db('pweb_fp')) {
        echo "Could not select database" . $con->error;
        if (!$con->query("CREATE DATABASE IF NOT EXISTS pweb_fp;")) {
            echo "Could not create database: " . $con->error."<br>";
        }else{
            echo "Database created<br>";
        }
        $con->select_db('pweb_fp');
    }
    return $con;
}
// Fungsi untuk menutup koneksi ke database
function close_connection(mysqli $con) {
    $con->close();
}

?>