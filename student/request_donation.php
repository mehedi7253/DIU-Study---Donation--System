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
                <div class="col-md-9 mx-auto mb-5">
                    <div class="card mt-5">
                        <div class="card-header bg-info">
                            <h3 class="text-center">Request For a Donation</h3>
                        </div>
                        <div class="card-body">
                            <P>
                                <?php
                                    if (isset($_POST['btn_donation'])){
                                        $studentID      = $_POST['studentID'];
                                        $student_name   = $_POST['student_name'];
                                        $depertment     = $_POST['depertment'];
                                        $book           = $_POST['book'];
                                        $author         = $_POST['author'];
                                        $donet_condition = $_POST['donet_condition'];
                                        $description     = $_POST['description'];
                                        $image         = $_FILES['image']['name'];

                                        if ($book == ""){
                                            echo "<span class='text-danger'>Write Book Name <sup>***</sup></span> <br/>";
                                        }
                                        if ($author == ""){
                                            echo "<span class='text-danger'>Write Author Name <sup>***</sup></span> <br/>";
                                        }
                                        if ($donet_condition == ""){
                                            echo "<span class='text-danger'>Select Donation Condition <sup>***</sup></span> <br/>";
                                        }
                                        if ($description == ""){
                                            echo "<span class='text-danger'>Write Description About Your Book <sup>***</sup></span> <br/>";
                                        }
                                        if ($image == ""){
                                            echo "<span class='text-danger'>Select An Image <sup>***</sup></span> <br/>";
                                        }

                                        if ($studentID && $student_name && $depertment && $book && $author && $donet_condition && $description &&$image){

                                            $fileinfo = PATHINFO($_FILES['image']['name']);
                                            $newFile = $fileinfo['filename']. "." . $fileinfo['extension'];
                                            move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" .$newFile);
                                            $location = $newFile;

                                            $created = @date('Y-m-d H:i:s');

                                            $post_donation = "INSERT INTO donation (studentID, student_name, depertment, book, author, donet_condition, description, image, date, status) VALUES ('$studentID', '$student_name', '$depertment', '$book','$author', '$donet_condition', '$description', '$image', '$created', '0')";
                                            $donation_result = mysqli_query($connect, $post_donation);

                                            echo "<span class='text-success'>New Donation Request Post Create Successful</span>";
                                        }else{
                                            echo "<span class='text-danger'>New Donation Request Post Create Failed...!!</span>";
                                        }


                                    }
                                ?>
                            </P>

                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Student ID</label>
                                    <input type="text"  name="studentID" class="form-control" value="<?php echo $userdata['id'];?>">
                                </div>
                                <div class="form-group">
                                    <label>Student Name</label>
                                    <input type="text"  name="student_name" class="form-control" value="<?php echo $userdata['first_name'];?> <?php echo $userdata['last_name'];?>">
                                </div>
                                <div class="form-group">
                                    <label>Department Name</label>
                                    <input type="text"  name="depertment" class="form-control" value="<?php echo $userdata['depertment'];?>">
                                </div>
                                <div class="form-group">
                                    <label>Book Name</label>
                                    <input type="text" name="book" class="form-control" placeholder="Write Author Name">
                                </div>
                                <div class="form-group">
                                    <label>Author Name</label>
                                    <input type="text" name="author" class="form-control" placeholder="Write Author Name">
                                </div>
                                <div class="form-group">
                                    <label for="address">Condition</label>
                                    <select id="inputState" name="donet_condition" class="form-control">
                                        <option selected>Select One</option>
                                        <option value="Urgent"> Urgent</option>
                                        <option value="Medium"> Medium</option>
                                        <option value="Low"> Low</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" placeholder="Write Something"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Chose a Image File</label>
                                    <input type="file" name="image" class="form-control" placeholder="chose a file">
                                </div>
                                <div>
                                    <input type="submit" name="btn_donation" class="btn btn-success col-md-6" value="Post Donation Request">
                                </div>
                            </form>
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
