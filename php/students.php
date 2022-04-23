
<?php

function userExists($username) {
	global $connect;

	$sql = "SELECT * FROM students WHERE username = '$username'";
	$query = $connect->query($sql);

    //check user email
	if($query->num_rows == 1) {
		return true;
	} else {
		return false;
	}

	$connect->close();

}



function registerUser() {
	global $connect;

	//image uploads
    $fileinfo = PATHINFO($_FILES['image']['name']);
    $newfilename  = $fileinfo['filename']. "." .$fileinfo['extension'];
    move_uploaded_file($_FILES['image']['tmp_name'],"../images/" .$newfilename);
    $location = $newfilename; // location info

	$fname     = $_POST['fname'];
	$lname     = $_POST['lname'];
	$username  = $_POST['username'];
	$password  = $_POST['password'];
	$depertment = $_POST['depertment'];
	
	$newPassword = makePassword($password);
	if($newPassword) {
		$sql = "INSERT INTO students (first_name, last_name, username, password, depertment, image, status) VALUES ('$fname', '$lname', '$username', '$newPassword', '$depertment', '$location', '0')";
		$query = $connect->query($sql);
		if($query === TRUE) {
			return true;
		} else {
			return false;
		}
	} // /if

	$connect->close();
	// close the database connection
}

function makePassword($password) {
	return hash('sha256', $password);
}

function userdata($username) {
    global $connect;

	$sql = "SELECT * FROM students WHERE username = '$username'";
	$query = $connect->query($sql);
	$result = $query->fetch_assoc();
	if($query->num_rows == 1) {
		return $result;
	} else {
		return false;
	}

	$connect->close();
}

// making function login
function login($username, $password) {

    global $connect;
	$userdata = userdata($username);

	if($userdata) {
		$makePassword = makePassword($password);
		$sql = "SELECT * FROM students WHERE username = '$username' AND password = '$makePassword'";
		$query = $connect->query($sql);

		//check available user
		if($query->num_rows == 1) {
			return true;
		} else {
			return false;
		}
	}

	$connect->close();
	// close the database connection
}

function getUserDataByUserId($id) {
    global $connect;

	$sql = "SELECT * FROM students WHERE id = $id"; // select all students via id
	$query = $connect->query($sql);
	$result = $query->fetch_assoc();
	return $result;

	$connect->close();
	//database close
}

function users_exists_by_id($id, $username) {
    global $connect;

	$sql = "SELECT * FROM students WHERE username = '$username' AND id != $id";
	$query = $connect->query($sql);
	if($query->num_rows >= 1) {
		return true;
	} else {
		return false;
	}

	$connect->close();
}

//make update function
function updateInfo($id) {
    global $connect;

	$fname       = $_POST['fname'];
	$lname       = $_POST['lname'];
	$contact     = $_POST['contact'];
	$address     = $_POST['address'];
    $dob         = $_POST['dob'];
    $gender      = $_POST['gender'];
    $fathername  = $_POST['fathername'];
    $mothername  = $_POST['mothername'];
    $fatherphone = $_POST['fatherphone'];
    $motherphone = $_POST['motherphone'];

    //update query
	$sql = "UPDATE students SET  first_name = '$fname', last_name = '$lname', contact = '$contact', address = '$address', dob = '$dob', gender = '$gender', fathername = '$fathername', mothername = '$mothername', fatherphone = '$fatherphone', motherphone = '$motherphone' WHERE id = $id";
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

		header('location: student_login.php');
	}
}
function passwordMatch($id, $password) {
    global $connect;

	$userdata = getUserDataByUserId($id); // get user data by their id

	$makePassword = makePassword($password);

	if($makePassword == $userdata['password']) {
		return true;
	} else {
		return false;
	}

	// close connection
	$connect->close();
	//database close
}

function changePassword($id, $password) {

    global $connect;

	$makePassword = makePassword($password);
	$sql = "UPDATE users SET password = '$makePassword', WHERE id = $id"; // udate password
	$query = $connect->query($sql);

	//if password match then password will change
	if($query === TRUE) {
		return true;
	} else {
		return false;
	}
}


