<?php include "mastering/header.php"?>

<body id="page-top">

<?php include "mastering/nav.php"?>


<div id="wrapper">

    <!-- Sidebar -->
    <?php include "mastering/side_bar.php"?>
    <!-- end slide bar-->

    <div id="content-wrapper">


        <!--        main content -->
        <!--content section-->
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
                                $dob         = $_POST['dob']; // declare variable dob and put it into post method.
                                $gender      = $_POST['gender']; // declare variable gender and put it into post method.
                                $fathername  = $_POST['fathername']; // declare variable fathername and put it into post method.
                                $mothername  = $_POST['mothername']; // declare variable mothername and put it into post method.
                                $fatherphone = $_POST['fatherphone']; // declare variable fatherphone and put it into post method.
                                $motherphone = $_POST['motherphone']; // declare variable motherphone and put it into post method.


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

                                //check dob is required
                                if($dob == "") {
                                    echo "<span class='text-danger'> * Date of birth  is Required</span> <br />";
                                }

                                //check gender is required
                                if($gender == "") {
                                    echo "<span class='text-danger'> * Gender is Required</span> <br />";
                                }
                                //check fathername is required
                                if($fathername == "") {
                                    echo "<span class='text-danger'> * Father Name is Required</span> <br />";
                                }

                                //check mothername is required
                                if($mothername == "") {
                                    echo "<span class='text-danger'> * Mother Name is Required</span> <br />";
                                }
                                //check fatherphone is required
                                if($fatherphone == "") {
                                    echo "<span class='text-danger'> * Father Phone Number is Required</span> <br />";
                                }

                                //check mother phone is required
                                if($motherphone == "") {
                                    echo "<span class='text-danger'> * Mother Phone Number is Required</span> <br />";
                                }

                                //here  check all user  information. if user coorectly input their information message will be shown  Successfully Updated other wise not.
                                if($fname && $lname  && $contact && $address && $dob && $gender && $fathername && $mothername && $fatherphone && $motherphone) {
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
                                <div class="form-group">
                                    <label for="address">Date of Birth</label>
                                    <input type="date" class="form-control" name="dob" value="<?php if($_POST) {
                                        echo $_POST['dob'];
                                    } else {
                                        echo $userdata['dob'];
                                    } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Gender : </label> <br/>
                                    <label class="radio-inline"><input type="radio" name="gender" value="Male">Male</label>
                                    <label class="radio-inline"><input type="radio" name="gender" value="Female">Female</label>
                                </div>
                                <hr/>
                                <div>
                                    <h4 class="text-center mt-5 mb-4">Gurdian Information</h4>
                                    <hr/>
                                </div>
                                <div class="form-group">
                                    <label for="address">Father Name</label>
                                    <input type="text" class="form-control" name="fathername" id="fathername" placeholder="Father Name" value="<?php if($_POST) {
                                        echo $_POST['fathername'];
                                    } else {
                                        echo $userdata['fathername'];
                                    } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Mother Name</label>
                                    <input type="text" class="form-control" name="mothername" id="MotherName" placeholder="Mother Name" value="<?php if($_POST) {
                                        echo $_POST['mothername'];
                                    } else {
                                        echo $userdata['mothername'];
                                    } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Father Phone Number</label>
                                    <input type="number" class="form-control" name="fatherphone" id="fatherphone" placeholder="Father Phone" value="<?php if($_POST) {
                                        echo $_POST['fatherphone'];
                                    } else {
                                        echo $userdata['fatherphone'];
                                    } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Mother Phone Number</label>
                                    <input type="number" class="form-control" name="motherphone" id="motherphone" placeholder="Mother Phone" value="<?php if($_POST) {
                                        echo $_POST['motherphone'];
                                    } else {
                                        echo $userdata['motherphone'];
                                    } ?>">
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-success btn-block">Update</button>
                                </div>

                            </form>
                        </div>


                        <div class="card-footer">
                            <a href="student_dasboard.php" class="float-right"><button type="button" class="btn btn-info">Back</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

            <!--end main content -->






            <!-- Sticky Footer -->
            <?php include "mastering/footer.php" ?>

        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->


    <!--    script-->
    <?php include "mastering/script.php"?>
