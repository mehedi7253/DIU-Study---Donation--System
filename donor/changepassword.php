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
                <div class="col-md-10 mx-auto mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Change Your Password</h1>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

                                <!--     start php code-->
                                <?php
                                if($_POST) {
                                    $currentpassword = $_POST['currentpassword']; //declare variable currentpassword
                                    $newpassword = $_POST['password']; // //declare variable newpassword
                                    $conformpassword = $_POST['conformpassword']; //declare variable confirmpassword

                                    //check error ..if current password is match then user can enter their new password
                                    //here check current password is match? other wise message will show
                                    if($currentpassword == "") {
                                        echo "<span class='text-danger'> * Current Password field is required</span> <br/>";
                                    }

                                    //here check new password other wise message will show
                                    if($newpassword == "") {
                                        echo "<span class='text-danger'> * New Password is required</span> <br/>";
                                    }

                                    //here check new password is match with confirm password? other wise message will show
                                    if($conformpassword == "") {
                                        echo "<span class='text-danger'> * Confirm Password field is required</span> <br/>";
                                    }

                                    //if current password new password and confirm password will match then show message password update other wise not.
                                    if($currentpassword && $newpassword && $conformpassword) {
                                        if(passwordMatch($_SESSION['id'], $currentpassword) === TRUE) {

                                            if($newpassword != $conformpassword) {
                                                echo "New password does not match conform password <br />";
                                            } else {
                                                if(changePassword($_SESSION['id'], $newpassword) === TRUE) {
                                                    echo "<span class='text-success'>Successfully updated</span> <br/>";
                                                } else {
                                                    echo "<span class='text-danger'>Failed to updated</span> <br/>";
                                                }
                                            }

                                        } else {
                                            echo "<span class='text-danger'>Current Password is incorrect </span><br />";
                                        }
                                    }
                                }

                                ?>

                                <!-- end php code-->

                                <div class="form-group">
                                    <label>Current Password</label>
                                    <input type="password" name="currentpassword" autocomplete="off" placeholder="Current Password" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" name="password" autocomplete="off" placeholder="New Password" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>Confirm password</label>
                                    <input type="password" name="conformpassword" autocomplete="off" placeholder="Confrom Password" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success btn-block" type="submit">Change Password</button>
                                </div>
                            </form>
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