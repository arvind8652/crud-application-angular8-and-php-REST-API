<?php
	require("database.php");

	// Get the Post Data
	$PostData = file_get_contents("php://input");
	 if(isset($PostData) && !empty($PostData)){
	 	// Extract data
	 	$require = json_decode($PostData);

	 	// Validate
	 	if(trim($require->FirstName)===''|| (trim($require->LastName)==='')){
	 		return http_response_code(400);
	 	}

	 	// Sanitize
	 	$FirstName = mysqli_real_escape_string($conn, trim($require->Firstname));
	 	$LastName = mysqli_real_escape_string($conn, trim($require->LastName));

	 	// create query
$sql = "INSERT INTO `crud_api` (`id`, `nsert_time`, `First_name`,`Last_name`,`Status`) VALUES(null,null,'{$FirstName}','{$LastName}','Inserted')";

	 	if(mysqli_query($conn, $sql)){
	 		http_response_code(201);
	 		$data =[
	 			'FirstName'=> $FirstName,
	 			'LastName'=> $LastName,
	 			'Id'=> mysqli_insert_id($conn),
	 			'Insert_time' => now()
	 		];
	 		echo json_encode($data);
	 	}
	 	else{
	 		http_response_code(422);
	 	}
	 }