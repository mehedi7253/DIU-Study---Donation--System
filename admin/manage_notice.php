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
                <li class="breadcrumb-item active">Manage Notice</li>
            </ol>

            <!-- Icon Cards-->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 mt-5 mb-5">
                        <div class="card">
                            <div class="card-header">
                                <h4> <i class="fas fa-table"></i> All Notice</h4>
                                <?php
                                    $sql = "SELECT * FROM notice";
                                    $result = mysqli_query($connect, $sql);
                                ?>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Notice</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <?php while ($row = $result->fetch_assoc()) {?>
                                            <tbody>
                                            <tr>
                                                <td><?php echo $row['notice_title']; ?></td>
                                                <td><?php echo $row['notice']; ?></td>
                                                <td>
                                                    <a href="notice_del.php?del=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
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

