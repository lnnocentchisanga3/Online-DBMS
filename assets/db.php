<?php
    ob_start();
    $serverName = "localhost";
    $userName = "root";
    $password = "";
   $dbName = "online-dbms-master";

    $conn = mysqli_connect($serverName, $userName, $password, $dbName);
    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

?>