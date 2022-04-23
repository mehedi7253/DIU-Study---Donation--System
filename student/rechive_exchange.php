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
                <div class="col-md-12 col-sm-12 mb-5">
                    <div class="card mt-5">
                        <div class="card-header bg-info">
                            <h3 class="text-center">Receive Exchange Book list</h3>
                            <?php
                            if (isset($_SESSION['id'])){
                                $id = $_SESSION['id'];

                                $sql = "SELECT * FROM rechive_exchange WHERE studentID = $id";
                                $fetchs = mysqli_query($connect, $sql);
                            }
                            ?>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Exchanger Name</th>
                                            <th>Exchanger Contact</th>
                                            <th>Exchange With</th>
                                            <th>Description</th>
                                            <th>Exchange Date</th>
                                            <th>File</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        while ($fetch = mysqli_fetch_assoc($fetchs)){?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                <td><?php echo $fetch['exchanger_name'];?></td>
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
                                                        <a href="rechived.php?status=<?php echo $fetch['id'];?>"><button class="btn btn-danger">Pending</button></a>
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
</div>
    <!-- /#wrapper -->


    <!--    script-->
    <?php include "mastering/script.php"?>
