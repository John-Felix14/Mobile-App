<?php
ini_set('Display_error',0);
include 'DatabaseConfig.php';

//Create Connection
$conn = new mysqli($hostName ,$userName ,$password ,$databaseName);


if ($conn->connection_error) {

    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['JOB_NUMBER']) && isset($_POST['Scan_Data'])
){


    $Scan_Data = $_POST['Scan_Data'];
    $container_number=$_POST['container_number'];
        
    
    $sql = "SELECT * FROM ITEM_LOADING WHERE ID='$Scan_Data' AND CONTAINER_NUMBER='$container_number'";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows >0) {
     
     
     while($row[] = $result->fetch_assoc()) {
     
     $tem = $row;
     
     $json = json_encode($tem);
     
     
     }
      echo $json; 
    } else {
      http_response_code(404);
      echo json_encode([
        "error" => 0,
        "message" => "No Results Found."
      ]);
    }
    }
     mysqli_close($conn);
    ?>
