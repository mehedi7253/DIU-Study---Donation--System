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
                            <h3 class="text-center">Request For Sell</h3>
                        </div>
                        <div class="card-body">
                            <P>
                                <?php
                                    if (isset($_POST['btn_sell']))
                                    {
                                        $studentID    = $_POST['studentID'];
                                        $student_name = $_POST['student_name'];
                                        $dept         = $_POST['dept'];
                                        $book_name    = $_POST['book_name'];
                                        $author_name  = $_POST['author_name'];
                                        $past_price   = $_POST['past_price'];
                                        $present_price = $_POST['present_price'];
                                        $description   = $_POST['description'];
                                        $image         = $_FILES['image']['name'];

                                        if ($book_name == ""){
                                            echo "<span class='text-danger'>Write Book Name <sup>***</sup></span> <br/>";
                                        }
                                        if ($author_name == ""){
                                            echo "<span class='text-danger'>Write Author Name <sup>***</sup></span> <br/>";
                                        }
                                        if ($past_price == ""){
                                            echo "<span class='text-danger'>Write Past Price Name <sup>***</sup></span> <br/>";
                                        }
                                        if ($present_price == ""){
                                            echo "<span class='text-danger'>Write Present Price <sup>***</sup></span> <br/>";
                                        }
                                        if ($description == ""){
                                            echo "<span class='text-danger'>Write Description About Your Book <sup>***</sup></span> <br/>";
                                        }
                                        if ($image == ""){
                                            echo "<span class='text-danger'>Select An Image <sup>***</sup></span> <br/>";
                                        }

                                        if ($studentID && $student_name && $dept && $book_name && $author_name && $past_price && $present_price && $description && $image){
                                            $fileinfo = PATHINFO($_FILES['image']['name']);
                                            $newFile = $fileinfo['filename']. "." . $fileinfo['extension'];
                                            move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" .$newFile);
                                            $location = $newFile;

                                            $created = @date('Y-m-d H:i:s');

                                            $post_for_sell = "INSERT INTO request_sell (studentID, student_name, dept, book_name, author_name, past_price, present_price, description, image, date, status) VALUES ('$studentID', '$student_name', '$dept', '$book_name','$author_name', '$past_price', '$present_price', '$description', '$image', '$created','1')";
                                            $post_result   = mysqli_query($connect, $post_for_sell);

                                            echo "<span class='text-success'>New Sell Request Post Create Successful</span>";
                                        }else{
                                            echo "<span class='text-danger'>New Sell Request Post Create Failed...!!</span>";
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
                                    <input type="text"  name="dept" class="form-control" value="<?php echo $userdata['depertment'];?>">
                                </div>
                                <div class="form-group">
                                    <label>Book Name</label>
                                    <input type="text" name="book_name" class="form-control" placeholder="Write Author Name">
                                </div>
                                <div class="form-group">
                                    <label>Author Name</label>
                                    <input type="text" name="author_name" class="form-control" placeholder="Write Author Name">
                                </div>
                                <div class="form-group">
                                    <label>Past Price</label>
                                    <input type="number" name="past_price" class="form-control" placeholder="Past Price">
                                </div>
                                <div class="form-group">
                                    <label>New Price</label>
                                    <input type="number" name="present_price" class="form-control" placeholder="New Price">
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
                                    <input type="submit" name="btn_sell" class="btn btn-info col-md-6" value="Add Post">
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
