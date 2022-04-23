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
                            <h3 class="text-center">Post For Exchange</h3>
                        </div>
                        <div class="card-body">
                            <P>
                                <?php
                                if (isset($_POST['btn_exchange']))
                                {
                                    $studentID            = $_POST['studentID'];
                                    $student_name         = $_POST['student_name'];
                                    $depertment           = $_POST['depertment'];
                                    $book_name            = $_POST['book_name'];
                                    $author_name          = $_POST['author_name'];
                                    $condition_exchange   = $_POST['condition_exchange'];
                                    $description          = $_POST['description'];
                                    $image                = $_FILES['image']['name'];


                                    if ($book_name == ""){
                                        echo "<span class='text-danger'>Write Book Name <sup>***</sup></span> <br/>";
                                    }
                                    if ($author_name == ""){
                                        echo "<span class='text-danger'>Write Author Name <sup>***</sup></span> <br/>";
                                    }
                                    if ($condition_exchange == ""){
                                        echo "<span class='text-danger'>Write Condition <sup>***</sup></span> <br/>";
                                    }
                                    if ($description == ""){
                                        echo "<span class='text-danger'>Write Description <sup>***</sup></span> <br/>";
                                    }
                                    if ($image == ""){
                                        echo "<span class='text-danger'>Select an Image<sup>***</sup></span> <br/>";
                                    }

                                    if ($studentID && $student_name && $depertment && $book_name && $author_name && $condition_exchange && $description && $image){

                                        $fileinfo = PATHINFO($_FILES['image']['name']);
                                        $newFile = $fileinfo['filename']. "." . $fileinfo['extension'];
                                        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" .$newFile);
                                        $location = $newFile;


                                        $created = @date('Y-m-d H:i:s');

                                        $post_exchange = "INSERT INTO request_exchange (studentID, student_name, depertment, book_name, author_name, condition_exchange, description, image, date, status) VALUES ('$studentID', '$student_name', '$depertment', '$book_name','$author_name','$condition_exchange', '$description', '$image', '$created', '1')";
                                        $exchange_result = mysqli_query($connect, $post_exchange);

                                        echo "<span class='text-success'>New Exchange Request Post Create Successful</span>";
                                    }else{
                                        echo "<span class='text-danger'>New Exchange Request Post Create Failed...!!</span>";
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
                                    <input type="text" name="book_name" class="form-control" placeholder="Write Author Name">
                                </div>
                                <div class="form-group">
                                    <label>Author Name</label>
                                    <input type="text" name="author_name" class="form-control" placeholder="Write Author Name">
                                </div>
                                <div class="form-group">
                                    <label>Condition </label>
                                    <input type="text" name="condition_exchange" class="form-control" placeholder="Write Your Condition">
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
                                    <input type="submit" name="btn_exchange" class="btn btn-info col-md-6" value="Post For Exchange">
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
