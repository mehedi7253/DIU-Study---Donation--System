
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
                <li class="breadcrumb-item active">Create New Event</li>
            </ol>

            <!-- Icon Cards-->
            <!-- add Teachers-->
            <div class="container">
                <div class="row">
                    <div class="col-md-8 mx-auto mt-5 mb-5">



                        <div class="card">
                            <div class="card-header">
                                <h1 class="text-center">Create New Event</h1>
                            </div>
                            <div class="card-body">
                                <p>
                                    <?php
                                    if (isset($_POST['btn'])){
                                        $event_title   = $_POST['event_title'];
                                        $event_desc    = $_POST['event_desc'];  //decleare variable last_name and put it into post method
                                        $start_date    = $_POST['start_date']; //decleare variable last_name and put it into post method
                                        $depertment    = $_POST['depertment'];
                                        $image         = $_FILES['image']['name']; //decleare variable last_name and put it into post method


                                        //check error

                                        //check first name is required
                                        if ($event_title == ""){
                                            echo "<span class='text-danger'>Enter Event Title</span> <br/>";
                                        }

                                        //check last name is required
                                        if ($event_desc == ""){
                                            echo "<span class='text-danger'>Write Event Descriptaion</span> <br/>";
                                        }
                                        if ($start_date  == ""){
                                            echo "<span class='text-danger'>Select Start Date</span> <br/>";
                                        }
                                        if ($depertment  == ""){
                                            echo "<span class='text-danger'>Select Department</span> <br/>";
                                        }


                                        if ($event_title && $event_desc && $start_date){
                                            $fileinfo = PATHINFO($_FILES['image']['name']);
                                            $newFile = $fileinfo['filename']. "." . $fileinfo['extension'];
                                            move_uploaded_file($_FILES['image']['tmp_name'], "../images/" .$newFile);
                                            $location = $newFile;

                                            $create_event = "INSERT INTO event (event_title, event_desc, start_date, depertment, image) VALUES('$event_title', '$event_desc', '$start_date', '$depertment', '$image')";
                                            $result = mysqli_query($connect, $create_event);

                                            echo "<span class='text-success'>New Event Create Successful</span>";
                                        }else{
                                            echo "<span class='text-danger'>New Event Create Failed....!</span>";
                                        }

                                    }
                                    ?>
                                </p>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label><span class="text-danger font-weight-bold">*</span>Event Title: </label>
                                        <input type="text" name="event_title" placeholder="Enter Event Titile.." class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label><span class="text-danger font-weight-bold">*</span>Event Description: </label>
                                        <textarea name="event_desc" placeholder="Type Event Description" class="form-control"></textarea>
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
                                        <label><span class="text-danger font-weight-bold">*</span>Start Date: </label>
                                        <input type="date" name="start_date" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label><span class="text-danger font-weight-bold">*</span>Select an Image: </label>
                                        <input type="file" name="image" class="form-control">
                                    </div>

                                    <div  class="form-group">
                                        <button class="btn  btn-success col-4" type="submit" name="btn">Add</button>
                                        <button class="btn btn-danger col-4" type="reset">Cancel</button>
                                    </div>
                                </form>
                            </div>


                            <div class="card-footer">
                                <a href="../student/student_dasboard.php" class="float-right"><button type="button" class="btn btn-info">Back</button></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--            end add Teachers-->
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