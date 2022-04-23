<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #4267B2">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a href="teacher_dasboard.php" class="nav-link text-white text-capitalize">Home</a></li>
                <li class="nav-item"><a href="file_upload.php" class="nav-link text-white text-capitalize">Upload Material</a></li>
                <li class="nav-item"><a href="create_new_course.php" class="nav-link text-white text-capitalize">Create New Course</a></li>
                <li class="nav-item"><a href="exam/dash.php?q=0" target="_parent" class="nav-link text-white text-capitalize">Exam</a></li>

            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="teacher_dasboard.php" class="nav-link text-white font-weight-bolder text-uppercase"><span class="mr-3"><img src="../images/<?php echo $userdata['image'] ?>" style="height: 50px; width: 70px; border-radius: 50%"></span><span class="text-white mr-3"><?php echo $userdata['first_name']; ?></span></a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link text-white font-weight-bold mt-2">Log Out</a></li>
            </ul>
        </div>
    </div>
</nav>