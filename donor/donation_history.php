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
            <div class="col-md-12 col-sm-12 float-left mt-5 mb-5">
                <div class=" float-left col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3><i class="fas fa-funnel-dollar" style="color: green"></i> Total Donation</h3>
                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($_SESSION['id'])) {
                                $id = $_SESSION['id'];

                                $sql = "SELECT * FROM rechive_donation WHERE donerID = $id";
                                $fetchs = mysqli_query($connect, $sql);
                            }

                            $sql = "SELECT DISTINCT (COUNT(donerID)) as NOE FROM rechive_donation donation WHERE $id=donation.donerID";
                            $res = mysqli_query($connect, $sql);
                            $values = mysqli_fetch_assoc($res);
                            $num_rows = $values['NOE']; //toatal number of available data in database
                            echo "<span style='font-size: 30px;'>$num_rows</span>"; //print data
                            ?>
                        </div>
                    </div>
                </div>
                <div class=" float-left col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3><i class="fas fa-exchange-alt" style="color: blue;"></i> Total Exchange</h3>
                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($_SESSION['id'])) {
                                $id = $_SESSION['id'];

                                $sql = "SELECT * FROM rechive_exchange WHERE exchangerID = $id";
                                $fetchs = mysqli_query($connect, $sql);
                            }

                            $sql = "SELECT DISTINCT (COUNT(exchangerID)) as NOE FROM rechive_exchange rechive WHERE $id=rechive.exchangerID";
                            $res = mysqli_query($connect, $sql);
                            $values = mysqli_fetch_assoc($res);
                            $num_rows = $values['NOE']; //toatal number of available data in database
                            echo "<span style='font-size: 30px;'>$num_rows</span>"; //print data
                            ?>
                        </div>
                    </div>
                </div>
                <div class=" float-left col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3><i class="fas fa-shopping-bag" style="color: yellowgreen;"></i> Total Buy</h3>
                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($_SESSION['id'])) {
                                $id = $_SESSION['id'];

                                $sql = "SELECT * FROM rechive_sell WHERE buyrID = $id";
                                $fetchs = mysqli_query($connect, $sql);
                            }

                            $sql = "SELECT DISTINCT (COUNT(buyrID)) as NOE FROM rechive_sell buy WHERE $id=buy.buyrID";
                            $res = mysqli_query($connect, $sql);
                            $values = mysqli_fetch_assoc($res);
                            $num_rows = $values['NOE']; //toatal number of available data in database
                            echo "<span style='font-size: 30px;'>$num_rows</span>"; //print data
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Your Donation History</h1>
                    </div>
                    <div class="card-body">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-tab2" role="tablist" style="background-color: silver">
                                    <a class="nav-item nav-link active" id="nav-home-tab2" data-toggle="tab" href="#nav-home2" role="tab" aria-controls="nav-home" aria-selected="false"><span class="ml-3 text-dark font-weight-bold">Donation</span> </a>
                                    <a class="nav-item nav-link " id="nav-profile-tab2" data-toggle="tab" href="#nav-profile2" role="tab" aria-controls="nav-profile" aria-selected="true"> <span class="ml-3 font-weight-bold text-dark">Exchange</span></a>
                                    <a class="nav-item nav-link " id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><span class="ml-3 font-weight-bold text-dark">Buy</span></a>
                                </div>
                            </nav>
                            <div class="tab-content py-3 px-3 px-sm-0 mt-5" id="nav-tabContent2">
                                <div class="tab-pane fade" id="nav-home2" role="tabpanel" aria-labelledby="nav-home-tab2">
                                    <div class="form_1">
                                        <div>
                                            <?php
                                            if (isset($_SESSION['id'])){
                                                $id = $_SESSION['id'];

                                                $sql = "SELECT * FROM rechive_donation WHERE donerID = $id";
                                                $fetchs = mysqli_query($connect, $sql);
                                            }
                                            ?>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>Serial</th>
                                                        <th>Student Name</th>
                                                        <th>Book</th>
                                                        <th>Author</th>
                                                        <th>Amount</th>
                                                        <th>Tranzaction ID</th>
                                                        <th>Donation Date</th>
                                                        <th>Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $i = 1;
                                                    while ($fetch = mysqli_fetch_assoc($fetchs)){?>
                                                        <tr>
                                                            <td><?php echo $i++;?></td>
                                                            <td><?php echo $fetch['student_name'];?></td>
                                                            <td><?php echo $fetch['book'];?></td>
                                                            <td><?php echo $fetch['author'];?></td>
                                                            <td><?php echo $fetch['amount'];?></td>
                                                            <td><?php echo $fetch['txtID'];?></td>
                                                            <td><?php echo $fetch['date'];?></td>
                                                            <td>
                                                                <?php
                                                                $status = $fetch['status'];
                                                                // echo $status;

                                                                if (($status) == '0'){?>
                                                                   <button class="btn btn-danger">Pending</button>
                                                                    <?php
                                                                }
                                                                if (($status) == '1'){?>
                                                                    <button class="btn btn-success">Received</button>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                    <?php }?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-profile2" role="tabpanel" aria-labelledby="nav-profile-tab2">
                                    <div class="form_1">
                                        <?php
                                        if (isset($_SESSION['id'])){
                                            $id = $_SESSION['id'];

                                            $sql = "SELECT * FROM rechive_exchange WHERE exchangerID = $id";
                                            $fetchs = mysqli_query($connect, $sql);
                                        }
                                        ?>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>Serial</th>
                                                    <th>Student Name</th>
                                                    <th>Book Name</th>
                                                    <th>Author Name</th>
                                                    <th>Amount</th>
                                                    <th>Transation ID</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $i = 1;
                                                while ($fetch = mysqli_fetch_assoc($fetchs)){?>
                                                    <tr>
                                                        <td><?php echo $i++;?></td>
                                                        <td><?php echo $fetch['student_name'];?></td>
                                                        <td><?php echo $fetch['exchanger_contact'];?></td>
                                                        <td><?php echo $fetch['exchange_with'];?></td>
                                                        <td><?php echo $fetch['description'];?></td>
                                                        <td><?php echo $fetch['date'];?></td>
                                                        <td><a href="../donor/uploads/<?php echo $fetch['filename']; ?>" target="_blank"><?php echo $fetch['filename'];?></a></td>
                                                        <td>
                                                            <?php
                                                            $status = $fetch['status'];
                                                            // echo $status;

                                                            if (($status) == '0'){?>
                                                                <button class="btn btn-danger">Pending</button>
                                                                <?php
                                                            }
                                                            if (($status) == '1'){?>
                                                                <button class="btn btn-success">Received</button>
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <?php
                                    if (isset($_SESSION['id'])){
                                        $id = $_SESSION['id'];

                                        $sql = "SELECT * FROM rechive_sell WHERE buyrID = $id";
                                        $fetchs = mysqli_query($connect, $sql);
                                    }
                                    ?>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Serial</th>
                                                <th>Buyer Name</th>
                                                <th>Buyer Contact</th>
                                                <th>Book Name</th>
                                                <th>Author Name</th>
                                                <th>Amount</th>
                                                <th>Transaction ID</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $i = 1;
                                            while ($fetch = mysqli_fetch_assoc($fetchs)){?>
                                                <tr>
                                                    <td><?php echo $i++;?></td>
                                                    <td><?php echo $fetch['buyer_name'];?></td>
                                                    <td><?php echo $fetch['buyer_contact'];?></td>
                                                    <td><?php echo $fetch['book_name'];?></td>
                                                    <td><?php echo $fetch['author_name'];?></td>
                                                    <td><?php echo $fetch['amount'];?></td>
                                                    <td><?php echo $fetch['txt_id'];?></td>
                                                    <td><?php echo $fetch['date'];?></td>
                                                    <td>
                                                        <?php
                                                        $status = $fetch['status'];
                                                        // echo $status;

                                                        if (($status) == '0'){?>
                                                            <a href="rechived_sell.php?status=<?php echo $fetch['id'];?>"><button class="btn btn-danger">Pending</button></a>
                                                            <?php
                                                        }
                                                        if (($status) == '1'){?>
                                                            <button class="btn btn-success">Received</button>
                                                            <?php
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="dashboard.php"><button type="button" class="btn btn-info float-right">Back</button></a>
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