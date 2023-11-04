<?php

$search = $_POST['search'];

$servername = "localhost";
$username = "root";
$password = "";
$db = "task_b";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "select * from products where name like '%$search%'";

$result = $conn->query($sql);
echo "<table border=1 cellspacing=1 cellpadding=1><tr>";
echo "<td>Name</td><td>Code</td><td>Price</td><td>Size</td><td>Color</td><td>id</td>";

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
	echo "<tr><td>".$row["Name"]."</td><td>".$row["Code"]."</td><td>".$row["Price"]."</td><td>".$row["Size"]."</td><td>".$row["Color"]."</td><td>".$row["id"]."</tr>";
}
} else {
	echo "0 records";
}
echo "</table>";

$conn->close();

?>