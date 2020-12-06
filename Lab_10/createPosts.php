<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
//access the global array called $_POST to get the values from the text fields

$username = $_POST['username'];
$post = $_POST['post'];

$mysqli = new mysqli("mysql.eecs.ku.edu", "kiranbisarya", "kiranpass", "kiranbisarya"); 
$query = "INSERT INTO Posts (author_id, content) VALUES ('$username','$post')";
$sql_u = "SELECT * FROM myUsers WHERE user_id='$username'";
$res_u = mysqli_query($mysqli, $sql_u);




/* check connection */ 
if ($mysqli->connect_errno) 
{ 
	printf("Connect failed: %s\n", $mysqli->connect_error); exit(); 
}



if($post == '')
{
	echo "Post field empty. Data not stored";
}
else if(mysqli_num_rows($res_u) == 0)
{
	echo "User does not exist. Data not stored";
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