<?php
	$request = $_REQUEST; //a PHP Super Global variable which used to collect data after submitting it from the form
	
	$fullname = $request['fname']; //get the date of birth from collected data above
	$birthdate = $request['date']; //get the date of birth from collected data above
	$numb =$request['phone'];
	$email =$request['email'];
	$city =$request['city'];
	$btype =$request['btype'];
	$otype =$request['otype'];
	

	if(isset($request['con'])) $con = 1;
	else $con=2;

	
	$b_or_g = "organs";
	if($otype == "1")
	{$b_or_g = "blood";}
	
	
	
	$recipient = "recipient";
	/*
	recipient = 1 (recipient)| 2 (donator)
	b_or_g = 1 (no organ) | 2 (organ)
	

	*/

	

	$servername = "localhost"; //set the servername
	$username = "root"; //set the server username
	$password = ""; // set the server password (you must put password here if your using live server)
	$dbname = "donation_database"; // set the table name

	$mysqli = new mysqli($servername, $username, $password, $dbname);

	if ($mysqli->connect_errno) {
	  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	  exit();
	}

	// Set the INSERT SQL data
	$sql = "INSERT INTO user (name, birthdate, email, mobile,  blood_or_organ , blood_type, organ_type, city, donator_or_requester, con_privacy)
	VALUES ('".$fullname."', '".$birthdate."', '".$email."', '".$numb."', '".$b_or_g."','".$btype."','".$otype."','".$city."','".$recipient."','".$con."')";

	// 		INSERT INTO user (name, birthdate, email, mobile, psw, blood_or_organ , blood_type, organ_type, city, donator_or_requester)
	//		VALUES ('x', '19990808', 'x', 'x','x', 1,1,2,'x',2)

	// Process the query so that we will save the date of birth
	if ($mysqli->query($sql)) {
	  		echo "registered successfully";
	} else {
	  return "Error: " . $sql . "<br>" . $mysqli->error;
	}

	// Close the connection after using it
	$mysqli->close();
?>