<?php

    session_start();
    if (!isset($_SESSION['email'])){
        header('Location: admin_login.php');
    }

    require_once '../php/db_connect.php';
    $sql = "SELECT * FROM tbl_files";
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
                <li class="breadcrumb-item active">View All File</li>
            </ol>

            <!-- Icon Cards-->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 mt-5 mb-5">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>File Name</th>
                                    <th>Teacher Name</th>
                                    <th>Title</th>
                                    <th>Subject</th>
                                    <th>View</th>
                                    <th>Download</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php while($row = mysqli_fetch_array($result)) { ?>
                                    <tr>
                                        <td><?php echo $row['filename']; ?></td>
                                        <td><?php echo $row['fcname']; ?></td>
                                        <td><?php echo $row['title']; ?></td>
                                        <td><?php echo $row['subject']; ?></td>
                                        <td><a href="../teacher/uploads/<?php echo $row['filename']; ?>" target="_blank">View <i class="fas fa-eye" style="color: red"></i></a></td>
                                        <td><a href="../teacher/uploads/<?php echo $row['filename']; ?>" download>Download <i class="fas fa-download" style="color: green"></i></a></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
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

