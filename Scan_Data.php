<?php
include 'DatabaseConfig.php';

// Create connection
$conn = new mysqli($hostName , $userName, $password, $databaseName);

if ($conn->connect_error) {
 
 die("Connection failed: " . $conn->connect_error);
} 
    if(isset($_POST['upc']) && isset($_POST['quantity']) && isset($_POST['date_stamp']) && isset($_POST['user']))
    {
  	 
	$upc = $_POST['upc'];
	$quantity = $_POST['quantity'];
	$date_stamp = $_POST['date_stamp'];
	$user = $_POST['user'];
	$response = array();
	
	$sql = "INSERT INTO SCAN_DATE(UPC,QUANTITY,DATE_TIME,LOADED_BY) VALUES('$upc','$quantity','$date_stamp','$user')";
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
