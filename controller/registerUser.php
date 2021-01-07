<?php

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

    if (validateInput($fields, $inputs)) {
        $con = open_connection();

        $query_register = "
            INSERT INTO users (fullname, address, email, password) VALUE ('$fullname','$address','$email','$password');
        ";
    
        if ($con->query($query_register)) {
            close_connection($con);
    
            echo "berhasil input admin baru";
    
            ?>
                <a href="/CariPrivatYuk-PWEB/register/user/index.php">kembali ke register</a>
            <?php
    
            header('Location: http://localhost/CariPrivatYuk-PWEB/login/user/index.php');
    
        }else{
            echo "Gagal input data";
    
            close_connection($con);
        }
    }else {
        echo "Gagal input data, silahkan cek kembali field menyesuaikan validasi";

        ?><a href="/CariPrivatYuk-PWEB/register/user/index.php">kembali ke register</a><?php
    }
    


    // ! validasi

    function validateInput($fields, $inputs) {
        $pass= true;

        // * required
        if (validateRequired($fields)) {
            echo "Semua field harus diisi";
            echo "<br>";
            
            $pass = false;
        }

        // * duplicate
        if (dupEmail($inputs['email'])) {
            echo "Field email dan username harus berisi nilai unik";
            echo "<br>";
            
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
            echo "field " . $field . " terlalu pendek, minimal " . $min . " karakter";
            echo "<br>";
            $error = true;
        }

        if ($len > $max) {
            echo "field " . $field . " terlalu panjang, maksimal " . $max . " karakter";
            echo "<br>";
            $error = true;
        }

        return $error;

    }

?>