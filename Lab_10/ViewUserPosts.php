<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
//access the global array called $_POST to get the values from the text fields

$user = $_POST['users'];

$mysqli = new mysqli("mysql.eecs.ku.edu", "kiranbisarya", "kiranpass", "kiranbisarya"); 
$query = "SELECT Posts.content, myUsers.user_id
		  FROM myUsers
		  INNER JOIN Posts ON Posts.author_id = myUsers.user_id WHERE myUsers.user_id='$user';";





/* check connection */ 
if ($mysqli->connect_errno) 
{ 
	printf("Connect failed: %s\n", $mysqli->connect_error); exit(); 
}



    if ($result = $mysqli->query($query)) 
    { 
         /*fetch associative array*/  
        while ($row = $result->fetch_assoc()) 
        { 
            printf ("%s\n", $row["content"]);
            echo "<br>"; 
        } 
        /* free result set */
        $result->free(); 
    }


$mysqli->close();
?>