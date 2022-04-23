<?php

    //connect with database
    require_once '../php/teacher_config.php';

    // check user login via session
    if(not_logged_in() === TRUE) {
        header('location: teacher_login.php');
    }

    $userdata = getUserDataByUserId($_SESSION['id']); //get all information by user id

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit <?php echo $userdata['first_name'];?>'s Information</title>
    <link rel="stylesheet" href="../assets/style/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="../assets/style/style.css" type="text/css" />
    <link rel="icon" href="../images/<?php echo $userdata['image'];?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>
<body>
    <!--Start menu section-->
    <?php include 'nav_bar.php'?>
    <!--end menu section-->

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 mt-5 mb-5">
                <div class="col-md-4 col-sm-12 float-left mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h3>Wellcome <span class="float-right text-success"><?php echo $userdata['first_name']; ?></span></h3>
                        </div>
                        <div class="card-body">
                            <a href="teacher_dasboard.php" class="nav-link card-symbol"><span class="card_view"><i class="fas fa-eye" style="color: green;"></i><span class="ml-3">View Profile</span></span></a>
                            <a href="edit_teacher_info.php" class="nav-link card-symbol"><i class="fas fa-user-edit" style="color: red"></i><span class="card_view"><span class="ml-3">Update Profile</span></span></a>
                            <a href="changepassword.php" class="nav-link card-symbol"><i class="fas fa-unlock-alt" style="color: rebeccapurple"></i><span class="card_view"><span class="ml-3">Change Password</span></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-12 float-left mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Update Your Information</h1>

                            <?php


                            if($_POST) {
                                $fname       = $_POST['fname'];
                                $lname       = $_POST['lname'];
                                $contact     = $_POST['contact'];
                                $subject_teach = $_POST['subject_teach'];
                                $address     = $_POST['address'];
                                $exp         = $_POST['exp'];
                                $ssc         = $_POST['ssc'];
                                $ssc_sub     = $_POST['ssc_sub'];
                                $ssc_inis    = $_POST['ssc_inis'];
                                $ssc_res     = $_POST['ssc_res'];
                                $ssc_pass_year = $_POST['ssc_pass_year'];
                                $ssc_award   = $_POST['ssc_award'];
                                $hsc         = $_POST['hsc'];
                                $hsc_sub     = $_POST['hsc_sub'];
                                $hsc_inis    = $_POST['hsc_inis'];
                                $hsc_res     = $_POST['hsc_res'];
                                $hsc_pass_year = $_POST['hsc_pass_year'];
                                $hsc_award   = $_POST['hsc_award'];
                                $hons        = $_POST['hons'];
                                $hons_sub     = $_POST['hons_sub'];
                                $hons_inis    = $_POST['hons_inis'];
                                $hons_res     = $_POST['hons_res'];
                                $hons_pass_year = $_POST['hons_pass_year'];
                                $hons_award   = $_POST['hons_award'];
                                $msc       = $_POST['msc'];
                                $msc_sub     = $_POST['msc_sub'];
                                $msc_inis    = $_POST['msc_inis'];
                                $msc_res     = $_POST['msc_res'];
                                $msc_pass_year = $_POST['msc_pass_year'];
                                $msc_award   = $_POST['mscc_award'];


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
                                    <label for="username">NID</label>
                                    <input type="text" class="form-control" name="nid" id="nid" title="You Can not update Your @Email address" placeholder="Email" disabled formtarget="uu" value=" <?php echo $userdata['nid'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Course Take</label>
                                    <input type="text" class="form-control" name="subject_teach" id="subject_teach" value="<?php if($_POST) {
                                        echo $_POST['subject_teach'];
                                    } else {
                                        echo $userdata['subject_teach'];
                                    } ?>">
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="<?php if($_POST) {
                                        echo $_POST['address'];
                                    } else {
                                        echo $userdata['address'];
                                    } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Expreance</label>
                                    <input type="text" class="form-control" name="exp" id="address" placeholder="Address" value="<?php if($_POST) {
                                        echo $_POST['exp'];
                                    } else {
                                        echo $userdata['exp'];
                                    } ?>">
                                </div>

                                <h3 class="mt-3 mb-4 text-center">Education Background</h3>
                                <div class="form-group">
                                    <label for="address">Exam</label>
                                    <input type="text" class="form-control" name="ssc" placeholder="Example: SSC" value="<?php if($_POST) {
                                        echo $_POST['ssc'];
                                    } else {
                                        echo $userdata['ssc'];
                                    } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Subject</label>
                                    <input type="text" class="form-control" name="ssc_sub" placeholder="Example: Science" value="<?php if($_POST) {
                                        echo $_POST['ssc_sub'];
                                    } else {
                                        echo $userdata['ssc_sub'];
                                    } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Institute</label>
                                    <input type="text" class="form-control" name="ssc_inis" placeholder="School Name" value="<?php if($_POST) {
                                        echo $_POST['ssc_inis'];
                                    } else {
                                        echo $userdata['ssc_inis'];
                                    } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Result</label>
                                    <input type="text" class="form-control" name="ssc_res" placeholder="Example: A+" value="<?php if($_POST) {
                                        echo $_POST['ssc_res'];
                                    } else {
                                        echo $userdata['ssc_res'];
                                    } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Passing Year</label>
                                    <input type="text" class="form-control" name="ssc_pass_year"  value="<?php if($_POST) {
                                        echo $_POST['ssc_pass_year'];
                                    } else {
                                        echo $userdata['ssc_pass_year'];
                                    } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Awards</label>
                                    <input type="text" class="form-control" name="ssc_award" placeholder="Example: HIgest Marks Achieve" value="<?php if($_POST) {
                                        echo $_POST['ssc_award'];
                                    } else {
                                        echo $userdata['ssc_award'];
                                    } ?>">
                                </div>


                                <div class="form-group">
                                    <label for="address">Exam</label>
                                    <input type="text" class="form-control" name="hsc" placeholder="Example: HSC" value="<?php if($_POST) {
                                        echo $_POST['hsc'];
                                    } else {
                                        echo $userdata['hsc'];
                                    } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Subject</label>
                                    <input type="text" class="form-control" name="hsc_sub" placeholder="Example: Science" value="<?php if($_POST) {
                                        echo $_POST['hsc_sub'];
                                    } else {
                                        echo $userdata['hsc_sub'];
                                    } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Institute</label>
                                    <input type="text" class="form-control" name="hsc_inis" placeholder="College Name" value="<?php if($_POST) {
                                        echo $_POST['hsc_inis'];
                                    } else {
                                        echo $userdata['hsc_inis'];
                                    } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Result</label>
                                    <input type="text" class="form-control" name="hsc_res" placeholder="Example: A+" value="<?php if($_POST) {
                                        echo $_POST['hsc_res'];
                                    } else {
                                        echo $userdata['hsc_res'];
                                    } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Passing Year</label>
                                    <input type="text" class="form-control" name="hsc_pass_year"  value="<?php if($_POST) {
                                        echo $_POST['hsc_pass_year'];
                                    } else {
                                        echo $userdata['hsc_pass_year'];
                                    } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Awards</label>
                                    <input type="text" class="form-control" name="hsc_award" placeholder="Example: HIgest Marks Achieve" value="<?php if($_POST) {
                                        echo $_POST['hsc_award'];
                                    } else {
                                        echo $userdata['hsc_award'];
                                    } ?>">
                                </div>



                                <div class="form-group">
                                    <label for="address">Exam</label>
                                    <input type="text" class="form-control" name="hons" placeholder="Example: HSC" value="<?php if($_POST) {
                                        echo $_POST['hons'];
                                    } else {
                                        echo $userdata['hons'];
                                    } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Subject</label>
                                    <input type="text" class="form-control" name="hons_sub" placeholder="Example: CSE" value="<?php if($_POST) {
                                        echo $_POST['hons_sub'];
                                    } else {
                                        echo $userdata['hons_sub'];
                                    } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Institute</label>
                                    <input type="text" class="form-control" name="hons_inis" placeholder="Daffodil International University" value="<?php if($_POST) {
                                        echo $_POST['hons_inis'];
                                    } else {
                                        echo $userdata['hons_inis'];
                                    } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Result</label>
                                    <input type="text" class="form-control" name="hons_res" placeholder="Example: 3.50" value="<?php if($_POST) {
                                        echo $_POST['hons_res'];
                                    } else {
                                        echo $userdata['hons_res'];
                                    } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Passing Year</label>
                                    <input type="text" class="form-control" name="hons_pass_year"  value="<?php if($_POST) {
                                        echo $_POST['hons_pass_year'];
                                    } else {
                                        echo $userdata['hons_pass_year'];
                                    } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Awards</label>
                                    <input type="text" class="form-control" name="hons_award" placeholder="Example: HIgest Marks Achieve" value="<?php if($_POST) {
                                        echo $_POST['hons_award'];
                                    } else {
                                        echo $userdata['hons_award'];
                                    } ?>">
                                </div>




                                <div class="form-group">
                                    <label for="address">Exam</label>
                                    <input type="text" class="form-control" name="msc" placeholder="Example: HSC" value="<?php if($_POST) {
                                        echo $_POST['msc'];
                                    } else {
                                        echo $userdata['msc'];
                                    } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Subject</label>
                                    <input type="text" class="form-control" name="msc_sub" placeholder="Example: MSC In Computer Science" value="<?php if($_POST) {
                                        echo $_POST['msc_sub'];
                                    } else {
                                        echo $userdata['msc_sub'];
                                    } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Institute</label>
                                    <input type="text" class="form-control" name="msc_inis" placeholder="Dhaka University" value="<?php if($_POST) {
                                        echo $_POST['msc_inis'];
                                    } else {
                                        echo $userdata['msc_inis'];
                                    } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Result</label>
                                    <input type="text" class="form-control" name="msc_res" placeholder="Example: 3.80" value="<?php if($_POST) {
                                        echo $_POST['msc_res'];
                                    } else {
                                        echo $userdata['msc_res'];
                                    } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Passing Year</label>
                                    <input type="text" class="form-control" name="msc_pass_year"  value="<?php if($_POST) {
                                        echo $_POST['msc_pass_year'];
                                    } else {
                                        echo $userdata['msc_pass_year'];
                                    } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Awards</label>
                                    <input type="text" class="form-control" name="msc_award" placeholder="Example: HIgest Marks Achieve" value="<?php if($_POST) {
                                        echo $_POST['msc_award'];
                                    } else {
                                        echo $userdata['msc_award'];
                                    } ?>">
                                </div>




                                <div>
                                    <button type="submit" class="btn btn-success btn-block">Update</button>
                                </div>

                            </form>
                        </div>


                        <div class="card-footer">
                            <a href="teacher_dasboard.php" class="float-right"><button type="button" class="btn btn-info">Back</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer bg-dark">
        <div class="container">
            <div class="row">
                <div class="footer-text col-md-12 col-sm-12">
                    <p class="text-white text-capitalize text-center font-italic p-4">Create By  <strong>@Israt Jahan</strong></p>
                </div>
            </div>
        </div>
    </div>



    <script src="../assets/js/bootstrap.js"></script>
</body>
</html>