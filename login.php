<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "task_b";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully\n";

$username=$_POST['uname'];
$pas0=$_POST['psw'];

$sql = "SELECT * FROM USERS WHERE username='".$username."' AND password='".$pas0."'";
$res = $conn->query($sql);
	
	  
  if ($res->fetch_row()[0]) {
	  header("Location: http://localhost/2cloud_task_B/main.html");
  } else {
	  echo "Error. Username or password incorrect!\n";
	  echo "you entered:".$pas0."\n";
  }
?>