<?php
include 'DatabaseConfig.php';

$HostName = "94phapp1";
$DatabaseName = "mysql";
$HostUser = "admin";
$HostPass = "ChiefLanLord123";

// Create connection
$conn = new mysqli($HostName, $HostName, $HostName, $DatabaseName;

if ($conn->connect_error) {
 
 die("Connection failed: " . $conn->connect_error);
} 
    if(isset($_POST['job_number']) && isset($_POST['part_number']) && isset($_POST['balance']))
    {
  	 
	$job_number = $_POST['job_number'];
	$part_number = $_POST['part_number'];
	$quantity = $_POST['quantity'];
	$response = array();
	
	$sql = "UPDATE BOM_ITEMS SET BALANCE=BALANCE - '$balance' WHERE JOB_NUMBER='$job_number' AND PART_NUMBER='$part_number";
	$result = $conn->query($sql);
	if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Product successfully created.";
 
        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
 
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
	mysqli_close($conn);
?>