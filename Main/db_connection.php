<?php
    $server_address = "localhost";
    $username = "root";
    $password = "";
    $database_name = "movie-mastermind";

    $conn = new mysqli($server_address,$username,$password, $database_name);

    if (!$conn )
    {
        die("Fail to conected with MySQL");
    }

?>