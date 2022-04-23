<?php 

function userExists($username) {
	global $connect;

	$sql = "SELECT * FROM teachers WHERE username = '$username'";
	$query = $connect->query($sql);

	if($query->num_rows == 1) {
		return true;
	} else {
		return false;
	}

	$connect->close();

}


//make function registerUser
function registerUser() {
	global $connect;

	//image uploads
    $fileinfo = PATHINFO($_FILES['image']['name']); // file information
    $newfilename  = $fileinfo['filename']. "." .$fileinfo['extension']; // uploads path and name with extension
    move_uploaded_file($_FILES['image']['tmp_name'],"../images/" .$newfilename); // uploads file
    $location = $newfilename; // location info

	$fname     = $_POST['fname'];
	$lname     = $_POST['lname'];
	$username  = $_POST['username'];
	$password  = $_POST['password'];
	$nid       = $_POST['nid'];
	
	$newPassword = makePassword($password);

	if($newPassword) {
        $created = @date('Y-m-d H:i:s');
		$sql = "INSERT INTO teachers (first_name, last_name, username, nid, password, date, image, status) VALUES ('$fname', '$lname', '$username', '$nid', '$newPassword', '$created', '$location', '0')";
		$query = $connect->query($sql);
		if($query === TRUE) {
			return true;
		} else {
			return false;
		}
	} // /if

	$connect->close();
}


function makePassword($password) {
	return hash('sha256', $password);
}

//get all user information by username
function userdata($username) {
    global $connect;

	$sql = "SELECT * FROM teachers WHERE username = '$username'"; // select students username for getteing student data
	$query = $connect->query($sql);
	$result = $query->fetch_assoc(); // get all information
	if($query->num_rows == 1) {
		return $result;
	} else {
		return false;
	}

	$connect->close();
}

function login($username, $password) {

    global $connect;
	$userdata = userdata($username);

	if($userdata) {
		$makePassword = makePassword($password);
		$sql = "SELECT * FROM teachers WHERE username = '$username' AND password = '$makePassword'";
		$query = $connect->query($sql);

		if($query->num_rows == 1) {
			return true;
		} else {
			return false;
		}
	}

	$connect->close();
}

function getUserDataByUserId($id) {
    global $connect;

	$sql = "SELECT * FROM teachers WHERE id = $id";
	$query = $connect->query($sql);
	$result = $query->fetch_assoc();
	return $result;

	$connect->close();
}

function users_exists_by_id($id, $username) {
    global $connect;

	$sql = "SELECT * FROM teachers WHERE username = '$username' AND id != $id";
	$query = $connect->query($sql);
	if($query->num_rows >= 1) {
		return true;
	} else {
		return false;
	}

	$connect->close();
}

function updateInfo($id) {
    global $connect;

	$fname       = $_POST['fname'];
	$lname       = $_POST['lname'];
	$contact     = $_POST['contact'];
    $subject_teach = $_POST['subject_teach'];
	$address     = $_POST['address'];
    $exp         = $_POST['exp'];
 	$ssc         = $_POST['ssc'];
	$ssc_sub     = $_POST['ssc_sub'];
    $ssc_inis    = $_POST['ssc_inis'];
    $ssc_res     = $_POST['ssc_res'];
    $ssc_pass_year = $_POST['ssc_pass_year'];
    $ssc_award   = $_POST['ssc_award'];
    $hsc         = $_POST['hsc'];
    $hsc_sub     = $_POST['hsc_sub'];
    $hsc_inis    = $_POST['hsc_inis'];
    $hsc_res     = $_POST['hsc_res'];
    $hsc_pass_year = $_POST['hsc_pass_year'];
    $hsc_award   = $_POST['hsc_award'];
    $hons        = $_POST['hons'];
    $hons_sub     = $_POST['hons_sub'];
    $hons_inis    = $_POST['hons_inis'];
    $hons_res     = $_POST['hons_res'];
    $hons_pass_year = $_POST['hons_pass_year'];
    $hons_award   = $_POST['hons_award'];
    $msc       = $_POST['msc'];
    $msc_sub     = $_POST['msc_sub'];
    $msc_inis    = $_POST['msc_inis'];
    $msc_res     = $_POST['msc_res'];
    $msc_pass_year = $_POST['msc_pass_year'];
    $msc_award   = $_POST['mscc_award'];




    //update query
	$sql = "UPDATE teachers SET 
                         first_name = '$fname',
                         last_name = '$lname', 
                         contact = '$contact',
                         subject_teach = '$subject_teach',
                         address = '$address', 
                         exp     = '$exp',
                         ssc     = '$ssc',
                         ssc_sub = '$ssc_sub',
                         ssc_inis ='$ssc_inis',
                         ssc_res = '$ssc_res',
                         ssc_pass_year = '$ssc_pass_year',
                         ssc_award ='$ssc_award',
                         hsc = '$hsc',
                         hsc_sub = '$hsc_sub',
                         hsc_inis ='$hsc_inis',
                         hsc_res = '$hsc_res',
                         hsc_pass_year = '$hsc_pass_year',
                         hsc_award ='$hsc_award',
                         hons = '$hons',
                         hons_sub = '$hons_sub',
                         hons_inis ='$hons_inis',
                         hons_res = '$hons_res',
                         hons_pass_year = '$hons_pass_year',
                         hons_award ='$hons_award',
                         msc     = '$msc',
                         msc_sub = '$msc_sub',
                         msc_inis ='$msc_inis',
                         msc_res = '$msc_res',
                         msc_pass_year = '$msc_pass_year',
                         msc_award ='$msc_award'
                         
      
        
                       WHERE id = $id";
	$query = $connect->query($sql);
	if($query === TRUE) {
		return true;
	} else {
		return false;
	}
}
function logged_in() {
	if(isset($_SESSION['id'])) {
		return true;
	} else {
		return false;
	}
}

function not_logged_in() {
	if(isset($_SESSION['id']) === FALSE) {
		return true;
	} else {
		return false;
	}
}

function logout() {
	if(logged_in() === TRUE){
		// remove all session variable
		session_unset();

		// destroy the session
		session_destroy();

		header('location: ../teacher/teacher_login.php');
	}
}
function passwordMatch($id, $password) {
    global $connect;

	$userdata = getUserDataByUserId($id);

	$makePassword = makePassword($password);

	if($makePassword == $userdata['password']) {
		return true;
	} else {
		return false;
	}

	// close connection
	$connect->close();
}

//make function change password
function changePassword($id, $password) {

    global $connect;

	$makePassword = makePassword($password);
	$sql = "UPDATE teachers SET password = '$makePassword', WHERE id = $id"; // udate password
	$query = $connect->query($sql);

	if($query === TRUE) {
		return true;
	} else {
		return false;
	}
}


