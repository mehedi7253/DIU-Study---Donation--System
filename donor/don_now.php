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
                        if (isset($_GET['don']))
                        {
                            $don = $_GET['don'];

                            $query  = "SELECT * FROM donation WHERE donet_id = $don";
                            $result = mysqli_query($connect, $query);

                            $data = mysqli_fetch_assoc($result);
                        }

                        if (isset($_POST['don'])){
                            $donerID          = $_POST['donerID'];
                            $doner_name       = $_POST['doner_name'];
                            $studentID        = $_POST['studentID'];
                            $student_name     = $_POST['student_name'];
                            $book             = $_POST['book'];
                            $author           = $_POST['author'];
                            $amount           = $_POST['amount'];
                            $txtID            = $_POST['txtID'];

                            if ($amount == ""){
                                echo "<span class='text-danger'>Please Enter Your Donation Amount ***</span><br/>";
                            }

                            if ($txtID == ""){
                                echo "<span class='text-danger'>Please Enter Your transaction ID ***</span><br/>";
                            }

                            if ($donerID && $doner_name && $studentID && $student_name && $book && $author && $amount && $txtID){

                                $created = @date('Y-m-d H:i:s');

                                $sql_buy  = "INSERT INTO rechive_donation (donerID, doner_name, studentID, student_name, book, author, amount, txtID, date, status) VALUES ('$donerID', '$doner_name', '$studentID', '$student_name', '$book', '$author', '$amount', '$txtID', '$created', '0')";
                                $result   = mysqli_query($connect, $sql_buy);

                                echo "<span class='text-success'>Donet Successful. Student Will Contact You Soon</span><br/>";
                            }
                            else{
                                echo "<span class='text-danger'>Donet Failed. Try Again....!!</span><br/>";
                            }

                        }
                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label> Buyer Name: </label>
                                <input type="text"  hidden name="donerID" value="<?php echo $userdata['id']?>"class="form-control">
                                <input type="text"  name="doner_name" value="<?php echo $userdata['first_name']?> <?php echo $userdata['last_name']?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> Student ID: </label>
                                <input type="text" name="studentID" value="<?php echo $data['studentID']?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> Student Name: </label>
                                <input type="text" name="student_name" value="<?php echo  $data['student_name']?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> Book Name: </label>
                                <input type="text" name="book" value="<?php echo $data['book']?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> Book Author Name: </label>
                                <input type="text" name="author" value="<?php echo $data['author']?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> Amount: </label>
                                <input type="text" name="amount" placeholder="Enter Your Amount" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> Transaction ID: </label>
                                <input type="text" name="txtID"  placeholder="Enter Your Transaction ID" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="don" class="btn btn-info col-md-6" value="Donet Now">
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