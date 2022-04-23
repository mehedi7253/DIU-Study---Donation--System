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
                            <h3 class="text-center">Receive Sell Information list</h3>
                            <?php
                            if (isset($_SESSION['id'])){
                                $id = $_SESSION['id'];

                                $sql = "SELECT * FROM rechive_sell WHERE studentID = $id";
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
                                        <th>Buyer Name</th>
                                        <th>Buyer Contact</th>
                                        <th>Book Name</th>
                                        <th>Author Name</th>
                                        <th>Amount</th>
                                        <th>Transaction ID</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $i = 1;
                                    while ($fetch = mysqli_fetch_assoc($fetchs)){?>
                                        <tr>
                                            <td><?php echo $i++;?></td>
                                            <td><?php echo $fetch['buyer_name'];?></td>
                                            <td><?php echo $fetch['buyer_contact'];?></td>
                                            <td><?php echo $fetch['book_name'];?></td>
                                            <td><?php echo $fetch['author_name'];?></td>
                                            <td><?php echo $fetch['amount'];?></td>
                                            <td><?php echo $fetch['txt_id'];?></td>
                                            <td><?php echo $fetch['date'];?></td>
                                            <td>
                                                <?php
                                                $status = $fetch['status'];
                                                // echo $status;

                                                if (($status) == '0'){?>
                                                    <a href="rechived_sell.php?status=<?php echo $fetch['id'];?>"><button class="btn btn-danger">Pending</button></a>
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
