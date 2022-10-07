<?php
$host = "localhost";
$user = "root";
$password = "";
$dbName = "school_sys_proto";
$tableName = "user";

$conn = mysqli_connect($host, $user, $password, $dbName) or die("Unable to connect " . $conn->connect_error);
