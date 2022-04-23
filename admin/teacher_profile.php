<?php

    include '../php/config.php';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teacher Profile</title>
    <link rel="stylesheet" href="../assets/style/bootstrap.css">
    <link rel="icon" href="../images/logo.PNG">
</head>
<body>
<!--    nav bar-->
<header>

</header>
<!--end nab bar-->
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 mt-5 mb-5">
            <div class="card">
                <?php
                if (isset($_GET['profile'])){
                    $id = $_GET['profile'];

                    $q = "SELECT * FROM teachers WHERE id = $id";

                    $r = mysqli_query($connect, $q);
                    $data = mysqli_fetch_assoc($r);
                }
                ?>
                <div class="card-header">
                    <h4 class="text-info font-weight-bold mb-3"><?php echo $data['first_name']?> <span><?php echo $data['last_name']?></span> Profile <span class="float-right"><a href="admin_dashboard.php" class="btn btn-info">Home</a></span></h4>
                </div>
                <div class="card-body">
                    <div class="col-md-3 col-sm-12 float-left">
                        <img class="img-fluid" src="../images/<?php echo $data['image'];?>" style="height: 200px;">
                    </div>

                    <div class="col-md-8 ml-5 col-sm-12 float-left">
                        <div class="ml-5">
                            <label class="text-info font-weight-bold text-capitalize"> <?php echo $data['first_name'];?> <span> <?php echo $data['last_name'];?></span></label><br/>

                            <label class="font-weight-bold text-capitalize"> #ID: <?php echo $data['id'];?></label><br/>
                        </div>


                        <h3 class="font-weight-bold mt-2 mb-3 ml-5">Personal Information</h3>
                        <div class="ml-5 table-responsive">
                            <table class="table t">
                                <tr>
                                    <th> Experience </th>
                                    <td> <label class="text-capitalize"> <?php echo $data['exp'];?></label></td>
                                </tr>
                                <tr>
                                    <th>  Mobile </th>
                                    <td> <label class="text-capitalize"><?php echo $data['contact'];?></label></td>
                                </tr>
                                <tr>
                                    <th>  Email </th>
                                    <td> <label class="text-capitalize"><?php echo $data['username'];?></label></td>
                                </tr>
                                <tr>
                                    <th>  NID </th>
                                    <td> <label class="text-capitalize"><?php echo $data['nid'];?></label></td>
                                </tr>
                                <tr>
                                    <th>  Address </th>
                                    <td> <label class="text-capitalize"><?php echo $data['address'];?></label></td>
                                </tr>
                                <tr>
                                    <th>  Join Date </th>
                                    <td> <label class="text-capitalize"><?php echo $data['date'];?></label></td>
                                </tr>
                                <tr>
                                    <th>  Subject Take </th>
                                    <td> <label class="text-capitalize"><?php echo $data['subject_teach'];?></label></td>
                                </tr>
                            </table>
                        </div>

                        <h3 class="font-weight-bold mt-2 mb-3 ml-5">Educational Qualification</h3>
                        <div class="ml-5 table-responsive">
                            <table class="table table-hover">
                               <tr class="bg-success">
                                   <th>Exam</th>
                                   <th>Subject/Group</th>
                                   <th>Institute</th>
                                   <th>Result</th>
                                   <th>Year</th>
                                   <th>Awards</th>
                               </tr>
                                <tr>
                                    <td><?php echo $data['ssc'];?></td>
                                    <td><?php echo $data['ssc_sub'];?></td>
                                    <td><?php echo $data['ssc_inis'];?></td>
                                    <td><?php echo $data['ssc_res'];?></td>
                                    <td><?php echo $data['ssc_pass_year'];?></td>
                                    <td><?php echo $data['ssc_award'];?></td>
                                </tr>
                                <tr>
                                    <td><?php echo $data['hsc'];?></td>
                                    <td><?php echo $data['hsc_sub'];?></td>
                                    <td><?php echo $data['hsc_inis'];?></td>
                                    <td><?php echo $data['hsc_res'];?></td>
                                    <td><?php echo $data['hsc_pass_year'];?></td>
                                    <td><?php echo $data['hsc_award'];?></td>
                                </tr>
                                <tr>
                                    <td><?php echo $data['hons'];?></td>
                                    <td><?php echo $data['hons_sub'];?></td>
                                    <td><?php echo $data['hons_inis'];?></td>
                                    <td><?php echo $data['hons_res'];?></td>
                                    <td><?php echo $data['hons_pass_year'];?></td>
                                    <td><?php echo $data['hons_award'];?></td>
                                </tr>
                                <tr>
                                    <td><?php echo $data['msc'];?></td>
                                    <td><?php echo $data['msc_sub'];?></td>
                                    <td><?php echo $data['msc_inis'];?></td>
                                    <td><?php echo $data['msc_res'];?></td>
                                    <td><?php echo $data['msc_pass_year'];?></td>
                                    <td><?php echo $data['msc_award'];?></td>
                                </tr>
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
