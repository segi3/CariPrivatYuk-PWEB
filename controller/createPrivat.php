<?php session_start();

    require_once('../db-connection.php');

    $fields = ['judul_privat', 'kategori_privat', 'harga_privat', 'kategori_privat', 'metodologi_privat','checkboxPelaksanaan'];
    $checkboxs = ['checkboxPelaksanaan[offline]','checkboxPelaksanaan[online]'];
    $title = $_POST['judul_privat'];
    $category_id = $_POST['kategori_privat'];
    $tutor_id = $_SESSION['tutor_id'];
    $price_per_hour = $_POST['harga_privat'];
    $method = $_POST['metodologi_privat'];
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
            INSERT INTO privates (title, category_id, tutor_id, price_per_hour,method,pelaksanaan_offline,pelaksanaan_online) VALUE ('$title','$category_id','$tutor_id','$price_per_hour','$method',$pelaksanaan_offline,$pelaksanaan_online);
        ";
    
        if ($con->query($query_insert)) {
            close_connection($con);

            $_SESSION['success'] = 'Berhasil menambah privat';

            header('Location: http://localhost/CariPrivatYuk-PWEB/tutor/dashboard/create-privat/');

            
    
        }else{
            close_connection($con);

            array_push($array_error, 'Gagal Input Data');
            $_SESSION['error'] = $array_error;

            header('Location: http://localhost/CariPrivatYuk-PWEB/tutor/dashboard/create-privat/');

            exit();
        }
    }else {
        array_push($array_error, 'Gagal Validasi Data');
        print_r($array_error);
        // die();
        $_SESSION['error'] = $array_error;

        header('Location: http://localhost/CariPrivatYuk-PWEB/tutor/dashboard/create-privat/');

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
        

        // * string length
        if (validateStrLen('title', $inputs['title'], 1, 255,$array_error) ||
            validateStrLen('method', $inputs['method'], 1, 1024,$array_error) ) {
            array_push($array_error, 'Judul dan Metodologi Tidak Boleh Kosong');
            $pass = false;
        }

        if(validateNumber('harga_privat',$array_error)){
            array_push($array_error, 'Harga harus berupa numerik');
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

        return $isError;

    }

?>