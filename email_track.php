<?php

//email_track.php

$connect = new PDO("mysql:host=localhost;dbname=email_track_database", "root","");

if(isset($_GET["code"]))
{

	$query = "
	INSERT INTO  email_track (email_track_code,email_status,email_open_datetime) VALUES (?,?,?) ";
	$statement = $connect->prepare($query);
	$statement->execute([''.$_GET["code"].'','yes',''.date("Y-m-d H:i:s", STRTOTIME(date('h:i:sa'))).'']);

}

?>
