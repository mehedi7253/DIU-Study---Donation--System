<?php
    //connect with database
    require_once '../donor_php/config.php';

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
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="../assets/style/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="../assets/style/style.css" type="text/css" />
    <link rel="icon" href="../images/fund-raiser.jpg">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>
<body>
    <!--Start menu section-->
    <?php include 'nav_bar.php'?>
    <!--end menu section-->
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 mt-5 mb-5">
                <div class="col-md-4 float-left col-sm-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h3>Wellcome <span class="float-right text-success"><?php echo $userdata['first_name']; ?></span></h3>
                        </div>
                        <div class="card-body">
                            <a href="teacher_dasboard.php" class="nav-link card-symbol"><span class="card_view"><i class="fas fa-eye" style="color: green;"></i><span class="ml-3">View Profile</span></span></a>
                            <a href="edit_teacher_info.php" class="nav-link card-symbol"><i class="fas fa-user-edit" style="color: red"></i><span class="card_view"><span class="ml-3">Update Profile</span></span></a>
                            <a href="changepassword.php" class="nav-link card-symbol"><i class="fas fa-unlock-alt" style="color: rebeccapurple"></i><span class="card_view"><span class="ml-3">Change Password</span></span></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 float-left col-sm-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-center">Donation Request</h5>
                            <?php
//                                $select = "SELECT r.* , s.* FROM request r INNER JOIN students s ON r.student_id=s.id";

                            $select = "SELECT * FROM request";
                            $res    = mysqli_query($connect, $select);
                            ?>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Donation Type</th>
                                        <th>Application</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php while ($row = mysqli_fetch_assoc($res)){?>
                                        <tr>
                                            <td><?php echo $row['student_id'];?></td>
                                            <td><?php echo $row['student_name'];?></td>
                                            <td><?php echo $row['request_type'];?></td>
                                            <td><?php echo $row['application'];?></td>
                                            <td>
                                                <a class="btn btn-info" href="donet_now.php?donet_now=<?php echo $row['id'];?>">Donet Now</a>
                                            </td>
                                        </tr>
                                    <?php }?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>
