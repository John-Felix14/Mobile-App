<?php
include 'DatabaseConfig.php';

// Create connection
$conn = new mysqli($HostName , $HostName, $HostName, $DatabaseName;

if ($conn->connect_error) {
 
 die("Connection failed: " . $conn->connect_error);
} 
     if(isset($_POST['booking_id']))
     {

$booking_id = $_POST['booking_id'];

	 }

$sql = "SELECT * FROM CONTAINER_INFO WHERE ID='$booking_id'";

$result = $conn->query($sql);

if ($result->num_rows >0) {
 
 
 while($row[] = $result->fetch_assoc()) {
 
 $tem = $row;
 
 $json = json_encode($tem);
 
 
 }
  echo $json; 
} else {
 echo "No Results Found.";
}

 mysqli_close($conn);
?>
