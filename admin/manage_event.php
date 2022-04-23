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
                <li class="breadcrumb-item active">Manage Event</li>
            </ol>

            <!-- Icon Cards-->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 mb-5">
                        <?php
                        $sselect_doenor = "SELECT * FROM event";
                        $res = mysqli_query($connect, $sselect_doenor);
                        ?>

                        <?php while ($row = mysqli_fetch_assoc($res)){?>
                            <div class="col-md-4 col-sm-12 mt-5 float-left">
                                <div class="card">
                                    <img class="card-img-top" src="../images/<?php echo $row['image'];?>" style="height: 200px">
                                    <div class="card-body">
                                        <p class="mt-3 font-weight-bold">Event Title: <span class="font-weight-normal"><?php echo $row['event_title'];?> </span></p>
                                        <p class="mt-3 font-weight-bold">Event Description: <span class="font-weight-normal text-justify"><?php echo $row['event_desc'];?> </span></p>
                                        <p class="mt-3 font-weight-bold">Start Date: <span class="font-weight-normal"><?php echo $row['start_date'];?> </span></p>
                                        <p class="mt-3 font-weight-bold">Department: <span class="font-weight-normal"><?php echo $row['depertment'];?> </span></p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="event_up_del.php?event_up=<?php echo $row['id'];?>"><button class="btn btn-success col-5">Update</button></a>
                                        <a href="event_up_del.php?event_del=<?php echo $row['id'];?>"><button class="btn btn-danger col-5">Delete</button></a>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
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

