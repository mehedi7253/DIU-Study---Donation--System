<?php


    require_once '../php/teacher_config.php';
    // check user login via session
    if(not_logged_in() === TRUE) {
        header('location: teacher_login.php'); // redirect location
    }

    $userdata = getUserDataByUserId($_SESSION['id']);  //get all information by user id
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Donet Now</title>
    <link rel="stylesheet" href="../assets/style/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="../assets/style/style.css" type="text/css" />
    <link rel="icon" href="../images/fund-raiser.jpg">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>
<body>
    <!--Start menu section-->
    <?php include 'nav_bar.php'?>
    <!--End menu section-->

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 mt-3 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center text-dark">Donet Now</h3>
                        <h3>
                            <?php
                                if (isset($_GET['donet_now'])){
                                    $id = $_GET['donet_now'];

                                    $query = "SELECT * FROM request WHERE id = $id";

                                    $r = mysqli_query($connect, $query);
                                    $data = mysqli_fetch_assoc($r);
                                }

                                if (isset($_POST['payment'])){
                                    $student_id    = $_POST['student_id'];
                                    $student_name  = $_POST['student_name'];
                                    $dept          = $_POST['dept'];
                                    $request_type  = $_POST['request_type'];
                                    $donor_name    = $_POST['donor_name'];
                                    $amount        = $_POST['amount'];
                                    $trxID         = $_POST['text_id'];


                                    if ($amount == ""){
                                        echo "<span class='text-danger'>Amount Not Empty</span><br/>";
                                    }
                                    if ($trxID == ""){
                                        echo "<span class='text-danger'>TrxID Not Empty</span><br/>";
                                    }

                                    $date = @date('Y-m-d H:i:s');

                                    if ($amount && $trxID){
                                        $send_money = "INSERT INTO payment (student_id, student_name, dept, request_type, donor_name, amount, text_id, status, date) VALUES ('$student_id', '$student_name', '$dept', '$request_type', '$donor_name', '$amount', '$trxID', '0','$date')";
                                        $result = mysqli_query($connect, $send_money);

                                        echo "<span class='text-success'>Donation Send Successfully done</span>";
                                    } else{
                                        echo "<span class='text-danger'>Donation Send failed</span>";
                                    }
                                }
                            ?>
                        </h3>
                    </div>
                    <div class="card-body">
                        <img src="../images/bkash.jpg" class="img-fluid mb-5" style="height: 500px; width: 100%">

                        <br/>
                        <form action="" method="post">
                            <div class="form-group">
                                <label>Student ID</label>
                                <input type="text" name="student_id" value="<?php echo $data['student_id'];?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Student Name</label>
                                <input type="text" name="student_name" value="<?php echo $data['student_name'];?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Student Department</label>
                                <input type="text" name="dept" value="<?php echo $data['dept'];?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Student Request Type</label>
                                <input type="text" name="request_type" value="<?php echo $data['request_type'];?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Donor Name</label>
                                <input type="text" name="donor_name" class="form-control" value="<?php echo $userdata['first_name'];?>">
                            </div>
                            <div class="form-group">
                                <label>Amount</label>
                                <input type="text" name="amount" class="form-control" placeholder="Enter Your Amount">
                            </div>
                            <div class="form-group">
                                <label>TrxID</label>
                                <input type="text" name="text_id" class="form-control" placeholder="XBSA-45">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="payment" value="Donet Now" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>
</html>

