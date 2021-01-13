<?php session_start();

    $head_redirect = "/CariPrivatYuk-PWEB/login/user";
    if(isset($_SESSION['role'])){
        if(strcmp($_SESSION['role'],'user')!=0){
            
            header($head_redirect);
        }
    }
    else{
        header("location: ".$head_redirect);
    }

    require_once('../db-connection.php');

    $tanggal = $_POST['tanggal_pembelian'];
    $judul = $_POST['judul_privat'];
    $enroll_id = $_POST['id_enroll'];

    $base_path = "..\\berkas\\bukti_pembayaran\\";

    $buktiInfo = pathinfo($_FILES['bukti_bayar']['name']);
    $buktiName = str_replace(" ", "-", $_SESSION['name'] . '-' . $tanggal . '-' . $judul);
    $buktiExt = $buktiInfo['extension'];
    $buktiSave = $buktiName . '.' . $buktiExt;
    $buktiTarget = $base_path . $buktiName . '.' . $buktiExt;

    move_uploaded_file($_FILES['bukti_bayar']['tmp_name'], $buktiTarget);

    $query_update = "
        UPDATE private_enrolls SET bukti_pembayaran='".$buktiSave."'
        WHERE id=".$enroll_id.";
    ";

    $con = open_connection();

    if ($con->query($query_update)) {
        close_connection($con);

        $_SESSION['success'] = 'Berhasil upload bukti pembayaran';

        header('Location: http://localhost/CariPrivatYuk-PWEB/user/my-transaction/');

        exit();
    }else {
        close_connection($con);

        $err = [];
        array_push($err, 'Gagal Input Data');
        $_SESSION['error'] = $err;

        header('Location: http://localhost/CariPrivatYuk-PWEB/user/my-transaction/');

        exit();
    }
?>