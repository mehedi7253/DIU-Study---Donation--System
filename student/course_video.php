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
                <div class="col-md-12 mx-auto mt-5 mb-5">

                    <div class="card">
                        <div class="card-header">
                            <p class="text-center font-weight-bold">View Course Video</p>
                            <?php

                                $sql = "SELECT * FROM curse_video ";
                                $result = mysqli_query($connect, $sql);
                            ?>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Teacher Name</th>
                                        <th>Subject</th>
                                        <th>View</th>
                                    </tr>
                                    </thead>
                                    <?php while($row = mysqli_fetch_array($result)) { ?>
                                        <tr>
                                            <td><?php echo $row['fcname']; ?></td>
                                            <td><?php echo $row['subject']; ?></td>
                                            <td><a href="../teacher/uploads/<?php echo $row['url']; ?>" target="_blank"><?php echo $row['url']; ?> <i class="fas fa-eye" style="color: red"></i></a></td>
                                        </tr>
                                    <?php } ?>
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










