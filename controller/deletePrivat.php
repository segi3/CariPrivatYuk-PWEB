<?php session_start();

    require_once('../db-connection.php');
    
    $array_error = array();
    function table_insertion($query,$con){

        if ($con->query($query) == TRUE) {
            echo "Data inserted<br>";
        }else {
            echo "Failed to insert data : ".$query." : ". $con->error ." <br>";
        }
    
    }


    $tutor_id = $_SESSION['tutor_id'];
    $id = $_GET['id'];

    $select_deleted = "
        select tutor_id,title FROM privates WHERE id=".$id." limit 1;
    ";

    $con=open_connection();
    if($res=$con->query($select_deleted)){
        if($res->num_rows > 0){
            $data=$res->fetch_assoc();
            if($data['tutor_id']===$tutor_id){

                $select_deleted_enrolls = "
                    select * FROM private_enrolls WHERE private_id=".$id.";
                ";

                $res_enrolls=$con->query($select_deleted_enrolls);
                $backup_query="insert  into `private_enrolls`(`id`,`user_id`,`private_id`,`total_hours`,`hours_done`) values ";

                if($res_enrolls->num_rows > 0){

                    while($row = $res_enrolls->fetch_assoc()){
                        $backup_query.= " (".$row['id'].", ".$row['user_id'].", ".$row['private_id'].", ".$row['total_hours'].", ".$row['hours_done']."), ";
                    }
                    $backup_query=  substr($backup_query, 0, -2);
                    $backup_query.= ";";
                }
                

                $delete_deleted = "
                    DELETE FROM private_enrolls WHERE private_id=".$id.";
                ";
                $delete_deleted2 = "
                    DELETE FROM privates WHERE id=".$id.";
                ";
                
                if($con->query($delete_deleted)){
                    if($con->query($delete_deleted2)){
                        
                        close_connection($con);
    
                        $_SESSION['success'] = 'Berhasil menghapus privat';
    
                        header('Location: http://localhost/CariPrivatYuk-PWEB/tutor/dashboard/my-privat/');
                        
                        exit();

                    }else{
                        
                        $con->query($backup_query);

                        close_connection($con);

                        array_push($array_error, 'Gagal Hapus Data1');
                        $_SESSION['error'] = $array_error;

                        header('Location: http://localhost/CariPrivatYuk-PWEB/tutor/dashboard/my-privat/');

                        exit();

                    }
                }else{
                    close_connection($con);

                    array_push($array_error, 'Gagal Hapus Data1');
                    $_SESSION['error'] = $array_error;

                    header('Location: http://localhost/CariPrivatYuk-PWEB/tutor/dashboard/my-privat/');

                    exit();
                }
                
            }else{
                close_connection($con);

                array_push($array_error, 'Gagal Hapus Data2');
                $_SESSION['error'] = $array_error;

                header('Location: http://localhost/CariPrivatYuk-PWEB/tutor/dashboard/my-privat/');

                exit();
            }
        }
    }else{
        close_connection($con);

        array_push($array_error, 'Gagal Hapus Data3');
        $_SESSION['error'] = $array_error;

        header('Location: http://localhost/CariPrivatYuk-PWEB/tutor/dashboard/my-privat/');

        exit();
    }

?>