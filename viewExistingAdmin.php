<?php
session_start();
include "connection.php";
if (isset($_SESSION['loggedInAsUser']) && $_SESSION['loggedInAsUser']) {
    header("Location:user.php");
}
if (!$_SESSION['loggedInAsAdmin']) {
    header("Location:login.php");
}

$id = unserialize(urldecode($_GET['studID']));
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

<?php
$sql = "SELECT * FROM " . $tableName . " WHERE stud_id = '" . $id['stud_id'] . "';";
$query = mysqli_query($conn, $sql);

$stud_data = mysqli_fetch_array($query);
if (!is_array($stud_data)) {
    die("ERROR WITH FETCHING THE DATA");
}
?>

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

    <a href="admin.php">Back to Admin</a>

    <div class="footer">
                <hr>
                <span>Copyright 2022. All Rights Reserved</span>
    </div>
</body>

</html>
