<?php

require_once '../php/db_connect.php';

//block unblock user
if (isset($_GET['status'])){
    $status1 = $_GET['status'];

    $sql = "SELECT * FROM teachers WHERE id='$status1'"; // select all teachers

    $result = mysqli_query($connect, $sql);

    while ($row = mysqli_fetch_object($result)){
        $status_var = $row->status;

        if ($status_var == '0'){
            $status_state = 1;
        }else{
            $status_state = 0;
        }
        $update = "UPDATE teachers SET status = '$status_state' WHERE id = '$status1'";

        $res = mysqli_query($connect, $update);

        if ($res){
            header('Location: manage_teacher.php');
        }else{
            echo  mysqli_error($res);
        }
    }
}

?>