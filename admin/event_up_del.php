<?php


    session_start();
    if (!isset($_SESSION['email'])){
        header('Location: admin_login.php');
    }

    include '../php/db_connect.php';



    if(isset($_GET['event_up'])){
        $id = $_GET['event_up'];

        $sql = "SELECT * FROM event WHERE id=$id";

        $res = mysqli_query($connect, $sql);
        $data = mysqli_fetch_assoc($res);

    }
    if ($_POST) {
        $event_title   = $_POST['event_title']; //decleare variable first_name and put it into post method
        $event_desc    = $_POST['event_desc'];  //decleare variable last_name and put it into post method
        $start_date    = $_POST['start_date'];//decleare variable last_name and put it into post method
        $depertment    = $_POST['depertment'];
        $sql = "UPDATE event SET event_title = '$event_title', event_desc = '$event_desc', depertment = '$depertment', start_date = '$start_date' WHERE id = $id";

        $res = mysqli_query($connect, $sql);


        header('Location: manage_event.php');
    }


    if (isset($_GET['event_del'])) {
        $id = $_GET['event_del'];

        $sql = "DELETE FROM event WHERE id = $id";

        $result = mysqli_query($connect, $sql);

        header('Location: manage_event.php');
    }
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
                <li class="breadcrumb-item active">Update Event</li>
            </ol>

            <!-- Icon Cards-->
            <!-- add donor-->
            <div class="container">
                <div class="row">
                    <div class="col-md-8 mx-auto mt-5 mb-5">
                        <div class="card">
                            <div class="card-header bg-info text-white">
                                <h2 class="text-center">Update Event</h2>
                            </div>
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label><span class="text-danger font-weight-bold">*</span>Event Title: </label>
                                        <input type="text" name="event_title" placeholder="Enter Event Titile.." hidden value="<?php echo $data['id'];?>" class="form-control">
                                        <input type="text" name="event_title" placeholder="Enter Event Titile.." value="<?php echo $data['event_title'];?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label><span class="text-danger font-weight-bold">*</span>Event Description: </label>
                                        <textarea name="event_desc" class="form-control"><?php echo $data['event_desc'];?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Select Department</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="depertment">
                                            <option selected>------Select Your Department---------</option>
                                            <option value="CSE">CSE</option>
                                            <option value="CIS">CIS</option>
                                            <option value="SWE">SWE</option>
                                            <option value="Civil">Civil</option>
                                            <option value="BBA">BBA</option>
                                            <option value="MCT">MCT</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label><span class="text-danger font-weight-bold">*</span>Event Start Date: </label>
                                        <input type="date" name="start_date" class="form-control" value="<?php echo $data['start_date'];?>">
                                    </div>
                                    <div  class="form-group">
                                        <button class="btn  btn-success col-4" type="submit" name="btn">Update</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <a class="float-right nav-link" href="admin_dashboard.php">Back</a>
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
                    <span>Create by@ Israt Jahan</span>
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

