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
                <div class="col-md-10 mx-auto mt-5 mb-5">



                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Application For Enroll New Course </h1>
                            <h3>
                                <?php
                                if (isset($_POST['btn'])){
                                    $student_id   = $_POST['student_id'];
                                    $student_name = $_POST['student_name'];
                              
                                    $application  = $_POST['application'];


                                    if ($student_id == ""){
                                        echo "<span class='text-danger'>Enter Student ID</span><br/>";
                                    }
                                    if ($student_name == ""){
                                        echo "<span class='text-danger'>Enter Student Name</span><br/>";
                                    }


                                    if ($application == ""){
                                        echo "<span class='text-danger'>Write Application</span><br/>";
                                    }


                                    if ($student_id && $student_name && $application){
                                        $request = "INSERT INTO application (student_id, student_name, request_type, application, status) VALUES ('$student_id', '$student_name', '$request_type', '$application', '0')";
                                        $res = mysqli_query($connect, $request);

                                        echo "<span class='text-success'>Request Send Successfull</span>";
                                    }else{
                                        echo "<span class='text-danger'>Request Send Failed</span>";
                                    }
                                }
                                ?>
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Student ID</label>
                                    <input type="text" name="student_id" value="<?php echo $userdata['id'];?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Student Name</label>
                                    <input type="text" name="student_name" value="<?php echo $userdata['first_name'];?>" class="form-control">
                                </div>
                               
                                <div class="form-group">
                                    <label>Application</label>
                                    <textarea class="form-control" name="application" placeholder="Write Your Application"></textarea>
                                </div>
                                <div class="form-group">
                                    <label></label>
                                    <input type="submit" name="btn" class="btn btn-success col-5" value="Send Application">
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


    <script type="text/javascript">
        CKEDITOR.replace('application',
            {
                height:400,
                resize_enabled:true,
                wordcount: {
                    showParagraphs: false,
                    showWordCount: true,
                    showCharCount: true,
                    countSpacesAsChars: true,
                    countHTML: false,

                    maxCharCount: 20}
            });



    </script>





