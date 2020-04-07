<?php
    ob_start();
    $serverName = "localhost";
    $userName = "root";
    $password = "123456";
   $dbName = "online-dbms-master";

    $conn = mysqli_connect($serverName, $userName, $password, $dbName);
    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

?>