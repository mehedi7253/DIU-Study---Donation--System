<?php

require_once '../php/donor_config.php';

if(not_logged_in() === TRUE) {
    header('location: donor_login.php');
}

$userdata = getUserDataByUserId($_SESSION['id']);  //get all information by user id
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Well Come <?php echo $userdata['first_name'];?></title>
    <link rel="stylesheet" href="../assets/style/style.css" type="text/css">
    <link rel="stylesheet" href="../assets/style/bootstrap.css" type="text/css">
    <link rel="icon" href="../images/logo.PNG">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <?php include 'nav.php'?>
</nav>




<!--    main content-->
<section class="main_section mb-5" style="background-color: #F9F9FA">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto mt-5 mb-5">
                <div class="card">
                    <div class="card-body">
                        <?php
                        if (isset($_GET['exchange_id']))
                        {
                            $exchange_id = $_GET['exchange_id'];

                            $query  = "SELECT * FROM request_exchange WHERE exchange_id = $exchange_id";
                            $result = mysqli_query($connect, $query);

                            $data = mysqli_fetch_assoc($result);
                        }

                        if (isset($_POST['change_now'])){
                            $exchanger_name       = $_POST['exchanger_name'];
                            $exchanger_contact    = $_POST['exchanger_contact'];
                            $studentID            = $_POST['studentID'];
                            $student_name         = $_POST['student_name'];
                            $exchange_with        = $_POST['exchange_with'];
                            $description          = $_POST['description'];
                            $filename             = $_FILES['file']['name'];


                            if ($exchange_with == ""){
                                echo "<span class='text-danger'>Please Enter Exchange Item Name ***</span><br/>";
                            }
                            if ($description == ""){
                                echo "<span class='text-danger'>Please Enter Description ***</span><br/>";
                            }
                            if ($filename == ""){
                                echo "<span class='text-danger'>Please Select File ***</span><br/>";
                            }

                            if ($exchanger_name && $exchanger_contact && $studentID && $student_name && $exchange_with && $description && $filename){

                                if ($filename != '') {
                                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                                    $allowed = ['pdf', 'txt', 'doc', 'docx', 'zip'];

                                    //check if file type is valid
                                    if (in_array($ext, $allowed)) {
                                        $sql = "SELECT MAX(id) as id from rechive_exchange";
                                        $result = mysqli_query($connect, $sql);
                                        if (count($result) > 0) {
                                            $row = mysqli_fetch_array($result);
                                            $filename = ($row['id'] + 1) . '-' . $filename;
                                        } else
                                            $filename = '1' . '-' . $filename;

                                        //set target directory
                                        $path = 'uploads/';

                                        move_uploaded_file($_FILES['file']['tmp_name'], ($path . $filename));

                                    }

                                }

                                $created = @date('Y-m-d H:i:s');

                                $sql_change  = "INSERT INTO rechive_exchange (exchanger_name, exchanger_contact, studentID, student_name, exchange_with, description, filename, date, status ) VALUES ('$exchanger_name', '$exchanger_contact', '$studentID', '$student_name', '$exchange_with', '$description', '$filename', '$created', '0')";
                                $result   = mysqli_query($connect, $sql_change);

                                echo "<span class='text-success'>Exchange Successfull. Student Will Contact You Soon</span><br/>";
                            }
                            else{
                                echo "<span class='text-danger'>Exchange Failed. Try Again....!!</span><br/>";
                            }

                        }
                        ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label> Changer Name: </label>
                                <input type="text"  name="exchanger_name" value="<?php echo $userdata['first_name']?> <?php echo $userdata['last_name']?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> Changer Contact Number: </label>
                                <input type="number"  name="exchanger_contact" value="<?php echo $userdata['contact']?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" hidden name="studentID" value="<?php echo  $data['studentID']?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> Student Name: </label>
                                <input type="text" name="student_name" value="<?php echo  $data['student_name']?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> Exchange With: </label>
                                <input type="text" name="exchange_with" placeholder="Enter Your Exchange Item Name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> Give Description: </label>
                                <textarea  name="description" placeholder="Enter Your Description" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label> Select A File: </label>
                                <input type="file"  name="file" placeholder="Seklect a File" class="form-control"></input>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="change_now" class="btn btn-info col-md-6" value="Change Now">
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!--    script-->
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.js"></script>
</body>
</html>