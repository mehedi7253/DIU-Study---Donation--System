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
                            <p class="text-center font-weight-bold">Event Notice</p>
                            <?php
                            $depertment = $userdata['depertment'];
                            $sql = "SELECT * FROM event WHERE depertment = '$depertment'";
                            $fetchs = mysqli_query($connect, $sql);

                            ?>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Start Date</th>
                                        <th>Event Image</th>

                                    </tr>
                                    </thead>
                                    <?php $i =1; while ($row = $fetchs->fetch_assoc()) {?>
                                        <tbody>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row['event_title']; ?></td>
                                            <td><?php echo $row['event_desc']; ?></td>
                                            <td><?php echo $row['start_date']; ?></td>
                                            <td><img src="../images/<?php echo $row['image']; ?>" style="height: 150px; width: 150px"></td>

                                        </tr>
                                        </tbody>
                                    <?php }?>
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










