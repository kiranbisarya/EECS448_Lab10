<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
//access the global array called $_POST to get the values from the text fields

$username = $_POST['username'];
$mysqli = new mysqli("mysql.eecs.ku.edu", "kiranbisarya", "kiranpass", "kiranbisarya"); 
$query = "INSERT INTO myUsers VALUES ('$username')";
$sql_u = "SELECT * FROM myUsers WHERE user_id='$username'";
$res_u = mysqli_query($mysqli, $sql_u);




/* check connection */ 
if ($mysqli->connect_errno) 
{ 
	printf("Connect failed: %s\n", $mysqli->connect_error); exit(); 
}



if($username == '')
{
	echo "Text field empty. Data not stored";
}
else if(mysqli_num_rows($res_u) > 0)
{
	echo "User already exists. Data not stored";
}
else if($mysqli->query($query) === TRUE) 
{
	echo "Data stored successfully";
}
else
{
	break;
}


$mysqli->close();
?>