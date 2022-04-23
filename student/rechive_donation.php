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
                            <p class="text-center font-weight-bold">Received Donation</p>
                            <?php
                            if (isset($_SESSION['id'])){
                                $id = $_SESSION['id'];

                                $sql = "SELECT * FROM rechive_donation WHERE studentID = $id";
                                $fetchs = mysqli_query($connect, $sql);
                            }
                            ?>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Student Name</th>
                                        <th>Book</th>
                                        <th>Author</th>
                                        <th>Amount</th>
                                        <th>Tranzaction ID</th>
                                        <th>Date</th>
                                        <th>Status</th>

                                    </tr>
                                    </thead>
                                    <?php
                                    $i = 1;
                                    while ($fetch = mysqli_fetch_assoc($fetchs)){?>
                                        <tr>
                                            <td><?php echo $i++;?></td>
                                            <td><?php echo $fetch['student_name'];?></td>
                                            <td><?php echo $fetch['book'];?></td>
                                            <td><?php echo $fetch['author'];?></td>
                                            <td><?php echo $fetch['amount'];?></td>
                                            <td><?php echo $fetch['txtID'];?></td>
                                            <td><?php echo $fetch['date'];?></td>
                                            <td>
                                                <?php
                                                $status = $fetch['status'];
                                                // echo $status;

                                                if (($status) == '0'){?>
                                                    <a href="rechived_don.php?don=<?php echo $fetch['id'];?>"><button class="btn btn-danger">Pending</button></a>
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










