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
                <li class="breadcrumb-item active">Add New Course</li>
            </ol>

            <!-- Icon Cards-->
            <!-- add course-->
            <div class="row">
                <div class="col-md-10 mx-auto mt-5 mb-5">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h4> <i class="fas fa-table"></i> Add New Course</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                <?php
                                if (isset($_POST['btn'])){
                                    $course_name  = $_POST['course_name'];

                                    if ($course_name == ""){
                                        echo "<span class='text-danger'>Enter Course Name</span><br/>";
                                    }
                                    if ($course_name){
                                        $sql = "INSERT INTO course (course_name) VALUES ('$course_name')";
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
                                    <label>Course Name: </label>
                                    <input type="text" name="course_name" placeholder="Enter Course Name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label</label>
                                    <input type="submit" name="btn" class="btn btn-success" value="Add Course">
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

