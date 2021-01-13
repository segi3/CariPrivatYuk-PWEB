<?php session_start();

    require_once('../db-connection.php');
    
    $array_error = array();
    
    $tutor_id = $_SESSION['tutor_id'];
    $id = $_GET['id'];

    
    $con=open_connection();        
    $delete_deleted2 = "
        DELETE FROM schedules WHERE id=".$id.";
    ";
    if($con->query($delete_deleted2)){
        
        close_connection($con);

        $_SESSION['success'] = 'Berhasil menghapus jadwal';

        header('Location: http://localhost/CariPrivatYuk-PWEB/tutor/dashboard/my-students/');
        
        exit();

    }else{
        
        $con->query($backup_query);

        close_connection($con);

        array_push($array_error, 'Gagal Hapus Data');
        $_SESSION['error'] = $array_error;

        header('Location: http://localhost/CariPrivatYuk-PWEB/tutor/dashboard/my-students/');

        exit();

    }
?>