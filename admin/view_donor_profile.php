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
                <li class="breadcrumb-item active">Manage Donor</li>
            </ol>

            <!-- Icon Cards-->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 mb-5">
                        <div class="card">
                            <?php
                            if (isset($_GET['profile'])){
                                $id = $_GET['profile'];


//                                $q = "SELECT c.* , s.* FROM enroll_course c INNER JOIN students s WHERE c.student_id=s.id";

                                $q = "SELECT * FROM doner WHERE id = $id";
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
                                        <a href="block_unblock_donor.php?status=<?php echo $data['id'];?>" onclick="return confirm('Block <?php echo $data['first_name'];?>')" ><button class="btn btn-danger col-7">Block</button></a>
                                        <?php
                                    }
                                    if (($status) == '1'){?>
                                        <a href="block_unblock_donor.php?status=<?php echo $data['id'];?>"  onclick="return confirm('UnBlock <?php echo $data['first_name'];?>')"><button class="btn btn-success col-7 ">Unblock</button></a>
                                        <?php
                                    }
                                    ?>
                                </div>


                                <div class="col-md-8 col-sm-12 float-left">
                                    <div class="table-responsive">
                                        <table class="table tab-pane">
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
                                        </table>
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

