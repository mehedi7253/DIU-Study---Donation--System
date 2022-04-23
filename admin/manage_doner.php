<?php

session_start();
if (!isset($_SESSION['email'])){
    header('Location: admin_login.php');
}

require_once '../php/db_connect.php';


$sql = "SELECT * FROM doner";
$result = mysqli_query($connect, $sql);
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 mx-auto mb-5">
                        <div class="card mt-5">
                            <div class="card-header">
                                <h4> <i class="fas fa-table"></i> All Donor Information</h4>
                            </div>
                            <div class="card-body">
                                <?php while ($row = mysqli_fetch_assoc($result)){?>
                                    <div class="col-md-3 col-sm-12 float-left mt-2 mb-2">
                                        <div class="card">
                                            <img src="../images/<?php echo $row['image'];?>" style="height: 150px" class="img-fluid card-img-top">
                                        </div>
                                        <div class="card-body">
                                            <label class="text-capitalize"><span class="font-weight-bold">ID: </span><?php echo $row['id'];?></label><br/>
                                            <label class="text-capitalize"><span class="font-weight-bold">First Name: </span><?php echo $row['first_name'];?></label><br/>
                                            <label class="text-capitalize"><span class="font-weight-bold">Last Name: </span><?php echo $row['last_name'];?></label><br/>
                                            <label class="text-capitalize"><span class="font-weight-bold">Status: </span>
                                                <?php
                                                $status = $row['status'];
                                                // echo $status;

                                                if (($status) == '0'){?>
                                                    Block
                                                    <?php
                                                }
                                                if (($status) == '1'){?>
                                                    Unblock
                                                    <?php
                                                }
                                                ?>
                                            </label>
                                        </div>
                                        <div class="card-footer">
                                            <a href="view_donor_profile.php?profile=<?php echo $row['id'];?>" class="nav-link"><button class="btn btn-info btn-block">View profile</button></a>
                                        </div>
                                    </div>
                                <?php }?>
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

