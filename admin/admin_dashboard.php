<?php
    session_start();
    if (!isset($_SESSION['email'])){
        header('Location: admin_login.php');
}

require_once '../php/db_connect.php';?>
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
                <li class="breadcrumb-item active">Overview</li>
            </ol>

            <!-- Icon Cards-->
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-comments"></i>
                            </div>
                            <div class="mr-5">
                                <?php
                                    $sql = "SELECT count(id) AS totatlTeacher FROM teachers"; //select all id from donor_php table
                                    $res = mysqli_query($connect, $sql);
                                    $values = mysqli_fetch_assoc($res);
                                    $num_rows = $values['totatlTeacher']; //toatal number of available data in database
                                    echo "<span style='font-size: 30px;'>$num_rows</span>"; //print data
                                ?>

                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="manage_teacher.php">
                            <span class="float-left">Total Teacher</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-warning o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-list"></i>
                            </div>
                            <div class="mr-5">
                                <?php
                                    $sql = "SELECT count(id) AS application FROM application"; //select all id from donor_php table
                                    $res = mysqli_query($connect, $sql);
                                    $values = mysqli_fetch_assoc($res);
                                    $num_rows = $values['application']; //toatal number of available data in database
                                    echo "<span style='font-size: 30px;'>$num_rows</span>"; //print data
//                                ?>
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="manage_application.php">
                            <span class="float-left">New Application</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-shopping-cart"></i>
                            </div>
                            <div class="mr-5">
                                <?php
                                    $sql = "SELECT count(id) AS total_user FROM students"; //select all id from donor_php table
                                    $res = mysqli_query($connect, $sql);
                                    $values = mysqli_fetch_assoc($res);
                                    $num_rows = $values['total_user']; //toatal number of available data in database
                                    echo "<span style='font-size: 30px;'>$num_rows</span>"; //print data
//                                ?>
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="manage_student.php">
                            <span class="float-left">Total Students</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-life-ring"></i>
                            </div>
                            <div class="mr-5">
                                <?php
                                    $sql = "SELECT count(id) AS file FROM tbl_files"; //select all id from donor_php table
                                    $res = mysqli_query($connect, $sql);
                                    $values = mysqli_fetch_assoc($res);
                                    $num_rows = $values['file']; //toatal number of available data in database
                                    echo "<span style='font-size: 30px;'>$num_rows</span>"; //print data
//                                ?>
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="view_all_file.php">
                            <span class="float-left">Upload File</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white o-hidden h-100" style="background-color: yellowgreen">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-people-carry"></i>
                            </div>
                            <div class="mr-5">
                                <?php
                                $sql = "SELECT count(id) AS total_donor FROM doner"; //select all id from donor_php table
                                $res = mysqli_query($connect, $sql);
                                $values = mysqli_fetch_assoc($res);
                                $num_rows = $values['total_donor']; //toatal number of available data in database
                                echo "<span style='font-size: 30px;'>$num_rows</span>"; //print data

                                 ?>
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="manage_student.php">
                            <span class="float-left text-dark font-weight-bold">Total Donor</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-donate"></i>
                            </div>
                            <div class="mr-5">
                                <?php
                                    $sql = "SELECT count(id) AS total_donation FROM rechive_donation"; //select all id from donor_php table
                                    $res = mysqli_query($connect, $sql);
                                    $values = mysqli_fetch_assoc($res);
                                    $num_rows = $values['total_donation']; //toatal number of available data in database
                                    echo "<span style='font-size: 30px;'>$num_rows</span>"; //print data
                                ?>
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="approve_donation_post.php">
                            <span class="float-left">Total Donate</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-info o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-exchange-alt"></i>
                            </div>
                            <div class="mr-5">
                                <?php
                                    $sql = "SELECT count(id) AS total_exchange FROM rechive_exchange"; //select all id from donor_php table
                                    $res = mysqli_query($connect, $sql);
                                    $values = mysqli_fetch_assoc($res);
                                    $num_rows = $values['total_exchange']; //toatal number of available data in database
                                    echo "<span style='font-size: 30px;'>$num_rows</span>"; //print data
                               ?>
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="approve_exchange_post.php">
                            <span class="float-left">Total Exchange</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>


                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-shopping-cart"></i>
                            </div>
                            <div class="mr-5">
                                <?php
                                    $sql = "SELECT count(id) AS total_sell FROM rechive_sell"; //select all id from donor_php table
                                    $res = mysqli_query($connect, $sql);
                                    $values = mysqli_fetch_assoc($res);
                                    $num_rows = $values['total_sell']; //toatal number of available data in database
                                    echo "<span style='font-size: 30px;'>$num_rows</span>"; //print data
                                ?>
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="approve_sell_post.php">
                            <span class="float-left">Total Sell</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
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
