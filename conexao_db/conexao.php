<?php
    $host = "localhost";
    $user = "root";
    $password = "root";
    $database = "db_coobaf";
    // Create connection
    $mysqli = new mysqli($host, $user, $password, $database);
	if ($mysqli -> connect_errno) {
        echo "Falha na conexão: (".$mysqli -> connect_errno.")" .mysqli_connect_error;
    }

?>