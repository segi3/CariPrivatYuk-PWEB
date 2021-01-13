<?php session_start();

    require_once('../db-connection.php');

    $fields = ['durasi_privat','checkboxPelaksanaan'];
    $checkboxs = ['checkboxPelaksanaan[offline]','checkboxPelaksanaan[online]'];
    $user_id = $_SESSION['user_id'];
    $private_id = $_POST['id_privat'];
    $total_hours=$_POST['durasi_privat'];
    $jenis= $_POST['checkboxPelaksanaan'];
    $pelaksanaan_online=0;
    $pelaksanaan_offline=0;
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
        'user_id'                 => $user_id,
        'private_id'           => $private_id,
        'total_hours'        => $total_hours,
        'hours_done'        => 0,
        'pelaksanaan_offline'       => $pelaksanaan_offline,
        'pelaksanaan_online'    => $pelaksanaan_online,
    ];

    $array_error = array();

    if (validateInput($fields,$checkboxs, $inputs,$array_error)) {
        $con = open_connection();

        $query_insert = "
            INSERT INTO private_enrolls (user_id, private_id, tanggal_pembelian, total_hours, hours_done,pelaksanaan_offline,pelaksanaan_online,approval_status,payment_status,completion_status) 
            VALUE ('$user_id','$private_id', CURDATE(),'$total_hours','0',$pelaksanaan_offline,$pelaksanaan_online,'2','2','2');
        ";
        // print_r($query_insert);die();
    
        if ($con->query($query_insert)) {
            close_connection($con);

            $_SESSION['success'] = 'Berhasil mengajukan permintaan';
            $param = $private_id;
            header("Location: http://localhost/CariPrivatYuk-PWEB/privat/?id=".$param."#alert");

            
    
        }else{
            close_connection($con);

            array_push($array_error, 'Gagal Input Data');
            $_SESSION['error'] = $array_error;

            $param = $private_id;
            header("Location: http://localhost/CariPrivatYuk-PWEB/privat/?id=".$param."#alert");

            exit();
        }
    }else {
        array_push($array_error, 'Gagal Validasi Data');
        print_r($array_error);
        // die();
        $_SESSION['error'] = $array_error;

        $param = $private_id;
        header("Location: http://localhost/CariPrivatYuk-PWEB/privat/?id=".$param."#alert");
        exit();
    }
    


    // ! validasi

    function validateInput($fields,$checkbox ,$inputs,$array_error) {
        $pass= true;

        // * required
        if (validateRequired($fields)) {
            array_push($array_error, "Semua field harus diisi") ;
            $pass = false;
        }
        
        

        if(validateNumber('durasi_privat',$array_error)){
            array_push($array_error, 'Durasi harus berupa numerik');
            $pass = false;
        }

        // pass semua validasi
        return $pass;
    }

    function validateRequired($fields) {

        $status = false;

        foreach($fields as $field) {
            if (empty($_POST[$field])) {
                $status = true;
            }
        }

        return $status;
    }
   
    function validateStrLen($field, $str, $min, $max,$array_error) {

        $isError = false;

        $len = strlen($str);

        if ($len < $min) {
            array_push($array_error, "field " . $field . " terlalu pendek, minimal " . $min . " karakter");
            $isError = true;
        }

        if ($len > $max) {
            array_push($array_error, "field " . $field . " terlalu panjang, maksimal " . $max . " karakter");
            $isError = true;
        }

        return $isError;

    }

    function validateNumber($field,$array_error) {

        $isError = false;
        if (!is_numeric($_POST[$field])) {
            array_push($array_error, "field " . $field . " bukan angka numeric");
            $isError = true;
        }
        if ($_POST[$field]<1) {
            array_push($array_error, "field " . $field . " minimal 1");
            $isError = true;
        }

        return $isError;

    }

?>