<?php

//this script is only to be run after the index has been run atleast once
include 'connection.php';

$sql = "INSERT INTO " . $tableName . "(stud_id, username, password)" . "VALUES('0', 'admin', 'admin')";
$createAdmin = mysqli_query($conn, $sql);
if(!$createAdmin){
    die("Admin Creation Failed.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Initial Config Page</title>
</head>
<body>
    <h3>ADMIN CREATION SUCCESSFUL</h3>
    <h4>Redirecting Page</h4>

    <script>
        setTimeout(function(){
            window.location.href='index.php';
        }, 5000);
    </script>
</body>
</html>