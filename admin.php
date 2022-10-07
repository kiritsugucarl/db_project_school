<?php
session_start();
if(!$_SESSION['loggedInAsAdmin'])
{
    header("Location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="styles.css" />
</head>

<body>
    <div class="header">
        <a href="#"><img class="logo" src="images/placeholder.png" /></a>
        <h3>School Name</h3>
    </div>

    <div>
        <h2><?php echo $_SESSION['uName'] . ' Connected Successfully.' ?></h2>
            <div class="button-set">
                <a href="enroll.php"> Enroll</a>
                <a href="update.php"> Update Existing Data</a>
                <a href="viewAdmin.php"> View Existing Data</a>
            </div>
    </div>
    Click to <a href="logout.php">Logout</a>
</body>

</html>
