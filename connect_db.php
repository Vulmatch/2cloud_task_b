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

$request=$_POST['request'];
switch ($request) {
    case "add":
	    $name=$_POST['name'];
        $code=$_POST['code'];
		$price=$_POST['price'];
		$size=$_POST['size'];
		$color=$_POST['color'];
		add_rec($conn,$name,$code,$price,$size,$color);
        break;
    case "update":
	    $id=$_POST['id'];
	    $name=$_POST['name'];
        $code=$_POST['code'];
		$price=$_POST['price'];
		$size=$_POST['size'];
		$color=$_POST['color'];
		update_rec($conn,$name,$code,$price,$size,$color,$id);
        break;
    case "delete":
	    $id=$_POST['id'];
        delete_rec($conn,$id);
        break;
}
$conn->close();

function add_rec($conn,$name,$code,$price,$size,$color) {
$sql = "INSERT INTO PRODUCTS (Name, Code, Price, Size, Color)
VALUES ('".$name."', '".$code."', ".$price.",".$size.",'".$color."')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully\n";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

function delete_rec($conn,$name) {
$sql = "DELETE FROM PRODUCTS WHERE id=".$name;

  if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } else {
  echo "Error deleting record: " . $conn->error;
  }

//$conn->close();
}

function update_rec($conn,$name,$code,$price,$size,$color,$id) {
  $sql = "UPDATE PRODUCTS SET Name='".$name."', Code='".$code."', Price=".$price.", Size=".$size.", Color='".$color."' WHERE id=".$id;

  if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
  } else {
  echo "Error updating record: " . $conn->error;
  }

}

?>
