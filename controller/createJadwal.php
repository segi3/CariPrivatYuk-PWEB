<?php session_start();

    $head_redirect = "/CariPrivatYuk-PWEB/login/tutor";
    if(isset($_SESSION['role'])){
        if(strcmp($_SESSION['role'],'tutor')!=0){
            
            header($head_redirect);
        }
    }
    else{
        header("location: ".$head_redirect);
    }

    require_once('../db-connection.php');

    $fields = ['enroll_id','jadwal_hari','jadwal_jam','jadwal_durasi','jadwal_lokasi','checkboxPelaksanaan'];
    $checkboxs = ['checkboxPelaksanaan[offline]','checkboxPelaksanaan[online]'];
    $enroll_id=$_POST['enroll_id'];
    $hari=$_POST['jadwal_hari'];
    $jam=$_POST['jadwal_jam'];
    $durasi=$_POST['jadwal_durasi'];
    $lokasi=$_POST['jadwal_lokasi'];
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
        'enroll_id'             => $enroll_id,
        'tanggal'               => $hari,
        'jam'                   => $jam,
        'lokasi'                => $lokasi,
        'durasi'                => $durasi,
        'offline'               => $pelaksanaan_offline,
        'online'                => $pelaksanaan_online,
    ];
    

    $array_error = array();

    if (validateInput($fields,$checkboxs, $inputs,$array_error)) {
        $con = open_connection();

        $query_insert = "
            INSERT INTO schedules (enroll_id, tanggal, jam, lokasi, durasi,offline,online,status_persetujuan) 
            VALUE ('$enroll_id','$hari','$jam','$lokasi','$durasi',$pelaksanaan_offline,$pelaksanaan_online,0);
        ";
        // print_r($query_insert);die();
        

        // ! update hours done

        $query_update = "
            UPDATE private_enrolls SET hours_done = hours_done + ".$durasi." WHERE id=".$enroll_id.";
        ";

        $con1 = open_connection();

        if($con1->query($query_update)) {
            close_connection($con1);

        }



        if ($con->query($query_insert)) {
            close_connection($con);

            $_SESSION['success'] = 'Berhasil mengajukan jadwal';
           
            header("Location: http://localhost/CariPrivatYuk-PWEB/tutor/dashboard/my-students/");

            
    
        }else{
            close_connection($con);

            array_push($array_error, 'Gagal Input Data');
            $_SESSION['error'] = $array_error;

            header("Location: http://localhost/CariPrivatYuk-PWEB/tutor/dashboard/my-students/");

            exit();
        }
    }else {
        array_push($array_error, 'Gagal Validasi Data');
        print_r($array_error);
        // die();
        $_SESSION['error'] = $array_error;

        header("Location: http://localhost/CariPrivatYuk-PWEB/tutor/dashboard/my-students/");
        exit();
    }
    

    function validateInput($fields,$checkbox ,$inputs,$array_error) {
        $pass= true;

        // * required
        if (validateRequired($fields)) {
            array_push($array_error, "Semua field harus diisi") ;
            $pass = false;
        }
        
        

        if(validateNumber('jadwal_durasi',$array_error)){
            array_push($array_error, 'Durasi harus berupa numerik');
            $pass = false;
        }


        // * string length
        if (validateStrLen('lokasi', $inputs['lokasi'], 1, 255,$array_error)) {
            array_push($array_error, 'Lokasi Tidak Boleh Kosong dan harus Kurang dari 255 Character');
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