<?php

// File php untuk membuat skema database
include('db-connection.php');

$con = open_connection();

// Fungsi untuk menajalankan pembuatan table
function table_creation($table_name,$query,$con){

    if ($con->query($query) == TRUE) {
        echo "Table ". $table_name ." created<br>";
    }else {
        echo "Table ". $table_name ." not created: " . $con->error."<br>";
    }

}

// buat tabel biodata
$table_tutors = "
CREATE TABLE tutors (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    fullname VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    path_htp VARCHAR(255) NOT NULL,
    path_foto  VARCHAR(255) NOT NULL
);
";
table_creation("tutors",$table_tutors,$con);


$table_users = "
CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    fullname VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);
";
table_creation("users",$table_users,$con);

$table_categories = "
CREATE TABLE categories (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL
);
";
table_creation("categories",$table_categories,$con);

$table_privates = "
CREATE TABLE privates (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    title VARCHAR(255) NOT NULL,
    category_id INT UNSIGNED NOT NULL,
    mentor_id INT UNSIGNED NOT NULL,
    price_per_hour INT NOT NULL,
    method LONGTEXT NOT NULL,

    FOREIGN KEY (category_id) REFERENCES categories(id),
    FOREIGN KEY (mentor_id) REFERENCES tutors(id)
);
";
table_creation("privates",$table_privates,$con);

$table_private_enrolls = "
CREATE TABLE private_enrolls (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    user_id INT UNSIGNED NOT NULL,
    private_id INT UNSIGNED NOT NULL,
    total_hours INT NOT NULL,
    hours_done INT NOT NULL,

    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (private_id) REFERENCES privates(id)
);
";
table_creation("private_enrolls",$table_private_enrolls,$con);

$table_transactions = "
CREATE TABLE transactions (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    invoice VARCHAR(16) NOT NULL,
    user_id INT UNSIGNED NOT NULL,
    private_id INT UNSIGNED NOT NULL,
    order_date DATETIME,
    purchase_date DATETIME,
    payload LONGTEXT NOT NULL,

    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (private_id) REFERENCES privates(id)
);
";
table_creation("transactions",$table_transactions,$con);

close_connection($con);

function table_insertion($table_name,$query,$con){

    if ($con->query($query) == TRUE) {
        echo "Table ". $table_name ." created<br>";
    }else {
        echo "Table ". $table_name ." not created: " . $con->error."<br>";
    }

}

?>