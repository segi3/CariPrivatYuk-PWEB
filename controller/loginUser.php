<?php session_start();

    require_once('../db-connection.php');

    $con = open_connection();

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query = "
        SELECT * FROM users WHERE email='".$email."' AND password='".$password."';
    ";

    $data = $con->query($query);

    // print_r($data);die();

    if($data->num_rows > 0) {

        $row = $data->fetch_assoc();

        $_SESSION['login'] = true;
        $_SESSION['role'] = 'user';
        $_SESSION['name'] = $row['fullname'];
        $_SESSION['user_id'] = $row['id'];

        close_connection($con);

        header('Location:  http://localhost/CariPrivatYuk-PWEB/');
    }else {
        $err = [];
        $err[0] = 'Gagal Login';
        $_SESSION['error'] = $err;

        header('Location: http://localhost/CariPrivatYuk-PWEB/login/user/');
        exit();
    }
?>