<?php
include 'DatabaseConfig.php';

// Create connection
$conn = new mysqli($hostName , $userName, $password, $databaseName);

if ($conn->connect_error) {
 
 die("Connection failed: " . $conn->connect_error);
} 
    if(isset($_POST['booking_id']) && isset($_POST['part_number']) && isset($_POST['description']) && isset($_POST['quantity']) && isset($_POST['weight_lbs']) && isset($_POST['weight_kgs']) && isset($_POST['job_number']) && isset($_POST['invoice_number']) && isset($_POST['booking_number']) && isset($_POST['container_number']) && isset($_POST['container_tag']) && isset($_POST['packing_type']) && isset($_POST['packing_number']) && isset($_POST['date_stamp']) && isset($_POST['time_stamp']))
    {
  	 
	$booking_id = $_POST['booking_id'];
	$part_number = $_POST['part_number'];
	$description = $_POST['description'];
	$quantity = $_POST['quantity'];
	$weight_kgs = $_POST['weight_kgs'];
	$weight_lbs = $_POST['weight_lbs'];
	$job_number = $_POST['job_number'];
	$invoice_number = $_POST['invoice_number'];
	$booking_number = $_POST['booking_number'];
	$container_number = $_POST['container_number'];
	$container_tag = $_POST['container_tag'];
	$packing_type = $_POST['packing_type'];
	$packing_number = $_POST['packing_number'];
	$date_stamp = $_POST['date_stamp'];
	$time_stamp = $_POST['time_stamp'];
	$response = array();
	
	$sql = "INSERT INTO ITEM_LOADING(ID,PART_NUMBER,DESCRIPTION,QTY,GROSS_WEIGHT_KGS,GROSS_WEIGHT_LBS,JOB_NUMBER,INVOICE_NUMBER,BOOKING_NUMBER,CONTAINER_NUMBER,CONTAINER_TAG,PACKAGING_TYPE,PACKAGING_NUMBER,DATE_STAMP,TIME_STAMP) VALUES('$booking_id','$part_number','$description','$quantity','$weight_kgs','$weight_lbs','$job_number','$invoice_number','$booking_number','$container_number','$container_tag','$packing_type','$packing_number','$date_stamp','$time_stamp')";
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
