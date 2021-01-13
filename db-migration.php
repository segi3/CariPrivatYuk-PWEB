<?php

// File php untuk membuat skema database
include('db-connection.php');

$con = open_connection();


// Fungsi untuk mendrop pembuatan table
function table_drop($table_name,$con){

    $query= "DROP TABLE ".$table_name.";";
    if ($con->query($query) == TRUE) {
        echo "Table ". $table_name ." Dropped<br>";
    }else {
        echo "Table ". $table_name ." cant be dropped: " . $con->error."<br>";
    }

}
table_drop("schedules",$con);
table_drop("reviews",$con);
table_drop("private_enrolls",$con);
table_drop("privates",$con);
table_drop("categories",$con);
table_drop("users",$con);
table_drop("tutors",$con);

echo "<br>";
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
    path_ktp VARCHAR(255) NOT NULL,
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
    tutor_id INT UNSIGNED NOT NULL,
    price_per_hour INT NOT NULL,
    pelaksanaan_online INT NOT NULL,
    pelaksanaan_offline INT NOT NULL,
    method LONGTEXT NOT NULL,

    FOREIGN KEY (category_id) REFERENCES categories(id),
    FOREIGN KEY (tutor_id) REFERENCES tutors(id)
);
";
table_creation("privates",$table_privates,$con);

$table_private_enrolls = "
CREATE TABLE private_enrolls (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    user_id INT UNSIGNED NOT NULL,
    private_id INT UNSIGNED NOT NULL,
    tanggal_pembelian DATE,
    total_hours INT NOT NULL,
    hours_done INT NOT NULL,
    approval_status INT NOT NULL,
    payment_status INT NOT NULL,
    completion_status INT NOT NULL,
    pelaksanaan_online INT NOT NULL,
    pelaksanaan_offline INT NOT NULL,
    bukti_pembayaran VARCHAR(255) NULL,

    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (private_id) REFERENCES privates(id)
);
";
table_creation("private_enrolls",$table_private_enrolls,$con);

$table_reviews = "
CREATE TABLE reviews (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    description VARCHAR(255) NOT NULL,
    user_id INT UNSIGNED NOT NULL,
    privat_id INT UNSIGNED NOT NULL,

    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (privat_id) REFERENCES privates(id)
);
";
table_creation("reviews",$table_reviews,$con);

$table_schedules = "
CREATE TABLE schedules (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    enroll_id INT UNSIGNED NOT NULL,
    tanggal VARCHAR(20) NOT NULL,
    jam VARCHAR(16) NOT NULL,
    lokasi VARCHAR(255) NOT NULL,
    durasi INT NULL,
    offline VARCHAR(16) NOT NULL,
    online VARCHAR(16) NOT NULL,
    status_persetujuan VARCHAR(16) NOT NULL,
    notes VARCHAR(16) NULL,
    notes_status INT NULL,
    FOREIGN KEY (enroll_id) REFERENCES private_enrolls(id)
);
";
table_creation("schedules",$table_schedules,$con);



function table_insertion($query,$con){

    if ($con->query($query) == TRUE) {
        echo "Data inserted<br>";
    }else {
        echo "Failed to insert data : ".$query." : ". $con->error ." <br>";
    }

}
echo "<br>";

table_insertion("insert into categories (title,slug) VALUES ('Akademik', 'akademik');",$con);
table_insertion("insert into categories (title,slug) VALUES ('Development', 'development');",$con);
table_insertion("insert into categories (title,slug) VALUES ('Bisnis', 'bisnis');",$con);
table_insertion("insert into categories (title,slug) VALUES ('Finansial', 'finansial');",$con);
table_insertion("insert into categories (title,slug) VALUES ('Teknologi dan Software', 'teknologi-dan-software');",$con);
table_insertion("insert into categories (title,slug) VALUES ('Desain', 'desain');",$con);
table_insertion("insert into categories (title,slug) VALUES ('Olahraga', 'olahraga');",$con);
table_insertion("insert into categories (title,slug) VALUES ('Seni', 'seni');",$con);
table_insertion("insert into categories (title,slug) VALUES ('Musik', 'musik');",$con);
echo "<br>";

table_insertion("insert  into `users`(`fullname`,`address`,`email`,`password`) values 
('Abdur Rohman','Jombang','abdurrohman9i03@gmail.com','211e5575bbf2cbd2f7312fc4fa3f6f16')",$con);
table_insertion("insert  into `users`(`fullname`,`address`,`email`,`password`) values 
('Zaenal Mahmudi Ismail','Lumajang','maszaenal@gmail.com','d282a5f3cd758fd302601421d9e43948');",$con);

echo "<br>";

table_insertion("insert  into `tutors`(`fullname`,`address`,`email`,`password`,`path_ktp`,`path_foto`) values 
('Rafi Nizar Abiyyi','Serang','rafiniz@gmail.com','ac4d4b77085a483e6a691fbaa0f9c9b4','ktp-rafiniz@gmail.com.png','foto-rafiniz@gmail.com.png')",$con);
table_insertion("insert  into `tutors`(`fullname`,`address`,`email`,`password`,`path_ktp`,`path_foto`) values 
('Excel Deo','Nganjuk','masexcel@gmail.com','9758fcf028936db8866c4b082fb95b45','ktp-masexcel@gmail.com.png','foto-masexcel@gmail.com.jpg')",$con);

echo "<br>";
table_insertion("insert  into `privates`(`title`,`category_id`,`tutor_id`,`price_per_hour`,`pelaksanaan_online`,`pelaksanaan_offline`,`method`) values 
('Berenang',7,1,50000,0,1,'Privat dilakukan secara offline di kolam renang yang di setujui.  Tutor mengajarkan langsung praktik berenang mulai dari yang paling dasar di iringi penyampaian teori saat praktik berlangsung.')",$con);
table_insertion("insert  into `privates`(`title`,`category_id`,`tutor_id`,`price_per_hour`,`pelaksanaan_online`,`pelaksanaan_offline`,`method`) values 
('PWEB',5,2,100000,1,1,'Pengajaran Materi Dengan PPT dan Live Coding.')",$con);
table_insertion("insert  into `privates`(`title`,`category_id`,`tutor_id`,`price_per_hour`,`pelaksanaan_online`,`pelaksanaan_offline`,`method`) values 
('JSS',5,2,100000,1,1,'Belajar JSS dari awal.')",$con);
table_insertion("insert  into `privates`(`title`,`category_id`,`tutor_id`,`price_per_hour`,`pelaksanaan_online`,`pelaksanaan_offline`,`method`) values 
('OJAX CRUD',5,2,30000,1,0,'Metodologi Live Coding dengan bimbingan tutor.')",$con);
table_insertion("insert  into `privates`(`title`,`category_id`,`tutor_id`,`price_per_hour`,`pelaksanaan_online`,`pelaksanaan_offline`,`method`) values 
('React Basic',5,2,50000,1,1,'Belajar React')",$con);

echo "<br>";

table_insertion("insert  into `private_enrolls`(`user_id`,`private_id`,`total_hours`,`hours_done`,`approval_status`,`payment_status`,`completion_status`,`pelaksanaan_online`,`pelaksanaan_offline`,`bukti_pembayaran`) values 
(2,3,10,0,2,2,2,1,0,NULL),
(2,2,12,0,2,2,2,1,0,NULL),
(2,1,24,0,2,2,2,0,1,NULL);",$con);


close_connection($con);

?>