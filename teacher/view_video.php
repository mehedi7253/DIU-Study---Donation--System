<?php

//connect with database
require_once '../php/teacher_config.php';
// check user login via session
if(not_logged_in() === TRUE) {
    header('location: teacher_login.php'); // redirect location
}

$userdata = getUserDataByUserId($_SESSION['id']);  //get all information by user id


// fetch files
$id = $userdata['id'];
$sql = "SELECT * FROM curse_video WHERE teacherID = $id";
$result = mysqli_query($connect, $sql);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View File</title>
    <link rel="stylesheet" href="../assets/style/bootstrap.css" type="text/css">
    <link rel="icon" href="../images/logo.PNG" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>
<body>
<!--Start menu section-->
<?php include 'nav_bar.php'?>
<!--end menu section-->
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 mt-5 mb-5">
            <div class="card mt-5">
                <div class="card-body">
                    <div class="col-sm-12 col-md-4 float-left">
                        <div class="card">
                            <div class="card-header">
                                <p class="text-center">Chose One</p>
                            </div>
                            <div class="card-body">
                                <label class="text-center"><a class="nav-link" href="file_upload.php"><i class="fas fa-upload"></i><span class="ml-3">File Upload</span></a></label><br/>
                                <label class="text-center"><a class="nav-link" href="up_video.php"><i class="fas fa-play-circle" style="color: #cce5ff;"></i><span class="ml-3"> Upload Curse Video</span></a></label>
                                <label class="text-center"><a class="nav-link" href="view.php"><i class="fas fa-eye" style="color: green"></i><span class="ml-3">View Upload File</span></a></label>
                                <label class="text-center"><a class="nav-link" href="view_video.php"><i class="fas fa-eye" style="color: green"></i><span class="ml-3">View Curse Video</span></a></label>                                 </div>
                            <div class="card-footer">
                                <a class="btn btn-info float-right" href="file_upload.php">Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12 float-left">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-center">All Faculty Information</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>View</th>
                                            <th>Remove File</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php while($row = mysqli_fetch_array($result)) { ?>
                                            <tr>
                                                <td><?php echo $row['subject']; ?></td>
                                                <td><a href="uploads/<?php echo $row['url']; ?>" target="_blank"><?php echo $row['url']; ?> <i class="fas fa-eye" style="color: red"></i></a></td>
                                                <td><a href="remove_video.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to delete this !!'); ">Remove <i class="fas fa-trash-alt" style="color: red"></i></a></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>