<?php

require_once '../php/config.php';

if (isset($_GET['status'])){
    $status1 = $_GET['status']; // decleare variable

    $sql = "SELECT * FROM rechive_exchange WHERE id='$status1'"; // select all students

    $result = mysqli_query($connect, $sql);

    while ($row = mysqli_fetch_object($result)){
        $status_var = $row->status;

        if ($status_var == '0'){
            $status_state = 1;
        }else{
            $status_state = 0;
        }
        $update = "UPDATE rechive_exchange SET status = '$status_state' WHERE id = '$status1'";

        $res = mysqli_query($connect, $update);

        if ($res){
            header('Location: rechive_exchange.php');
        }else{
            echo  mysqli_error($res);
        }
    }
}

?>