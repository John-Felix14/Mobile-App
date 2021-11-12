<?php
include 'DatabaseConfig.php';

// Create connection
$conn = new mysqli($Hostname, $Hostname, $Hostname, $Databasename);


if ($conn->connect_error) {
 
 die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM BOOKING_INFO WHERE STATUS='IN-TRANSIT';";

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
