<?php



require_once '../php/teacher_config.php'; //connect with database
global $connect;

if (isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM curse_video WHERE id = $id"; // query

    $result = mysqli_query($connect, $sql); // execute query

    header('Location:view_video.php'); //redirect page
}
?>

