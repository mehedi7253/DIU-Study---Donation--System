<?php

//connect with database
require_once '../php/config.php';

// check user login via session
if(not_logged_in() === TRUE) {
    header('location: student_login.php'); // redirect location
}

$userdata = getUserDataByUserId($_SESSION['id']);  //get all information by user id

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Dashboard</title>
    <link rel="stylesheet" href="../assets/style/bootstrap.css" type="text/css" />
    <link rel="icon" href="../images/<?php echo $userdata['image'];?>" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Custom fonts for this template-->
    <link href="front/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="front/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style/style.css">

    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

</head>