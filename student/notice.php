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
                            <p class="text-center font-weight-bold">Notice</p>
                            <?php
                            if (isset($_SESSION['id'])){
                                $id = $_SESSION['id'];

//                                $sql = "SELECT event_title, event_desc
//                                          FROM event JOIN students
//                                            ON event.depertment = event.depertment";

                                $sql = "SELECT students.id, event.depertment, event.event_desc FROM students INNER JOIN event ON event.depertment=students.depertment ";
                                $fetchs = mysqli_query($connect, $sql);
                            }
                            ?>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>description</th>
                                        <th>department</th>
                                    </tr>
                                    </thead>
                                    <?php while ($row = $fetchs->fetch_assoc()) {?>
                                        <tbody>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['event_desc']; ?></td>
                                            <td><?php echo $row['depertment']; ?></td>
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










