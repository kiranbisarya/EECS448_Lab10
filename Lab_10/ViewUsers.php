<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "kiranbisarya", "kiranpass", "kiranbisarya"); 

    /* check connection */ 
    if ($mysqli->connect_errno) 
    { 
        printf("Connect failed: %s\n", $mysqli->connect_error); exit(); 
    }

    $query = "SELECT * FROM myUsers";

    echo "<b>Users</b>";

    if ($result = $mysqli->query($query)) 
    { 
         /*fetch associative array*/  
        while ($row = $result->fetch_assoc()) 
        { 
            printf ("%s\n", $row["user_id"]);
            echo "<br>"; 
        } 
        /* free result set */
        $result->free(); 
    }
    
    /* close connection */ 
    $mysqli->close();
?>