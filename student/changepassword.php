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
                <div class="col-md-10 mx-auto mt-5 mb-5">
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
                                                    echo "<span class='text-danger'>Failed...</span> <br/>";
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
                            <a href="student_dasboard.php"><button type="button" class="btn btn-info float-right">Back</button></a>
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










