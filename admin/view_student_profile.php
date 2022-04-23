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
                <li class="breadcrumb-item active">Manage Students</li>
            </ol>

            <!-- Icon Cards-->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 mt-5 mb-5">
                        <div class="card">
                            <?php
                            if (isset($_GET['profile'])){
                                $id = $_GET['profile'];


//                                $q = "SELECT c.* , s.* FROM enroll_course c INNER JOIN students s WHERE c.student_id=s.id";

                                $q = "SELECT * FROM students WHERE id = $id";
                                $r = mysqli_query($connect, $q);
                                $data = mysqli_fetch_assoc($r);
                            }
                            ?>
                            <div class="card-header">
                                <h4 class="text-info font-weight-bold mb-3"><?php echo $data['first_name']?> <span><?php echo $data['last_name']?></span> Information</h4>
                            </div>
                            <div class="card-body">
                                <div class="col-md-4 col-sm-12 float-left">
                                    <img class="img-fluid" src="../images/<?php echo $data['image'];?>" style="height: 300px;">
                                    <br/>
                                    <br/>
                                    <?php
                                    $status = $data['status'];
                                    // echo $status;

                                    if (($status) == '0'){?>
                                        <a href="block_unblock.php?status=<?php echo $data['id'];?>" onclick="return confirm('Block <?php echo $data['first_name'];?>')" ><button class="btn btn-danger col-7">Block</button></a>
                                        <?php
                                    }
                                    if (($status) == '1'){?>
                                        <a href="block_unblock.php?status=<?php echo $data['id'];?>"  onclick="return confirm('UnBlock <?php echo $data['first_name'];?>')"><button class="btn btn-success col-7 ">Unblock</button></a>
                                        <?php
                                    }
                                    ?>
                                </div>


                                <div class="col-md-8 col-sm-12 float-left">
                                    <div class="table-responsive">
                                        <table class="table tab-pane">
                                            <tr>
                                                <th>Student ID: </th>
                                                <td><?php echo $data['id'];?></td>
                                            </tr>
                                            <tr>
                                                <th>Email: </th>
                                                <td><?php echo $data['username'];?></td>
                                            </tr>
                                            <tr>
                                                <th>Phone Number: </th>
                                                <td><?php echo $data['contact'];?></td>
                                            </tr>
                                            <tr>
                                                <th>Address: </th>
                                                <td><?php echo $data['address'];?></td>
                                            </tr>
                                            <tr>
                                                <th>Date Of Birth: </th>
                                                <td><?php echo $data['dob'];?></td>
                                            </tr>
                                            <tr>
                                                <th>Gender: </th>
                                                <td><?php echo $data['gender'];?></td>
                                            </tr>
                                            <tr>
                                                <?php
                                                    $sql = "SELECT c.* , s.* FROM enroll_course c INNER JOIN students s ON c.student_id=$id";

                                                    $res = mysqli_query($connect, $sql);
                                                ?>

                                                <th>Course Name: </th>
                                                <?php while ($row = mysqli_fetch_assoc($res)){?>
                                                    <td>
                                                        <p><?php echo $row['course_name'];?>,</p>
                                                    </td>
                                                <?php }?>
                                            </tr>
<!--                                            <tr>-->
<!--                                                <th>Teacher Name: </th>-->
<!--                                                <td>--><?php //echo $data['teacher'];?><!--</td>-->
<!--                                            </tr>-->
                                        </table>
                                        <h3 class="text-center font-weight-bold mb-5">Gurdian Information</h3>
                                        <div class="table-responsive">
                                            <table class="table tab-pane">
                                                <tr>
                                                    <th>Father Name: </th>
                                                    <td><?php echo $data['fathername'];?></td>
                                                </tr>
                                                <tr>
                                                    <th>Father Phone Number: </th>
                                                    <td><?php echo $data['fatherphone'];?></td>
                                                </tr>
                                                <tr>
                                                    <th>Mother Name: </th>
                                                    <td><?php echo $data['mothername'];?></td>
                                                </tr>
                                                <tr>
                                                    <th>Mother Phone Number: </th>
                                                    <td><?php echo $data['motherphone'];?></td>
                                                </tr>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="admin_dashboard.php" class="nav-link text-info">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

