<?php include "mastering/header.php"?>

<body id="page-top">

<?php include "mastering/nav.php"?>


<div id="wrapper">

    <!-- Sidebar -->
    <?php include "mastering/side_bar.php"?>
    <!-- end slide bar-->

    <div id="content-wrapper">


        <!--        main content -->
        <!--content section-->
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-aut mb-5">
                    <div class="card mt-5">
                        <div class="card-header bg-info">
                            <?php
                                $sql = "SELECT * FROM tbl_files";
                                $result = mysqli_query($connect, $sql);
                            ?>
                            <h3 class="text-center">Teacher's Upoad File</h3>
                        </div>
                        <div class="card-body">
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

            <!--end main content -->







            <!-- Sticky Footer -->
            <?php include "mastering/footer.php" ?>

        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->


    <!--    script-->
    <?php include "mastering/script.php"?>
