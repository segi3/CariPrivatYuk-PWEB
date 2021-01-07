<?php session_start();

    require_once('../db-connection.php');

    $fields = ['name_user', 'address_user', 'email_user', 'password_user'];

    $fullname = $_POST['name_user'];
    $address = $_POST['address_user'];
    $email = $_POST['email_user'];
    $password = md5($_POST['password_user']);

    $inputs = [
        'fullname'      => $fullname,
        'address'       => $address,
        'email'         => $email,
        'password_raw'  => $_POST['password_user'],
        'password'      => $password,
    ];

    $err = [];

    if (validateInput($fields, $inputs)) {
        $con = open_connection();

        $query_register = "
            INSERT INTO users (fullname, address, email, password) VALUE ('$fullname','$address','$email','$password');
        ";
    
        if ($con->query($query_register)) {
            close_connection($con);

            $_SESSION['success'] = 'Berhasil register user';

            header('Location: http://localhost/CariPrivatYuk-PWEB/login/user/index.php');

            
    
        }else{
            close_connection($con);

            array_push($err, 'Gagal Input Data');
            $_SESSION['error'] = $err;

            header('Location: http://localhost/CariPrivatYuk-PWEB/register/user/index.php');

            exit();
        }
    }else {
        array_push($err, 'Gagal Validasi Data');
        $_SESSION['error'] = $err;

        header('Location: http://localhost/CariPrivatYuk-PWEB/register/user/index.php');

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
            SELECT * FROM users WHERE email='". $email ."';
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