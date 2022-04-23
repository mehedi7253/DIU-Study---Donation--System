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
                <li class="breadcrumb-item active">Approve Donation Post</li>
            </ol>

            <!-- Icon Cards-->
            <!-- add Teachers-->
            <div class="container">
                <div class="row">
                    <?php
                    $sql = "SELECT * FROM donation";
                    $res = mysqli_query($connect, $sql);
                    ?>
                    <div class="form_1">
                        <?php while ($row = mysqli_fetch_assoc($res)){?>
                            <div class="col-md-4 col-sm-12 float-left mt-2">
                                <div class="card">
                                    <img class="card-img-top" src="../images/<?php echo $row['image']?>" style="height: 200px">
                                    <div class="card-body" style="background-color: inherit">
                                        <div class="form-group">
                                            <label><span class="font-weight-bold">Student Name: </span> <span class="text-capitalize"><?php echo $row['student_name'];?> </span></label><br/>
                                            <label><span class="font-weight-bold">Department: </span> <span class="text-capitalize"><?php echo $row['depertment'];?> </span></label><br/>
                                            <label><span class="font-weight-bold">Book Name: </span> <?php echo $row['book'];?> </label><br/>
                                            <label><span class="font-weight-bold">Author Name: </span> <?php echo $row['author'];?></label><br/>
                                            <label><span class="font-weight-bold">Donate Condition: </span> <?php echo $row['donet_condition'];?> </label><br/>
                                            <label><span class="font-weight-bold">Post Date: </span> <?php echo $row['date'];?></label><br/>
                                            <label class="text-justify"><span class="font-weight-bold">Description: </span> <?php echo $row['description'];?> </label><br/>
                                        </div>
                                    </div>
                                    <div class="card-footer">

                                        <?php
                                        $status = $row['status'];
                                        // echo $status;

                                        if (($status) == '0'){?>
                                            <a href="update_donation_status.php?status=<?php echo $row['donet_id'];?>"><button class="btn btn-danger">Pending</button></a>
                                            <?php
                                        }
                                        if (($status) == '1'){?>
                                            <a href="update_donation_status.php?status=<?php echo $row['donet_id'];?>"><button class="btn btn-success">Apporved</button></a>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                </div>

            </div>
            <!--            end add Teachers-->
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

