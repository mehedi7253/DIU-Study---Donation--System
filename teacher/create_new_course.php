<?php

        //connect with database
    require_once '../php/teacher_config.php';
    // check user login via session
    if(not_logged_in() === TRUE) {
    header('location: teacher_login.php'); // redirect location
    }

    $userdata = getUserDataByUserId($_SESSION['id']);  //get all information by user id

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $userdata['first_name'];?>'s Dashboard</title>
    <link rel="stylesheet" href="../assets/style/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="../assets/style/style.css" type="text/css" />
    <link rel="icon" href="../images/<?php echo $userdata['image'];?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>
<body>
<!--Start menu section-->
<?php include 'nav_bar.php'?>
<!--end menu section-->

<!--start deash board (view)-->
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 float-left mt-5 mb-5">
            <div class="card mt-5">
                <div class="card-header">
                    <h4> <i class="fas fa-table"></i> Create New Course</h4>
                </div>
                <div class="card-body">
                    <p>
                        <?php
                        if (isset($_POST['btn'])){
                            $course_name  = $_POST['course_name'];
                            $teacher      = $_POST['teacher'];


                            if ($course_name == ""){
                                echo "<span class='text-danger'>Enter Course Name</span><br/>";
                            }
                          

                            if ($course_name){
                          
                                $sql = "INSERT INTO course (course_name, teacher) VALUES ('$course_name', '$teacher')";
                                $res = mysqli_query($connect, $sql);

                                echo "<span class='text-success'>Added Successful</span><br/>";
                            }else{
                                echo "<span class='text-danger'>Failed Added </span><br/>";

                            }
                        }
                        ?>
                    </p>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Course Name: </label>
                            <input type="text" name="course_name" placeholder="Enter Course Name" class="form-control">
                        </div>
                      
                        <div class="form-group">
                            <label>Course Teacher: </label>
                            <input type="text" name="teacher" value="<?php echo $userdata['first_name'];?> <?php echo $userdata['last_name'];?>" class="form-control">
                        </div>
                      
                        <div class="form-group">
                            <label</label>
                            <input type="submit" name="btn" class="btn btn-success" value="Add Course">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="teacher_dasboard.php" class="nav-link text-info">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer bg-dark">
    <div class="container">
        <div class="row">
            <div class="footer-text col-md-12 col-sm-12">
                <p class="text-white text-capitalize text-center font-italic p-4">Create By  <strong>@Majadur Rahman</strong></p>
            </div>
        </div>
    </div>
</div>

<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.js"></script>


</body>
</html>