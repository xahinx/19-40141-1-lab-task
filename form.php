<?php 
$fname = $lname= $gender= $phone= $email= $username= $password = "";
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$fname = validate($_POST["fname"] ?? "");
	$lname = validate($_POST["lname"] ?? "");
	$gender = validate($_POST["gender"] ?? "");
	$phone = validate($_POST["phone"] ?? "");
	$email = validate($_POST["email"] ?? "");
	$username = validate($_POST["username"] ?? "");
	$password =validate($_POST["password"] ?? "");
}

function validate($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
$isvalidate = true;
if($fname == ""){
	echo "First name is required" ;
	$isvalidate= false;
}
if($lname == ""){
	echo "Last name is required" ;
	$isvalidate= false;
}
if($gender == ""){
	echo "Gender is required" ;
	$isvalidate= false;
}
if($phone == ""){
	echo "Phone is required" ;
	$isvalidate= false;
}
if($email == ""){
	echo "Email is required" ;
	$isvalidate= false;
}
if($username == ""){
	echo "Username is required" ;
	$isvalidate= false;
}
if($password == ""){
	echo "Password is required" ;
	$isvalidate= false;
}
if($isvalidate){
	$hostname = "localhost";
	$dbusername= "root";
	$dbpassword = "";
	$database="test";
	$conn = new mysqli($hostname, $dbusername,$dbpassword,$database);
	if($conn->connect_error){
		die("Failed to connect: " . $conn);
	}
	$sql = "INSERT INTO user(fname , lname , gender, phone,email,username,password) WHERE VALUES (?,?,?,?,?,?,?)";
	$stmt = $conn->prepare($sql);
	if($stmt->execute()){
		echo "registration successful";
		echo "<a href='Login.html'>Click here to log in</a>";
	}
	else {
		echo "Failed to insert data";
	}
	$conn->close;
	echo "First name: " . $fname;
	echo "last name: " . $lname;
	echo "Gender: " . $gender;
	echo "Phone: " . $phone;
	echo "Email: " . $email;
	echo "Username: " . $username;
	echo "Password: " . $password;
}
?>
