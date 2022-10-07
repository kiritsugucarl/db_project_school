<?php
# ========================== CREDENTIALS OF DATABASE ===========================
$host = "localhost";
$user = "root";
$password = "";
$dbName = "school_sys_proto";
$tableName = "user";

# =========================== INITIAL CONNECTION ==============================
$conn = mysqli_connect($host, $user, $password);
if ($conn->connect_error) {
    die("Connection failed : " . $conn->connect_error);
}

# ========================= CREATION OF DATABASE ==============================
$sql = "CREATE DATABASE IF NOT EXISTS " . $dbName;
$retval = mysqli_query($conn, $sql);
if (!$retval) {
    die('DATABASE CREATION FAILED ' . mysqli_error($this->db_link));
} else {
    echo 'DATABASE ' . $dbName . ' CREATION SUCCESS </br>';
}

# ========================== NEW CONNECTIOJN ===================================

$conn = mysqli_connect($host, $user, $password, $dbName);
if ($conn->connect_error) {
    die("Connection had a problem : " . $conn->connect_error);
}

# =========================== CREATION OF TABLE ===============================

$sql = "CREATE TABLE IF NOT EXISTS " . $tableName . "(" . "stud_id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY," .
"username varchar(40) NOT NULL," .
"password varchar(30) NOT NULL," .
"name varchar(100) NOT NULL," .
"department varchar(100) NOT NULL," .
"level varchar(30) NOT NULL," .
"course varchar(100) NOT NULL," .
"gender char(1) NOT NULL," .
"contact_num varchar(20) NOT NULL," .
"religion varchar(100) NOT NULL," .
"mariStat varchar(50) NOT NULL," .
"homeAddress varchar(200) NOT NULL," .
"emailAddress varchar(200) NOT NULL," .
"mothers_name varchar(100) NOT NULL," .
"fathers_name varchar(100) NOT NULL," .
"picture varchar(255) NOT NULL," .
"birthday date NOT NULL," .
"origProvince varchar(100) NOT NULL," .
"nationality varchar(50) NOT NULL," .
"studbatch year(4) NOT NULL," .
"birthPlace varchar(100) NOT NULL," .
"contactPerson varchar(100) NOT NULL," .
"contactPersonRs varchar(50) NOT NULL," .
"contactPersonNum varchar(20) NOT NULL); ";

$retval = mysqli_query($conn, $sql);
if (!$retval) {
    die('TABLE CREATION FAILED ' . mysqli_error($this->db_link));
} else {
    echo 'TABLE ' . $tableName . " CREATION SUCCESS </br>";
}

# ============================== AMDIN CONNECTION ============================

$sql = "SELECT * FROM " . $tableName . " WHERE username ='admin'";
$retval = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($retval);

if(is_array($row))
{
    echo 'ADMIN CONNECTED !';
}
else{
    echo 'ADMIN FAILED TO CONNECT';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOADING</title>
</head>
<body>
    <p>Redirecting to school portal....</p><a href="login.php">Click to head to the page if it doesnt return at 5 seconds.</a>

    <script>
        setTimeout(function(){
            window.location.href='login.php';
        }, 5000);
    </script>
</body>
</html>
