<?php
	$servername = "localhost"; //set the servername
	$username = "root"; //set the server username
	$password = ""; // set the server password (you must put password here if your using live server)
	$dbname = "donation_database"; // set the table name

	$mysqli = new mysqli($servername, $username, $password, $dbname);

	if ($mysqli->connect_errno) {
	  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	  exit();
	}

	if($_COOKIE['otype'] == '1')
	$a=1;else $a=2;

	$b=$_COOKIE['btype'] ; $c=$_COOKIE['otype']; $d='\''.$_COOKIE['city'].'\''; $e=$_COOKIE['don'];

	// Set the INSERT SQL data
	$sql="SELECT * FROM user WHERE user.blood_or_organ =".$a." AND user.blood_type =".$b." AND user.organ_type =".$c." AND user.city LIKE ".$d." AND user.donator_or_requester =".$e;



	/*$selections = " type, name, email, DATE_FORMAT(time, '%W, (%D %M / %y) - %H:%i') AS time, photo_url, nationality, relegion, birthday ";
	$sq = "SELECT".$selections."FROM users INNER JOIN notification ON users.id = notification.sender WHERE notification.receiver";
	$sql = $sq . "=". $_COOKIE['u_id']; */

	$results = $mysqli->query($sql);
	

	// Fetch Associative array
	if($results){
		
	$row = $results->fetch_all(MYSQLI_ASSOC);

	// Free result set
	$results->free_result();

	// Close the connection after using it
	$mysqli->close();

	echo json_encode($row);
}
?>