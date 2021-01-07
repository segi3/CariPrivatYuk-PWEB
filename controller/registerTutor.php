<?php session_start();

    require_once('../db-connection.php');

    $fields = ['name_tutor', 'address_tutor', 'email_tutor', 'password_tutor'];

    $fullname = $_POST['name_tutor'];
    $address = $_POST['address_tutor'];
    $email = $_POST['email_tutor'];
    $password = md5($_POST['password_tutor']);
    $ktp_path = 'ktp';
    $foto_path = 'foto';

    $inputs = [
        'fullname'      => $fullname,
        'address'       => $address,
        'email'         => $email,
        'password_raw'  => $_POST['password_tutor'],
        'password'      => $password
    ];

    $isFileExist = true;
    if ($_FILES['BerkasKTP']['name']){
        echo($_FILES['BerkasKTP']['name']);
        echo '<br>t';
    }else{
        $isFileExist = false;
    }
    if ($_FILES['foto']['name']){
        echo($_FILES['foto']['name']);
        echo '<br>t';
    }else{
        $isFileExist = false;
    }

    if(validateInput($fields, $inputs) && $isFileExist) {

        $base_path = "C:\\xampp\\htdocs\\CariPrivatYuk-PWEB\\berkas\\";

        $ktpInfo = pathinfo($_FILES['BerkasKTP']['name']);
        // $ktpName = $ktpInfo['filename'];
        $ktpName = 'ktp-'.$email;
        $ktpExt = $ktpInfo['extension'];
        $ktpSave = $ktpName . '.' . $ktpExt;
        $ktpTarget = $base_path . 'ktp_tutor\\' . $ktpName . '.' . $ktpExt;

        $fotoInfo = pathinfo($_FILES['foto']['name']);
        // $fotoName = $fotoInfo['filename'];
        $fotoName = 'foto-'.$email;
        $fotoExt = $fotoInfo['extension'];
        $fotoSave = $fotoName . '.' . $fotoExt;
        $fotoTarget = $base_path . 'foto_tutor\\' . $fotoName . '.' . $fotoExt;

        // ! ocv!
        move_uploaded_file($_FILES['foto']['tmp_name'], $fotoTarget);
        $command = 'python ocv-fp.py ' . $fotoSave;
        echo($fotoSave);echo  '<br>';
        $output = shell_exec($command);
        echo($output);
        // die();
        if($output<1) {
            unlink($fotoTarget);
            $err = [];
            array_push($err, 'Tidak ada muka ditemukan');
            $_SESSION['error'] = $err;

            header('Location: http://localhost/CariPrivatYuk-PWEB/register/tutor/index.php');

            exit();
        }

        $con = open_connection();

        $query_register = "
            INSERT INTO tutors (fullname, address, email, password, path_ktp, path_foto) VALUE ('$fullname','$address','$email','$password','$ktpSave','$fotoSave');
        ";

        if ($con->query($query_register)) {
            move_uploaded_file($_FILES['BerkasKTP']['tmp_name'], $ktpTarget);

            close_connection($con);

            $_SESSION['success'] = 'Berhasil register tutor';

            header('Location: http://localhost/CariPrivatYuk-PWEB/login/tutor/index.php');

        }else{
            close_connection($con);
            $err = [];
            array_push($err, 'Gagal Input Data');
            $_SESSION['error'] = $err;

            header('Location: http://localhost/CariPrivatYuk-PWEB/register/tutor/index.php');

            exit();
        }
    }else {
        $err = [];
        array_push($err, 'Gagal Validasi Data');
        // $err[0] = 'Gagal Validasi Data';
        $_SESSION['error'] = $err;

        header('Location: http://localhost/CariPrivatYuk-PWEB/register/tutor/index.php');

        exit();
    }




    // ! validasi

    function validateInput($fields, $inputs) {
        $pass= true;

        // * required
        if (validateRequired($fields)) {
            array_push($err, 'Semua field harus diisi');
            
            $pass = false;
        }

        // * duplicate
        if (dupEmail($inputs['email'])) {
            array_push($err, 'Email sudah dipakai');
            
            $pass = false;
        }

        // * string length
        if (validateStrLen('fullname', $inputs['fullname'], 1, 255) ||
            validateStrLen('address', $inputs['address'], 1, 255) ||
            validateStrLen('email', $inputs['email'], 1, 255) ||
            validateStrLen('password', $inputs['password_raw'], 8, 255)) {
            $pass = false;
        }

        // pass semua validasi
        return $pass;
    }

    function validateRequired($fields) {

        $error = false;

        foreach($fields as $field) {
            if (empty($_POST[$field])) {
                $error = true;
            }
        }

        return $error;
    }

    function dupEmail($email) {
        $con = open_connection();

        $query = "
            SELECT * FROM tutors WHERE email='". $email ."';
        ";

        $data = $con->query($query);

        close_connection($con);

        if ($data->num_rows) {
            return true;
        }else{
            return false;
        }
    }

    function validateStrLen($field, $str, $min, $max) {

        $error = false;

        $len = strlen($str);

        if ($len < $min) {
            array_push($err, "field " . $field . " terlalu pendek, minimal " . $min . " karakter");
            $error = true;
        }

        if ($len > $max) {
            array_push($err, "field " . $field . " terlalu panjang, maksimal " . $max . " karakter");
            $error = true;
        }

        return $error;

    }

?>