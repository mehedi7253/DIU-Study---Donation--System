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
                <li class="breadcrumb-item active">Add Notice</li>
            </ol>

            <!-- Icon Cards-->
            <!-- add donor-->
            <div class="container">
                <div class="row">
                    <div class="col-md-8 mx-auto mt-5 mb-5">
                        <div class="card">
                            <div class="card-header bg-info text-white">
                                <h2 class="text-center">Create New Notice</h2>
                            </div>
                            <div class="card-body">
                                <h5>
                                    <?php
                                    if (isset($_POST['btn'])){
                                        $notice_title   = $_POST['notice_title']; //decleare variable first_name and put it into post method
                                        $notice     = $_POST['notice'];  //decleare variable last_name and put it into post method

                                        //check first name is required
                                        if ($notice_title == ""){
                                            echo "<span class='text-danger'>Enter Notice Title</span> <br/>";
                                        }

                                        //check last name is required
                                        if ($notice == ""){
                                            echo "<span class='text-danger'>Write Notice</span> <br/>";
                                        }


                                        if ($notice_title && $notice){
                                            $sql = "INSERT INTO notice (notice_title, notice) VALUES('$notice_title', '$notice')";
                                            $result = mysqli_query($connect, $sql);

                                            echo "<span class='text-success'>New Notice Added Successful</span>";
                                        }else{
                                            echo "<span class='text-danger'>New Notic Added Failed....!</span>";
                                        }



                                    }
                                    ?>
                                </h5>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label><span class="text-danger font-weight-bold">*</span>Notice Title: </label>
                                        <input type="text" name="notice_title" placeholder="Enter Event Titile.." class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label><span class="text-danger font-weight-bold">*</span>Notice Description: </label>
                                        <textarea name="notice" placeholder="Type Event Description" class="form-control"></textarea>
                                    </div>
                                    <div  class="form-group">
                                        <button class="btn  btn-success col-4" type="submit" name="btn">Add Notice</button>
                                        <button class="btn btn-danger col-4" type="reset">Cancel</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <a class="float-right nav-link" href="manage_notice.php">Manage Notice</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--            end add donor-->
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

