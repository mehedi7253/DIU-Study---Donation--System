<?php

session_start();
if (!isset($_SESSION['email'])){
    header('Location: admin_login.php');
}

require_once '../php/db_connect.php';




    if(isset($_GET['up'])){
        $id = $_GET['up'];

        $sql = "SELECT * FROM course WHERE id=$id";

        $res = mysqli_query($connect, $sql);
        $data = mysqli_fetch_assoc($res);

    }
    if ($_POST) {
        $course_name = $_POST['course_name'];

        $sql = "UPDATE course SET course_name = '$course_name'  WHERE id = $id";

        $res = mysqli_query($connect, $sql);


        header('Location: manage_course.php');
    }


    if (isset($_GET['del'])) {
        $id = $_GET['del'];

        $sql = "DELETE FROM course WHERE id = $id";

        $result = mysqli_query($connect, $sql);

        header('Location:manage_course.php');
    }
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
                <li class="breadcrumb-item active">Update Course</li>
            </ol>

            <!-- Icon Cards-->
            <!-- add course-->
            <div class="row">
                <div class="col-md-10 mx-auto mt-5 mb-5">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h4> <i class="fas fa-table"></i> Update Course</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Course Name: </label>
                                    <input name="id" hidden value="<?php echo $data['id'];?>">
                                    <input type="text" name="course_name" class="form-control" value="<?php echo $data['course_name'];?>">
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


