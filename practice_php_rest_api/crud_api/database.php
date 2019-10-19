<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Method: PUT, POST, GET, DELETE");
	header("Access-Control-Allow-Header: Origin, X-Requested-With, Content-Type, Accept");

	define("db_host","localhost");
	define("db_user","root");
	define("db_pass","");
	define("db_name","practice_php_api");

	function connect(){
		$connect = mysqli_connect(db_host,db_user,db_pass,db_name);

		if(mysqli_connect_errno($connect)){
			die("Failed to Connect ".mysqli_connect_error());
		}

		mysqli_set_charset($connect,"utf8");
		return $connect;
	}

	$conn = connect();