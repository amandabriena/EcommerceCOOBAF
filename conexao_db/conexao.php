<?php
    $host = "localhost";
    $user = "root";
    $password = "root";
    $database = "db_coobaf";
    // Create connection
    $connect = new mysqli($host, $user, $password, $database);
	if ($connect -> connect_errno) {
        echo "Falha na conexão: (".$connect -> connect_errno.")" .mysqli_connect_error;
    }

?>