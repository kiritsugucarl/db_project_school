<?php
session_start();
include "connection.php";
if (isset($_SESSION['loggedInAsAdmin']) && $_SESSION['loggedInAsAdmin']) {
    header("Location:admin.php");
}
if (!$_SESSION['loggedInAsUser']) {
    header("Location:login.php");
}

$sql = "SELECT * FROM " . $tableName . " WHERE stud_id='" . $_SESSION["stud_id"] . "';";
$getUser = mysqli_query($conn, $sql);

$stud_data = mysqli_fetch_array($getUser);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OR Portal | View Data (User)</title>
    <link rel="stylesheet" href="styles.css" />
</head>

<body>
    <div class="header">
        <div class="header-school">
            <p class="header-title"><b>OURAN</b></p>
            <a href="#"><img class="header-logo" src="images/ouran-logo.png" /></a>
            <p class="header-title"><b>ACADEMY</b></p>
        </div>
        <div class="header-menu">
            <a href="logout.php" class="logout">LOGOUT</a>
        </div>
    </div>
    <div class="viewBox">
        <div class="side">
            <img class="profilePic" src="<?php echo $stud_data['picture'] ?>" />
            <p><?php echo $stud_data['name'] ?></p>
            <p><?php echo $stud_data['stud_id'] ?></p>
            <p>Student batch : <?php echo $stud_data['studbatch'] ?></p>
        </div>
        <div class="viewSection">
            <h6><?php echo $stud_data['department'] ?></h6>
            <h6><?php echo $stud_data['course'] ?></h6>
            <h6><?php echo $stud_data['level'] ?></h6>
            <hr />
            <div class="infoBox">
                <h2>BASIC INFORMATION</h2>
                <p>Gender : <?php echo $stud_data['gender'] ?></p>
                <p>Contact Number : <?php echo $stud_data['contact_num'] ?></p>
                <p>Email Address : <?php echo $stud_data['emailAddress'] ?></p>
                <p>Permanent Address : <?php echo $stud_data['homeAddress'] ?></p>
            </div>
            <hr />
            <div class="infoBox">
                <h2>PERSONAL INFORMATION</h2>
                <p>Birthday : <?php echo $stud_data['birthday'] ?></p>
                <p>Province Origin : <?php echo $stud_data['origProvince'] ?></p>
                <p>Nationality : <?php echo $stud_data['nationality'] ?></p>
                <p>Religion : <?php echo $stud_data['religion'] ?></p>
                <p>Marital Status : <?php echo $stud_data['mariStat'] ?></p>
                <p>Mother's Name : <?php echo $stud_data['mothers_name'] ?></p>
                <p>Father's Name : <?php echo $stud_data['fathers_name'] ?></p>
            </div>
            <hr />
            <div class="infoBox">
                <h2>IN CASE OF EMERGENCY</h2>
                <p>Contact Person : <?php echo $stud_data['contactPerson'] ?></p>
                <p>Relationship with Contact Person : <?php echo $stud_data['contactPersonRs'] ?></p>
                <p>Contact Person Number : <?php echo $stud_data['contactPersonNum'] ?></p>
            </div>
        </div>
    </div>
    <div class="footerUpdate">
        <p>ALL RIGHTS RESERVED 2022 | SYBIL SYSTEM</p>
    </div>
</body>

</html>
