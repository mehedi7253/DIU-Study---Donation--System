


<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="">
            <span> <p class="text-center"><img class="img-fluid" src="../images/<?php echo $userdata['image'] ?>" title="<?php echo $userdata['first_name']?>" alt="card image" style="height: 150px; width: 150px; border-radius: 67%"></p></span>
        </a>
    </li>
    <li class="nav-item">
        <a href="student_dasboard.php" class="nav-link card-symbol"><span class="card_view"><i class="fas fa-eye" style="color: green;"></i><span class="ml-3">View Profile</span></span></a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-edit" style="color: #BE4BDB"></i>
            <span>Update Profile</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="edit_student_info.php"><i class="fas fa-user-edit" style="color: #0c5460"></i> <span class="ml-2">Update Profile</span></a>
            <a class="dropdown-item" href="changepassword.php"><i class="fas fa-unlock-alt" style="color: #005cbf"></i> <span class="ml-2">Change Password</span></a>
        </div>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-hand-holding-usd" style="color: greenyellow"></i>
            <span>Donation</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="request_donation.php"><i class="fas fa-hand-holding-usd" style="color: greenyellow"></i> <span class="ml-2">Request Donation</span></a>
            <a class="dropdown-item" href="rechive_donation.php"><i class="fas fa-unlock-alt" style="color: #005cbf"></i> <span class="ml-2">Receive Donation</span></a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-exchange-alt" style="color: green;"></i>
            <span>Exchange</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="request_exchange.php"><i class="fas fa-exchange-alt" style="color: green;"></i><span class="ml-2">Request Exchange</span></a>
            <a class="dropdown-item" href="rechive_exchange.php"><i class="fas fa-exchange-alt" style="color: green;"></i> <span class="ml-2">Receive Exchange</span></a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-book-open" style="color: white"></i>
            <span>Sell Book</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="sell_request.php"><i class="fas fa-book-open" style="color: black"></i><span class="ml-2">Request Sell</span></a>
            <a class="dropdown-item" href="recive_sell.php"><i class="fas fa-exchange-alt" style="color: green;"></i> <span class="ml-2">Receive</span></a>
        </div>
    </li>
    <li class="nav-item">
        <a href="exam/index.php" target="_blank" class="nav-link card-symbol"><i class="fas fa-spell-check" style="color:  white"></i><span class="card_view"><span class="ml-3">Give Exam</span></span></a>
    </li>
    <li class="nav-item">
        <a href="course_video.php" class="nav-link card-symbol"><i class="fas fa-play-circle" style="color: #cce5ff;"></i><span class="card_view"><span class="ml-3">Course Video</span></span></a>
    </li>
    <li class="nav-item">
        <a href="send_request.php" class="nav-link card-symbol"><i class="fas fa-angle-double-right"></i><span class="card_view"><span> Application New Course</span></span></a>
    </li>
    <li class="nav-item">
        <a href="notice.php" class="nav-link card-symbol"><i class="fas fa-bell"></i><span class="card_view"><span class="ml-3"> Notice</span></span></a>
    </li>
    <li class="nav-item">
        <a href="view.php" class="nav-link card-symbol"><i class="fas fa-book-reader" style="color: green"></i><span class="card_view"><span class="ml-3">View Upload File</span></span></a>
    </li>


</ul>

