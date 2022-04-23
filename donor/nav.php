<a class="navbar-brand" href="dashboard.php">Dash Board</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

        <li class="nav-item active">
            <a class="nav-link" href="post.php"> Post <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Profile
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="dashboard.php"><i class="fas fa-eye" style="color: green;"></i> View Profile</a>
                <a class="dropdown-item" href="edit_donor_info.php"><i class="fas fa-user-edit" style="color: red"></i> Update Profile</a>
                <a class="dropdown-item" href="changepassword.php"><i class="fas fa-unlock-alt" style="color: rebeccapurple"></i>  Change Password</a>
            </div>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="donation_history.php"> View Donation History <span class="sr-only">(current)</span></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="post.php" class="nav-link text-dark font-weight-bolder text-uppercase"><span><i class="far fa-user"></i></span> <span class="text-dark mr-3"><?php echo $userdata['first_name']; ?></span></a></li>
        <li class="nav-item"><a href="logout.php" class="nav-link text-dark font-weight-bold">Log Out</a></li>
    </ul>
</div>