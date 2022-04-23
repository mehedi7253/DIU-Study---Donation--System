<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="dashboard.html">DIU Something</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>
    <?php
        $depertment = $userdata['depertment'];
        $count = 0;
        $sql2="SELECT * FROM event WHERE depertment = '$depertment' AND notify = 0";
        $result=mysqli_query($connect, $sql2);
        $count=mysqli_num_rows($result);
    ?>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="notification-icon" onclick="myFunction()"><span id="notification-count" style="font-size: 15px; color: red;"><?php if($count>0) { echo $count; } ?></span><i class="far fa-bell fa-1x" style="color: white; height: 30px"></i></a>

                <div class="dropdown-menu dropdown-menu-right">
                    <?php
//                    $sql="UPDATE booking SET notify=1 WHERE notify=0";
//                    $result=mysqli_query($connect, $sql);

                    $sql="SELECT event_title FROM event WHERE depertment = '$depertment' AND notify = 0 ORDER BY id DESC limit 5";
                    $result=mysqli_query($connect, $sql);

                    $response='';
                    while($row=mysqli_fetch_array($result)) {
                        $response = $response . "<a href='notification.php'><div class='notification-item' style='padding:10px; cursor:pointer;'>" .
                            "<div class='notification-comment' style='white-space: nowrap; overflow: hidden; text-overflow: ellipsis;'>" . $row["event_title"]  . "</div>" .
                            "</div></a>";
                    }
                    if(!empty($response)) {
                        print $response;
                    }

                    ?>
                    </div>
            </li>
            <li class="nav-item"><a href="logout.php" class="nav-link text-white font-weight-bold">Log Out</a></li>
        </ul>
    </div>
    <!-- Navbar -->
</nav>

<script type="text/javascript">

    function myFunction() {
        $.ajax({
            url: "view_notification.php",
            type: "POST",
            processData:false,
            success: function(data){
                $("#notification-count").remove();
                $("#notification-latest").show();$("#notification-latest").html(data);
            },
            error: function(){}
        });
    }

    $(document).ready(function() {
        $('body').click(function(e){
            if ( e.target.id != 'notification-icon'){
                $("#notification-latest").hide();
            }
        });
    });

</script>