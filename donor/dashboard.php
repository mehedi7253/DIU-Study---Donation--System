<?php

require_once '../php/donor_config.php';

if(not_logged_in() === TRUE) {
    header('location: donor_login.php');
}

$userdata = getUserDataByUserId($_SESSION['id']);  //get all information by user id
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Well Come <?php echo $userdata['first_name'];?></title>
    <link rel="stylesheet" href="../assets/style/style.css" type="text/css">
    <link rel="stylesheet" href="../assets/style/bootstrap.css" type="text/css">
    <link rel="icon" href="../images/logo.PNG">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <?php include 'nav.php'?>
</nav>




<!--    main content-->
<section class="main_section mb-5" style="background-color: #F9F9FA">
    <div class="container">
        <div class="row">
                <div class="col-md-10 mx-auto mt-5">
                    <div class="card" style="background-color: #FFFFFF">
                        <div class="card-body">
                            <div class="float-left col-md-4">
                                <div class="card">

                                    <div>
                                        <?php
                                        if (isset($_POST['pic'])){
                                            $fileinfo = PATHINFO($_FILES['image']['name']);
                                            $newfilename  = $fileinfo['filename']. "." .$fileinfo['extension'];
                                            move_uploaded_file($_FILES['image']['tmp_name'],"../images/" .$newfilename);
                                            $location = $newfilename;

                                            $update_profie_pic = "UPDATE doner SET image = '$location' WHERE id = '$_SESSION[id]'";
                                            mysqli_query($connect, $update_profie_pic);


                                            $sql = "SELECT * FROM doner WHERE id = '$_SESSION[id]'";
                                            $records = mysqli_query($connect, $sql);
                                            $count = mysqli_num_rows($records);

                                            if ($count == 1) {
                                                $row = mysqli_fetch_array($records);
                                                echo " $userdata[image]";

                                                echo "<span class='text-success'>Sucessfully Update</span>";
                                                header('Location: dashboard.php');

                                            } else {
                                                echo "<span class='text-danger'>faild to insert into database</span>";
                                            }


                                        }
                                        ?>
                                    </div>

                                    <p class="text-center"><img class="img-fluid" src="../images/<?php echo $userdata['image'] ?>" title="<?php echo $userdata['first_name']?>" alt="card image" style="height: 250px; width: 100%"></p>

                                    <br/>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group mt-3">
                                            <input type="file" name="image">
                                            <input type="submit" name="pic" value="Update profile Picture" class="btn btn-success mt-3">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="float-left col-md-8">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th>Donor ID  </th>
                                            <td class="font-weight-bold"><?php echo $userdata['id']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Frst Name </th>
                                            <td class="font-weight-bold text-capitalize"><?php echo $userdata['first_name']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Last Name  </th>
                                            <td class="font-weight-bold text-capitalize"><?php echo $userdata['last_name']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email </th>
                                            <td class="font-weight-bold"><?php echo $userdata['username']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Address  </th>
                                            <td class="font-weight-bold"><?php echo $userdata['address']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Phone Number  </th>
                                            <td class="font-weight-bold"><?php echo $userdata['contact']; ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <a href="edit_donor_info.php" class="nav-link"><span class="text-center"><span class="text-info">Edit Your Profile</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<!--    script-->
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.js"></script>
</body>
</html>