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
                <li class="breadcrumb-item active">Manage Teacher's</li>
            </ol>

            <!-- Icon Cards-->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 mt-5 mb-5">
                        <div class="card">
                            <div class="card-header">
                                <h4> <i class="fas fa-table"></i> All Teacher's Information</h4>
                                <?php
                                    $sql = "SELECT * FROM teachers";
                                    $result = mysqli_query($connect, $sql);
                                ?>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>FIrst Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                            <th>Visit Profile</th>
                                        </tr>
                                        </thead>
                                        <?php while ($row = $result->fetch_assoc()) {?>
                                            <tbody>
                                            <tr>
                                                <td><?php echo $row['first_name']; ?></td>
                                                <td><?php echo $row['last_name']; ?></td>
                                                <td><?php echo $row['username']; ?></td>
                                                <td>
                                                    <?php
                                                    $status = $row['status'];
                                                    // echo $status;

                                                    if (($status) == '0'){?>
                                                        <a href="block_unblock_teacher.php?status=<?php echo $row['id'];?>" onclick="return confirm('Block <?php echo $row['first_name'];?>')"><button class="btn btn-danger">Block</button></a>
                                                        <?php
                                                    }
                                                    if (($status) == '1'){?>
                                                        <a href="block_unblock_teacher.php?status=<?php echo $row['id'];?>"  onclick="return confirm('UnBlock <?php echo $row['first_name'];?>')"><button class="btn btn-success">Unblock</button></a>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="teacher_profile.php?profile=<?php echo $row['id'];?>"><button class="btn btn-info">View Profile</button></a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        <?php }?>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="admin_dasboard.php" class="nav-link text-info">Back</a>
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

