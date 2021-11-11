<?php
include 'DatabaseConfig.php';


     require_once('dbConfig.php');
	 
	 // Check whether username or password is set from android	
    if(isset($_POST['username']) && isset($_POST['password']))
    {
  	 
	$username = $_POST['username'];
	$password = $_POST['password'];
	$result = '';
	
	$sql = mysqli_query($con,"SELECT * FROM LOGISTICS_USER WHERE USERNAME='$username' AND PASSWORD='$password';");
	if (!empty($sql)) {
	   //check for empty result
	   if (mysqli_num_rows($sql) > 0) {
			//$row = mysqli_fetch_array($result);

			$result="TRUE";
			if($result){
				echo json_encode($result);
			}
	   }else{
		               // no username found
			$result ="FALSE";
            // echo no users JSON
			
			if($result){
				echo json_encode($result);
			}
	   }	
	} else {
            // no username found
			$result ="FALSE";
            // echo no users JSON
			
			if($result){
				echo json_encode($result);
			}
    }
	}
	mysqli_close($con);
?>