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

$username=$_POST['username'];
$pas0=$_POST['psw'];
$pas1=$_POST['psw-repeat'];

if ($pas0==$pas1) {
  $sql = "SELECT * FROM USERS WHERE username='".$username."'";
  
  $res = $conn->query($sql);
	

  if ($res->fetch_row()[0]) {
  echo "Error. Username already registered!\n";
  } else {
    $sql = "INSERT INTO USERS (username, password)
    VALUES ('".$username."', '".$pas0."')";

    if ($conn->query($sql) === TRUE) {
    echo "Registered!\n";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error."\n";
    }
  }
}
else{
    echo "Error. Password does not match!\n";
}


?>