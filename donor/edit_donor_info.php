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
                            <h1 class="text-center">Update Your Information</h1>
                            <?php


                            if($_POST) {
                                $fname       = $_POST['fname']; // declare variable fname and put it into post method.
                                $lname       = $_POST['lname']; // declare variable lname and put it into post method.
                                $contact     = $_POST['contact']; // declare variable contact and put it into post method.
                                $address     = $_POST['address']; // declare variable address and put it into post method.

                                //check error
                                //check filename is required
                                if($fname == "") {
                                    echo "<span class='text-danger'> * First Name is Required</span> <br />";
                                }

                                //check lastname is required
                                if($lname == "") {
                                    echo "<span class='text-danger'> * Last Name is Required</span> <br />";
                                }


                                //check contact is required
                                if($contact == "") {
                                    echo "<span class='text-danger'> * Contact is Required</span> <br />";
                                }

                                //check address is required
                                if($address == "") {
                                    echo "<span class='text-danger'> * Address is Required</span> <br />";
                                }


                                //here  check all user  information. if user coorectly input their information message will be shown  Successfully Updated other wise not.
                                if($fname && $lname  && $contact && $address) {
                                    $user_exists = users_exists_by_id($_SESSION['id'], $username);
                                    if($user_exists === TRUE) {
                                        echo "username already exists <br /> ";
                                    } else {
                                        if(updateInfo($_SESSION['id']) === TRUE) {
                                            echo "<h3 class='text-success mt-5'>Successfully Updated</h3> <br />";
                                        } else {
                                            echo "<span class='text-danger'>Error while updating the information</span>";
                                        }
                                    }
                                }

                            }
                            ?>
                        </div>
                        <div class="card-body">

                            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                                <div class="form-group">
                                    <label for="username">Email</label>
                                    <input type="text" class="form-control" name="username" id="username" title="You Can not update Your @Email address" placeholder="Email" disabled formtarget="uu" value=" <?php echo $userdata['username'] ?>">
                                </div>


                                <div class="form-group">
                                    <label for="fname">First Name</label>
                                    <input type="text" class="form-control" name="fname" id="fname" placeholder="Fisrt Name" value="<?php if($_POST) {
                                        echo $_POST['fname'];
                                    } else {
                                        echo $userdata['first_name'];
                                    } ?>">
                                </div>

                                <div class="form-group">
                                    <label for="lname">Last Name</label>
                                    <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" value="<?php if($_POST) {
                                        echo $_POST['lname'];
                                    } else {
                                        echo $userdata['last_name'];
                                    } ?>">
                                </div>

                                <div class="form-group">
                                    <label for="contact">Contact</label>
                                    <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact" value="<?php if($_POST) {
                                        echo $_POST['contact'];
                                    } else {
                                        echo $userdata['contact'];
                                    }  ?>">
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="<?php if($_POST) {
                                        echo $_POST['address'];
                                    } else {
                                        echo $userdata['address'];
                                    } ?>">
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-success btn-block">Update</button>
                                </div>

                            </form>
                        </div>


                        <div class="card-footer">
                            <a href="dashboard.php" class="float-right"><button type="button" class="btn btn-info">Back</button></a>
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