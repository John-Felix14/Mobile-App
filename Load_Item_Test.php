<?php
include 'DatabaseConfig.php';


$HostName = "94phapp1";
$DatabaseName = "mysql";
$HostUser = "admin";
$HostPass = "ChiefLanLord123";

// Create connection
$conn = new mysqli($HostName $HostName, $HostName, $DatabaseName);

if ($conn->connect_error) {
 
 die("Connection failed: " . $conn->connect_error);
} 
    if(isset($_POST['booking_id']) && isset($_POST['part_number']) && isset($_POST['description']) && isset($_POST['quantity']) && isset($_POST['weight_lbs']) && isset($_POST['weight_kgs']) && isset($_POST['job_number']) && isset($_POST['invoice_number']) && isset($_POST['booking_number']) && isset($_POST['container_number']) && isset($_POST['container_tag']) && isset($_POST['packing_type']) && isset($_POST['packing_number']) && isset($_POST['date_stamp']) && isset($_POST['time_stamp']))
    {
  	 
	$booking_id = "0";//$_POST['booking_id'];
	$part_number = "11111";//$_POST['part_number'];
	$description = "sample";//$_POST['description'];
	$quantity = "1";//$_POST['quantity'];
	$weight_kgs = "1";//$_POST['weight_kgs'];
	$weight_lbs = "1";//$_POST['weight_lbs'];
	$job_number = "1";//$_POST['job_number'];
	$invoice_number = "1";
	$booking_number = "1";
	$container_number = "1";
	$container_tag = "1";
	$packing_type = "1";
	$packing_number = "1";
	$date_stamp = "1";
	$time_stamp = "1";
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
?>