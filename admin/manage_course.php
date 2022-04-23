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
                            <h4> <i class="fas fa-table"></i> Manage Course</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                <?php
                                    $sql = "SELECT * FROM course";
                                    $res = mysqli_query($connect, $sql);
                                ?>
                            </p>
                           <div class="table-responsive">
                               <table class="table table-bordered">
                                   <tr>
                                       <th>Course Name</th>
                                       <th>Action</th>
                                   </tr>
                                   <?php while ($row = mysqli_fetch_assoc($res)){?>
                                       <tr>
                                           <td><?php echo $row['course_name'];?></td>
                                           <td>
                                               <a href="update_course.php?up=<?php echo $row['id'];?>" class="btn btn-info">Update</a>
                                               <a href="update_course.php?del=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
                                           </td>
                                       </tr>

                                   <?php }?>
                               </table>
                           </div>
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

