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
            <div class="col-md-12 col-sm-12 mt-5 mb-5">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab2" role="tablist" style="background-color: seashell">
                            <a class="nav-item nav-link tab_flight active" id="nav-home-tab2" data-toggle="tab" href="#nav-home2" role="tab" aria-controls="nav-home" aria-selected="false"><span class="ml-3 text-dark font-weight-bold">Donataion Post</span> </a>
                            <a class="nav-item nav-link tab_hotel" id="nav-profile-tab2" data-toggle="tab" href="#nav-profile2" role="tab" aria-controls="nav-profile" aria-selected="true"> <span class="ml-3 text-dark font-weight-bold">Exchange Post</span></a>
                            <a class="nav-item nav-link tab_hotel" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><span class="text-dark font-weight-bold ml-3">Sell Post</span></a>
                        </div>
                    </nav>
                    <div class="tab-content py-3 px-3 px-sm-0 mt-5" id="nav-tabContent2">
                        <div class="tab-pane fade" id="nav-home2" role="tabpanel" aria-labelledby="nav-home-tab2">
                            <?php
                                $sql = "SELECT * FROM donation WHERE status = 1";
                                $res = mysqli_query($connect, $sql);
                            ?>
                            <div class="form_1">
                                <?php while ($row = mysqli_fetch_assoc($res)){?>
                                    <div class="col-md-4 col-sm-12 float-left mt-2">
                                        <div class="card">
                                            <img class="card-img-top" src="../images/<?php echo $row['image']?>" style="height: 200px">
                                            <div class="card-body" style="background-color: inherit">
                                                <div class="form-group">
                                                    <label><span class="font-weight-bold">Student Name: </span> <span class="text-capitalize"><?php echo $row['student_name'];?> </span></label><br/>
                                                    <label><span class="font-weight-bold">Department: </span> <span class="text-capitalize"><?php echo $row['depertment'];?> </span></label><br/>
                                                    <label><span class="font-weight-bold">Book Name: </span> <?php echo $row['book'];?> </label><br/>
                                                    <label><span class="font-weight-bold">Author Name: </span> <?php echo $row['author'];?></label><br/>
                                                    <label><span class="font-weight-bold">Donate Condition: </span> <?php echo $row['donet_condition'];?> </label><br/>
                                                    <label><span class="font-weight-bold">Post Date: </span> <?php echo $row['date'];?></label><br/>
                                                    <label class="text-justify"><span class="font-weight-bold">Description: </span> <?php echo $row['description'];?> </label><br/>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <a href="don_now.php?don=<?php echo $row['donet_id'];?>"><button class="btn btn-info btn-group-lg">Donet Now</button></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile2" role="tabpanel" aria-labelledby="nav-profile-tab2">
                            <?php
                                $sql = "SELECT * FROM request_exchange WHERE status = 1";
                                $res = mysqli_query($connect, $sql);
                            ?>
                            <div class="form_1">
                                <?php while ($row = mysqli_fetch_assoc($res)){?>
                                    <div class="col-md-4 col-sm-12 float-left mt-2">
                                        <div class="card">
                                            <img class="card-img-top" src="../images/<?php echo $row['image']?>" style="height: 200px">
                                            <div class="card-body" style="background-color: inherit">
                                                <div class="form-group">
                                                    <label><span class="font-weight-bold">Student Name: </span> <span class="text-capitalize"><?php echo $row['student_name'];?> </span></label><br/>
                                                    <label><span class="font-weight-bold">Department: </span> <span class="text-capitalize"><?php echo $row['depertment'];?> </span></label><br/>
                                                    <label><span class="font-weight-bold">Book Name: </span> <?php echo $row['book_name'];?> </label><br/>
                                                    <label><span class="font-weight-bold">Author Name: </span> <?php echo $row['author_name'];?></label><br/>
                                                    <label><span class="font-weight-bold">Donate Condition: </span> <?php echo $row['condition_exchange'];?> </label><br/>
                                                    <label><span class="font-weight-bold">Post Date: </span> <?php echo $row['date'];?></label><br/>
                                                    <label class="text-justify"><span class="font-weight-bold">Description: </span> <?php echo $row['description'];?> </label><br/>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <a href="exchange_now.php?exchange_id=<?php echo $row['exchange_id'];?>"><button class="btn btn-info btn-group-lg">Exchange Now</button></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <?php
                                $sql = "SELECT * FROM request_sell WHERE status = 1";
                                $res = mysqli_query($connect, $sql);
                            ?>
                            <?php while ($row = mysqli_fetch_assoc($res)){?>
                                <div class="col-md-4 col-sm-12 float-left mt-2">
                                    <div class="card">
                                        <img class="card-img-top" src="../images/<?php echo $row['image']?>" style="height: 200px">
                                        <div class="card-body" style="background-color: inherit">
                                            <div class="form-group">
                                                <label><span class="font-weight-bold">Student Name: </span> <span class="text-capitalize"><?php echo $row['student_name'];?> </span></label><br/>
                                                <label><span class="font-weight-bold">Department: </span> <span class="text-capitalize"><?php echo $row['dept'];?> </span></label><br/>
                                                <label><span class="font-weight-bold">Book Name: </span> <?php echo $row['book_name'];?> </label><br/>
                                                <label><span class="font-weight-bold">Author Name: </span> <?php echo $row['author_name'];?></label><br/>
                                                <label><span class="font-weight-bold">Past Price: </span> <?php echo $row['past_price'];?> </label><br/>
                                                <label><span class="font-weight-bold">Present Price: </span> <?php echo $row['present_price'];?> </label><br/>
                                                <label><span class="font-weight-bold">Post Date: </span> <?php echo $row['date'];?></label><br/>
                                                <label class="text-justify"><span class="font-weight-bold">Description: </span> <?php echo $row['description'];?> </label><br/>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <a href="buy_now.php?sell_id=<?php echo $row['sell_id'];?>"><button class="btn btn-info btn-group-lg">Buy Now</button></a>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                        </div>
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