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
                            if (isset($_GET['sell_id']))
                            {
                                $sell_id = $_GET['sell_id'];

                                $query  = "SELECT * FROM request_sell WHERE sell_id = $sell_id";
                                $result = mysqli_query($connect, $query);

                                $data = mysqli_fetch_assoc($result);
                            }

                            if (isset($_POST['buy_now'])){
                                $buyer_name       = $_POST['buyer_name'];
                                $buyer_contact    = $_POST['buyer_contact'];
                                $studentID        = $_POST['studentID'];
                                $student_name     = $_POST['student_name'];
                                $book_name        = $_POST['book_name'];
                                $author_name      = $_POST['author_name'];
                                $amount           = $_POST['amount'];
                                $txt_id           = $_POST['txt_id'];

                                if ($txt_id == ""){
                                    echo "<span class='text-danger'>Please Enter Your transaction ID ***</span><br/>";
                                }

                                if ($buyer_name && $buyer_contact && $studentID && $student_name && $book_name && $author_name && $amount && $txt_id){

                                    $created = @date('Y-m-d H:i:s');

                                    $sql_buy  = "INSERT INTO rechive_sell (buyer_name, buyer_contact, studentID, student_name, book_name, author_name, amount, txt_id, date, status ) VALUES ('$buyer_name', '$buyer_contact', '$studentID', '$student_name', '$book_name', '$author_name', '$amount', '$txt_id', '$created', '0')";
                                    $result   = mysqli_query($connect, $sql_buy);

                                    echo "<span class='text-success'>Buy Successfull. Student Will Contact You Soon</span><br/>";
                                }
                                else{
                                    echo "<span class='text-danger'>Buy Failed. Try Again....!!</span><br/>";
                                }

                            }
                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label> Buyer Name: </label>
                                <input type="text"  name="buyer_name" value="<?php echo $userdata['first_name']?> <?php echo $userdata['last_name']?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> Buyer Contact Number: </label>
                                <input type="number"  name="buyer_contact" value="<?php echo $userdata['contact']?>" class="form-control">
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
                                <input type="text" name="book_name" value="<?php echo $data['book_name']?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> Book Author Name: </label>
                                <input type="text" name="author_name" value="<?php echo $data['author_name']?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> Amount: </label>
                                <input type="text" name="amount" value="<?php echo $data['present_price']?>"" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> Transaction ID: </label>
                                <input type="text" name="txt_id"  placeholder="Enter Your Transaction ID" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="buy_now" class="btn btn-info col-md-6" value="Buy Now">
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