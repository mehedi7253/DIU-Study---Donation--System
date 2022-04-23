<?php



    require_once '../php/teacher_config.php'; //connect with database
    global $connect;

    if (isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "DELETE FROM tbl_files WHERE id = $id"; // query

        $result = mysqli_query($connect, $sql); // execute query

        header('Location:view.php'); //redirect page
    }
?>

