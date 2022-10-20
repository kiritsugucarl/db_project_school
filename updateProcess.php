<?php
session_start();
include 'connection.php';
if (isset($_SESSION['loggedInAsUser']) && $_SESSION['loggedInAsUser']) {
    header("Location:user.php");
}
if (!$_SESSION['loggedInAsAdmin']) {
    header("Location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Form</title>
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
            <a href="admin.php" class="menu">MAIN MENU</a>
            <a href="logout.php" class="logout">LOGOUT</a>
        </div>
    </div>
<?php
$student_id = $_POST['stud_id'];
$name = $_POST['name'];
if (isset($_POST['update'])) {
    # Account Details
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email_add = $_POST['emailAddress'];

    # School Data
    $department = $_POST['department'];
    $level = $_POST['level'];
    $course = $_POST['course'];

    # Personal Info
    $birthdate = date('Y-m-d', strtotime($_POST['birthdate']));
    $gender = $_POST['gender'];
    $contactNum = $_POST['contactNum'];
    $religion = $_POST['religion'];
    $maritalStat = $_POST['maritalStat'];
    $homeAdd = $_POST['homeAdd'];
    $provinceOrig = $_POST['provinceOrig'];
    $nationality = $_POST['nationality'];
    $birthPlace = $_POST['placeOfBirth'];
    $contactPerson = $_POST['contactPerson'];
    $contactRs = $_POST['contactRs'];
    $cPerNum = $_POST['cPerNum'];
    $mothersName = $_POST['mothersName'];
    $fathersName = $_POST['fathersName'];

    $sql = "UPDATE " . $tableName . " SET username='" . $username . "'," .
        "password='" . $password . "'," .
        "name='" . $name . "'," .
        "department='" . $department . "'," .
        "level='" . $level . "'," .
        "course='" . $course . "'," .
        "gender='" . $gender . "'," .
        "contact_num='" . $contactNum . "'," .
        "religion='" . $religion . "'," .
        "mariStat='" . $maritalStat . "'," .
        "homeAddress='" . $homeAdd . "'," .
        "emailAddress='" . $email_add . "'," .
        "mothers_name='" . $mothersName . "'," .
        "fathers_name='" . $fathersName . "'," .
        "birthday='" . $birthdate . "'," .
        "origProvince='" . $provinceOrig . "'," .
        "nationality='" . $nationality . "'," .
        "birthPlace='" . $birthPlace . "'," .
        "contactPerson='" . $contactPerson . "'," .
        "contactPersonRs='" . $contactRs . "'," .
        "contactPersonNum='" . $cPerNum . "'" .
        " WHERE stud_id =" . $student_id . ";";
    $process = mysqli_query($conn, $sql);
    if ($process) {
        echo '<p class="updated"> ' . 'INFORMATION OF ' . $name . ' WITH STUDENT ID OF ' . $student_id . ' <span style="color: Green"><b>UPDATED!</b></span>' . '</p>';
    } else {
        die("ERROR . " . $conn->connect_error);
    }

}

if (isset($_POST['delete'])) {
    $sql = "DELETE FROM " . $tableName . " WHERE stud_id=" . $student_id . ";";
    $process = mysqli_query($conn, $sql);

    if ($process) { 
        echo '<p class="deleted"> ' . 'INFORMATION OF ' . $name . ' WITH STUDENT ID OF ' . $student_id . ' IS NOW <span style="color: Red"><b>DELETED</b></span>' . '</p>';
    } else {
        die("ERROR . " . $conn->connect_erorr);
    }
}

?>

    <div class="footerUpdate">
        <p>ALL RIGHTS RESERVED 2022 | SYBIL SYSTEM</p>
    </div>
</body>
</html>



