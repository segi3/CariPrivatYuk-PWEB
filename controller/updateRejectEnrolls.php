<?php session_start();

    require_once('../db-connection.php');

    $con = open_connection();
    $id_enrolls=$_GET['id'];
    $query_insert = "
        update private_enrolls set approval_status=0 where id=$id_enrolls;
    ";
    $select = "
        select T.id as tutor_id
        FROM private_enrolls E
        INNER JOIN privates P on P.id=E.private_id
        INNER JOIN tutors T on T.id= P.tutor_id
        where E.id=$id_enrolls LIMIT 1;
    ";
    // print_r($select);die();
    $data=$con->query($select);
    if($data->num_rows>0){
        $raw=$data->fetch_assoc();
        if($raw['tutor_id']===$_SESSION['tutor_id']){
            if ($con->query($query_insert)) {
                close_connection($con);
        
                $_SESSION['success'] = 'Berhasil mengubah data enrollment';
        
                header('Location: http://localhost/CariPrivatYuk-PWEB/tutor/dashboard/privat-request/');
        
                
        
            }else{
                close_connection($con);
        
                array_push($array_error, 'Gagal Update Data');
                $_SESSION['error'] = $array_error;
        
                header('Location: http://localhost/CariPrivatYuk-PWEB/tutor/dashboard/privat-request/');
        
                exit();
            }
        }else{
            close_connection($con);
        
            array_push($array_error, 'Anda tidak berhak mengubah data ini');
            $_SESSION['error'] = $array_error;
    
            header('Location: http://localhost/CariPrivatYuk-PWEB/tutor/dashboard/privat-request/');
    
            exit();
        }

    }

    

?>