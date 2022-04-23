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
               <div class="card">
                   <div class="card-body">
                       <div class="col-md-3 col-sm-12 float-left">
                           <div>
                               <?php
                               if (isset($_POST['pic'])){
                                   $fileinfo = PATHINFO($_FILES['image']['name']);
                                   $newfilename  = $fileinfo['filename']. "." .$fileinfo['extension'];
                                   move_uploaded_file($_FILES['image']['tmp_name'],"../images/" .$newfilename);
                                   $location = $newfilename;

                                   $update_profie_pic = "UPDATE teachers SET image = '$location' WHERE id = '$_SESSION[id]'";
                                   mysqli_query($connect, $update_profie_pic);


                                   $sql = "SELECT * FROM teachers WHERE id = '$_SESSION[id]'";
                                   $records = mysqli_query($connect, $sql);
                                   $count = mysqli_num_rows($records);

                                   if ($count == 1) {
                                       $row = mysqli_fetch_array($records);
                                       echo " $userdata[image]";

                                       echo "<span class='text-success'>Sucessfully Update</span>";
                                       header('Location:teacher_dasboard.php');

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

                       <div class="col-md-8 ml-5 col-sm-12 float-left">
                           <div class="ml-5">
                               <label class="text-info font-weight-bold text-capitalize"> <?php echo $userdata['first_name'];?> <span> <?php echo $userdata['last_name'];?></span></label><br/>

                               <label class="font-weight-bold text-capitalize"> #ID: <?php echo $userdata['id'];?></label><br/>
                           </div>


                           <h3 class="font-weight-bold mt-2 mb-3 ml-5">Personal Information <span><a href="edit_teacher_info.php" class="btn btn-info float-right"><i class="far fa-edit"></i> Edit Profile</a>
</span></h3>
                           <div class="ml-5 table-responsive">
                               <table class="table">
                                   <tr>
                                       <th> Experience </th>
                                       <td> <label class="text-capitalize"> <?php echo $userdata['exp'];?></label></td>
                                   </tr>
                                   <tr>
                                       <th>  Mobile </th>
                                       <td> <label class="text-capitalize"><?php echo $userdata['contact'];?></label></td>
                                   </tr>
                                   <tr>
                                       <th>  Email </th>
                                       <td> <label class="text-capitalize"><?php echo $userdata['username'];?></label></td>
                                   </tr>
                                   <tr>
                                       <th>  NID </th>
                                       <td> <label class="text-capitalize"><?php echo $userdata['nid'];?></label></td>
                                   </tr>
                                   <tr>
                                       <th>  Address </th>
                                       <td> <label class="text-capitalize"><?php echo $userdata['address'];?></label></td>
                                   </tr>
                                   <tr>
                                       <th>  Join Date </th>
                                       <td> <label class="text-capitalize"><?php echo $userdata['date'];?></label></td>
                                   </tr>
                                   <tr>
                                       <th>  Subject Take </th>
                                       <td> <label class="text-capitalize"><?php echo $userdata['subject_teach'];?></label></td>
                                   </tr>
                               </table>
                           </div>

                           <h3 class="font-weight-bold mt-2 mb-3 ml-5">Educational Qualification</h3>
                           <div class="ml-5 table-responsive">
                               <table class="table table-hover table-bordered">
                                   <tr class="bg-success">
                                       <th>Exam</th>
                                       <th>Subject/Group</th>
                                       <th>Institute</th>
                                       <th>Result</th>
                                       <th>Year</th>
                                       <th>Awards</th>
                                   </tr>
                                   <tr>
                                       <td><?php echo $userdata['ssc'];?></td>
                                       <td><?php echo $userdata['ssc_sub'];?></td>
                                       <td><?php echo $userdata['ssc_inis'];?></td>
                                       <td><?php echo $userdata['ssc_res'];?></td>
                                       <td><?php echo $userdata['ssc_pass_year'];?></td>
                                       <td><?php echo $userdata['ssc_award'];?></td>
                                   </tr>
                                   <tr>
                                       <td><?php echo $userdata['hsc'];?></td>
                                       <td><?php echo $userdata['hsc_sub'];?></td>
                                       <td><?php echo $userdata['hsc_inis'];?></td>
                                       <td><?php echo $userdata['hsc_res'];?></td>
                                       <td><?php echo $userdata['hsc_pass_year'];?></td>
                                       <td><?php echo $userdata['hsc_award'];?></td>
                                   </tr>
                                   <tr>
                                       <td><?php echo $userdata['hons'];?></td>
                                       <td><?php echo $userdata['hons_sub'];?></td>
                                       <td><?php echo $userdata['hons_inis'];?></td>
                                       <td><?php echo $userdata['hons_res'];?></td>
                                       <td><?php echo $userdata['hons_pass_year'];?></td>
                                       <td><?php echo $userdata['hons_award'];?></td>
                                   </tr>
                                   <tr>
                                       <td><?php echo $userdata['msc'];?></td>
                                       <td><?php echo $userdata['msc_sub'];?></td>
                                       <td><?php echo $userdata['msc_inis'];?></td>
                                       <td><?php echo $userdata['msc_res'];?></td>
                                       <td><?php echo $userdata['msc_pass_year'];?></td>
                                       <td><?php echo $userdata['msc_award'];?></td>
                                   </tr>
                               </table>
                           </div>


                       </div>
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