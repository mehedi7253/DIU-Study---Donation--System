<?php

    session_start();
    if (!isset($_SESSION['email'])){
        header('Location: admin_login.php');
    }

    require_once '../php/db_connect.php';

    if (isset($_GET['del'])) {
        $id = $_GET['del'];

        $sql = "DELETE FROM notice WHERE id = $id";

        $result = mysqli_query($connect, $sql);

        header('Location: manage_notice.php');
    }
?>

