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
                <div class="col-md-12 col-sm-12 mt-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-4 col-sm-12 float-left">
                                <div>
                                    <?php
                                    if (isset($_POST['pic'])){
                                        $fileinfo = PATHINFO($_FILES['image']['name']);
                                        $newfilename  = $fileinfo['filename']. "." .$fileinfo['extension'];
                                        move_uploaded_file($_FILES['image']['tmp_name'],"../images/" .$newfilename);
                                        $location = $newfilename;

                                        $update_profie_pic = "UPDATE students SET image = '$location' WHERE id = '$_SESSION[id]'";
                                        mysqli_query($connect, $update_profie_pic);


                                        $sql = "SELECT * FROM students WHERE id = '$_SESSION[id]'";
                                        $records = mysqli_query($connect, $sql);
                                        $count = mysqli_num_rows($records);

                                        if ($count == 1) {
                                            $row = mysqli_fetch_array($records);
                                            echo " $userdata[image]";

//                                            header('Location:student_dasboard.php');
                                            echo "<script>document.location.href='student_dasboard.php'</script>";

                                        }


                                    }
                                    ?>
                                </div>

                                <p class="text-center"><img class="img-fluid" src="../images/<?php echo $userdata['image'] ?>" title="<?php echo $userdata['first_name']?>" alt="card image" style="height: 250px; width: 100%"></p>

                                <div class="text-center font-weight-bold">
                                    <label>
                                        <th> Name :</th>
                                        <td class="font-weight-bold text-capitalize"><?php echo $userdata['first_name']; ?> <?php echo $userdata['last_name']; ?></td>
                                    </label><br/>
                                    <label>
                                        <th>Email :</th>
                                        <td class="font-weight-bold"><?php echo $userdata['username']; ?></td>
                                    </label><br/>
                                </div>


                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group mt-3">
                                        <input type="file" name="image">
                                        <input type="submit" name="pic" value="Update profile Picture" class="btn btn-success mt-3">
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-8 col-sm-12 float-left">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th>Student ID :</th>
                                            <td class="font-weight-bold"><?php echo $userdata['id']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Department  </th>
                                            <td class="font-weight-bold"><?php echo $userdata['depertment']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Course Taken  </th>
                                            <?php
                                                $student_id = $userdata['id'];
                                                $get_course = "SELECT students.id, enroll_course.course_name FROM students INNER JOIN enroll_course ON enroll_course.student_id = students.id WHERE student_id= '$student_id'";
                                                $result     = mysqli_query($connect, $get_course);
                                                $course_data = mysqli_fetch_assoc($result);
                                            ?>
                                            <td class="font-weight-bold"><?php echo $course_data['course_name']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Date Of Birth  </th>
                                            <td class="font-weight-bold"><?php echo $userdata['dob']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Gender  </th>
                                            <td class="font-weight-bold"><?php echo $userdata['gender']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Address  </th>
                                            <td class="font-weight-bold"><?php echo $userdata['address']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Phone Number  </th>
                                            <td class="font-weight-bold"><?php echo $userdata['contact']; ?></td>
                                        </tr>

                                        <tr>
                                            <th>Father Name  </th>
                                            <td class="font-weight-bold"><?php echo $userdata['fathername']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Mother Name  </th>
                                            <td class="font-weight-bold"><?php echo $userdata['mothername']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Father Number  </th>
                                            <td class="font-weight-bold"><?php echo $userdata['fatherphone']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Mother Number  </th>
                                            <td class="font-weight-bold"><?php echo $userdata['motherphone']; ?></td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
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

