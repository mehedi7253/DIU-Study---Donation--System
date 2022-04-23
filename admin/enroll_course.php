<?php

session_start();
if (!isset($_SESSION['email'])){
    header('Location: admin_login.php');
}

require_once '../php/db_connect.php';

?>
<?php include "front/header.php"; ?>

<body id="page-top">

<?php include "front/nav.php";?>



<div id="wrapper">
    <?php include "front/sidebar.php";?>

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Enroll Course</li>
            </ol>

            <!-- Icon Cards-->
            <!-- add course-->
            <div class="row">
                <div class="col-md-10 mx-auto mt-5 mb-5">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h4> <i class="fas fa-table"></i> Enroll Course</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                <?php
                                if (isset($_POST['btn'])){
                                    $course_name  = $_POST['course_name'];
                                    $student_id   = $_POST['student_id'];
                                    $teacher      = $_POST['teacher'];

                                    $chkNew  = " ";
                                    foreach ($course_name as $chkNew1){
                                        $chkNew .= $chkNew1 .", ";
                                    }

                                    if ($course_name == ""){
                                        echo "<span class='text-danger'>Enter Course Name</span><br/>";
                                    }
                                    if ($course_name){
                                        $created = @date('Y-m-d H:i:s');

                                        $sql = "INSERT INTO enroll_course (course_name, student_id, teacher, date) VALUES ('$chkNew', '$student_id', '$teacher', '$created')";
                                        $res = mysqli_query($connect, $sql);

                                        echo "<span class='text-success'>Added Successful</span><br/>";
                                    }else{
                                        echo "<span class='text-danger'>Failed Added </span><br/>";

                                    }
                                }
                                ?>
                            </p>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Select Teacher</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="teacher">
                                        <option selected>------Select Teacher---------</option>
                                        <P>
                                            <?php
                                            $sql = "SELECT * FROM teachers";
                                            $result = mysqli_query($connect, $sql);
                                            ?>
                                        </P>
                                        <?php while ($row = mysqli_fetch_assoc($result)){?>
                                            <option value="<?php echo $row['first_name'];?>"><?php echo $row['first_name'];?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Student ID: </label>
                                    <input type="text" name="student_id" placeholder="Enter Student ID" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Select Course: </label><br/>

                                    <?php
                                    $sql = "SELECT * FROM course";
                                    $result = mysqli_query($connect, $sql);
                                    ?>
                                    <?php while ($row = mysqli_fetch_assoc($result)){?>
                                        <input type="checkbox" name="course_name[]" value="<?php echo $row['course_name']?>"> <?php echo $row['course_name']?><br/>
                                    <?php }?>

                                </div>
                                <div class="form-group">
                                    <label</label>
                                    <input type="submit" name="btn" class="btn btn-success" value="Enroll Now">
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <a href="admin_dashboard.php" class="nav-link text-info">Back</a>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end add course-->
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Create by@ Majadur</span>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- /#wrapper -->


<?php include "front/footer.php";?>
</body>
</html>

