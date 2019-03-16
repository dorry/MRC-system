<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mrc";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    //Database Conection for Classes:
    Class database{
        static function DBC(){
            $conn = mysqli_connect("localhost", "root", "", "mrc");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            return $conn;
        }
    }
?>