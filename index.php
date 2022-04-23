<?php
    include 'php/db_connect.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Study Material And Education Management System</title>
    <link rel="stylesheet" href="assets/style/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="assets/style/style.css" />
    <link rel="icon" href="images/logo.PNG">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
<section class="header-top" style="background-color: silver">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
              
                <div class="float-right p-2">
                    <a href="admin/admin_login.php" class="nav-link float-left"><button class="btn btn-info">Admin</button></a>
                    <a href="teacher/teacher_login.php" class="nav-link float-left"><button class="btn btn-info">Teacher</button></a>
                    <a href="student/student_login.php" class="nav-link float-left"><button class="btn btn-info">Student</button></a>
                    <a href="donor/donor_login.php" class="nav-link float-left"><button class="btn btn-info">Donor</button></a>
                </div>

            </div>
        </div>
    </div>
</section>
    <!--    nav bar-->
    <header>
        <nav class="navbar  navbar-expand-lg bg-dark navbar-dark m-0 p-0">
            <div class="container">
                <a href="#" class="navbar-brand">
                    <img src="images/logo.PNG" style="height: 70px; width: 150px">
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="myMenu">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="#top_course" class="nav-link">Course</a></li>
                        <li class="nav-item"><a href="#teachers" class="nav-link">Teachers</a></li>
                        <li class="nav-item"><a href="#event" class="nav-link">Event</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!--end nab bar-->

<!--start slider-->
    <section class="">
        <div class="slide" style="background-color: #1B3A46; height: 400px; width: 100%;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 mt-3">
                        <div class="col-md-8 col-sm-12 mt-2">
                            <h1 class="text-white text-capitalize mt-5">Empower Yourself</h1>
                            <h4 class="text-white"><span style="color: #83C124">Free online courses</span> from the world’s leading experts.<br/>
                                Join 13 million learners today.</h4>

                            <a href="" class="btn btn-success mt-5 col-3">Sign Up Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!--end slider-->


<!--start top course-->

    <section class="top-donate" id="top_course" style="background-color: #F1F4F6">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 mb-5">
                    <h4 class="text-center mt-5"> Our Top Courses</h4>
                    <?php
                        $sselect_doenor = "SELECT * FROM course";
                        $res = mysqli_query($connect, $sselect_doenor);
                    ?>

                    <?php while ($row = mysqli_fetch_assoc($res)){?>
                    <div class="col-md-4 col-sm-12 mt-5 float-left">
                        <div class="card">
                            <div class="card-body">
                                <label>Course Name               : <?php echo $row['course_name'];?></label> <br/>
                                <label class="text-capitalize">Course Teacher            : <?php echo $row['teacher'];?></label> <br/>
                            </div>
                            <div class="card-footer">
                               <a class="btn btn-info" href="student/student_reg.php">Enroll Now</a>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </section>
<!--end top course-->


    <!--start top Students-->

    <section class="top-donate" id="teachers" style="background-color: #F1F4F6">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 mb-5">
                    <h4 class="text-center mt-5"> Our Top Teachers</h4>
                    <?php
                    $sselect_doenor = "SELECT * FROM teachers";
                    $res = mysqli_query($connect, $sselect_doenor);
                    ?>

                    <?php while ($row = mysqli_fetch_assoc($res)){?>
                        <div class="col-md-4 col-sm-12 mt-5 float-left">
                            <div class="card">
                                <img class="card-img-top" src="images/<?php echo $row['image'];?>" style="height: 200px">
                                <div class="card-body">
                                    <label>Name               : <?php echo $row['first_name'];?> <span><?php echo $row['last_name'];?></span></label> <br/>
                                    <label>Email              : <?php echo $row['username'];?></label> <br/>
                                    <label>Phone              : <?php echo $row['contact'];?></label> <br/>
                                    <label>Course Taken       : <?php echo $row['subject_teach'];?></label> <br/>
                                </div>
                                <div class="card-footer">
                                    <a href="teacher.php?profile=<?php echo $row['id'];?>"><button class="btn btn-info">View Profile</button></a>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </section>
    <!--end top course-->

    <!--start event-->
    <section class="success-event" id="event" style="background-color: #F1F4F6">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 mb-5">
                    <h2 class="text-center mt-5 mb-5">Our  Event</h2>

                    <?php
                    $sql = "SELECT * FROM event";
                    $resul = mysqli_query($connect, $sql);
                    ?>
                    <?php while ($row = mysqli_fetch_assoc($resul)){?>
                        <div class="col-md-4 col-sm-12 float-left">
                            <div class="card">
                                <img class="card-img-top" src="images/<?php echo $row['image'];?>" style="height: 250px">
                                <div class="card-body">
                                    <h4 class="text-xl-center mt-2"><?php echo $row['event_title'];?></h4>
                                    <p class="mt-3 ml-2">Start Date: <span class="text-info font-weight-bold"><?php echo $row['start_date'];?></span></p>
                                    <p class="text-justify mt-3"><?php echo $row['event_desc'];?></p>
                                </div>
                                <div class="card-footer">
                                    <a class="btn btn-info col-8" href="student/student_login.php">Ateend Now</a>
                                </div>
                            </div>
                        </div>
                    <?php }?>

                </div>
            </div>
        </div>
    </section>
    <!--end event-->

<!--start footer-->
    <section class="fotter bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <p class="text-center p-2 text-white">This site is create By @ Majadur Rahman</p>
                </div>
            </div>
        </div>
    </section>
<!--end footer-->


<!--    scrooll up-->
    <button id="topBtn"><i class="fas fa-arrow-up"></i></button>

<!--javascript-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/topdown.js"></script>
</body>
</html>
