<?php session_start();

    require_once('../db-connection.php');

    
    $method = $_['metodologi_privat'];
    $jenis= $_POST['checkboxPelaksanaan'];
    $pelaksanaan_online=0;
    $pelaksanaan_offline=0;
    $id_privat=$_POST['id_privat'];
    if(isset($jenis['online'])){
        if($jenis['online']==1){
            $pelaksanaan_online=1;
        }
    }
    if(isset($jenis['offline'])){
        if($jenis['offline']==1){
            $pelaksanaan_offline=1;
        }
    }
    $inputs = [
        'title'                 => $title,
        'category_id'           => $category_id,
        'tutor_id'              => $tutor_id,
        'price_per_hour'        => $price_per_hour,
        'method'                => $method,
        'pelaksanaan_offline'       => $pelaksanaan_offline,
        'pelaksanaan_online'    => $pelaksanaan_online,
    ];

    $array_error = array();

    if (validateInput($fields,$checkboxs, $inputs,$array_error)) {
        $con = open_connection();

        $query_insert = "
            update privates set title='$title', category_id='$category_id', price_per_hour='$price_per_hour' ,method='$method' ,pelaksanaan_offline=$pelaksanaan_offline,pelaksanaan_online=$pelaksanaan_online where id=$id_privat;
        ";
    
        if ($con->query($query_insert)) {
            close_connection($con);

            $_SESSION['success'] = 'Berhasil mengubah data privat';

            header('Location: http://localhost/CariPrivatYuk-PWEB/tutor/dashboard/my-privat/');

            
    
        }else{
            close_connection($con);

            array_push($array_error, 'Gagal Update Data');
            $_SESSION['error'] = $array_error;

            header('Location: http://localhost/CariPrivatYuk-PWEB/tutor/dashboard/my-privat/');

            exit();
        }
    }else {
        array_push($array_error, 'Gagal Validasi Data');
        print_r($array_error);
        // die();
        $_SESSION['error'] = $array_error;

        header('Location: http://localhost/CariPrivatYuk-PWEB/tutor/dashboard/my-privat/');

        exit();
    }
    


    // ! validasi

    
?>