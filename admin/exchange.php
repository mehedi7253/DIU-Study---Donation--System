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
                <li class="breadcrumb-item active">Add Notice</li>
            </ol>

            <!-- Icon Cards-->
            <!-- add donor-->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mx-auto mt-5 mb-5">
                        <div class="card">
                            <div class="card-header bg-info text-white">
                                <h2 class="text-center">Exchange history</h2>
                                <?php
                                $sql = "SELECT * FROM rechive_exchange";
                                $fetchs = mysqli_query($connect, $sql);
                                ?>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Student Name</th>
                                            <th>Book Name</th>
                                            <th>Author Name</th>
                                            <th>Amount</th>
                                            <th>Transation ID</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 1;
                                        while ($fetch = mysqli_fetch_assoc($fetchs)){?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                <td><?php echo $fetch['student_name'];?></td>
                                                <td><?php echo $fetch['exchanger_contact'];?></td>
                                                <td><?php echo $fetch['exchange_with'];?></td>
                                                <td><?php echo $fetch['description'];?></td>
                                                <td><?php echo $fetch['date'];?></td>
                                                <td><a href="../donor/uploads/<?php echo $fetch['filename']; ?>" target="_blank"><?php echo $fetch['filename'];?></a></td>
                                                <td>
                                                    <?php
                                                    $status = $fetch['status'];
                                                    // echo $status;

                                                    if (($status) == '0'){?>
                                                        <button class="btn btn-danger">Pending</button>
                                                        <?php
                                                    }
                                                    if (($status) == '1'){?>
                                                        <button class="btn btn-success">Received</button>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a class="float-right nav-link" href="manage_notice.php">Manage Notice</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--            end add donor-->
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

