<?php
session_start();
include 'connection.php';
if (isset($_SESSION['loggedInAsUser']) && $_SESSION['loggedInAsUser']) {
    header("Location:user.php");
}
if (!$_SESSION['loggedInAsAdmin']) {
    header("Location:login.php");
}

# Account Details
$name = $_POST['lName'] . ", " . $_POST['fName'] . " " . $_POST['mName'];
$username = $_POST['username'];
$password = $_POST['password'];
$email_add = $_POST['email_add'];

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
$placeOfBirth = $_POST['placeOfBirth'];
$contactPerson = $_POST['contactPerson'];
$contactRs = $_POST['contactRs'];
$cPerNum = $_POST['cPerNum'];
$mothersName = $_POST['mothersName'];
$fathersName = $_POST['fathersName'];

if (isset($_FILES['picture'])) {
    $file = $_FILES['picture'];

    $fileName = $_FILES['picture']['name'];
    $fileTmpName = $_FILES['picture']['tmp_name'];
    $fileSize = $_FILES['picture']['size'];
    $fileError = $_FILES['picture']['error'];
    $fileType = $_FILES['picture']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'webp');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $picture = "images/uploads/" . $fileNameNew;
                move_uploaded_file($fileTmpName, $picture);
            } else {
                header("Location:enroll.php");
                echo "File too big";
            }
        } else {
            header("Location:enroll.php");
            echo "Error";
        }
    } else {
        header("Location:enroll.php");
        echo "Jpg, Jpeg, Png, Webp Only";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Enrollment</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="header">
        <a href="#"><img class="logo" src="images/placeholder.png" /></a>
        <h3>School Name</h3>
    </div>

    <div class="box">
        <div class="side">

        </div>

        <div class="main-content">
            <form action="enrollProcess.php" method="POST" enctype="multipart/form-data">
                <div class="form-set">
                    <h1>ACCOUNT DETAILS</h1>
                    <span>Full Name : <?php echo $name ?></span>
                    <?php echo "<input type='hidden' name='name' value='" . $name . "'>"; ?>
                    <br><br>
                    <span>Username  : <?php echo $username ?></span>
                    <?php echo "<input type='hidden' name='username' value='" . $username . "'>"; ?>
                    <br><br>
                    <span>Password  : <?php echo $password ?></span>
                    <?php echo "<input type='hidden' name='password' value='" . $password . "'>"; ?>
                    <br><br>
                    <span>E-Mail Address  : <?php echo $email_add ?></span>
                    <?php echo "<input type='hidden' name='email_add' value='" . $email_add . "'>"; ?>
                    <br><br>
                </div>
                <hr>
                <div class="form-set">
                    <h1>Important Information</h1>
                    <span>Department  : <?php echo $department ?></span>
                    <?php echo "<input type='hidden' name='department' value='" . $department . "'>"; ?>
                    <br><br>
                    <span>Level  : <?php echo $level ?></span>
                    <?php echo "<input type='hidden' name='level' value='" . $level . "'>"; ?>
                    <br><br>
                    <span>Course  : <?php echo $course ?></span>
                    <?php echo "<input type='hidden' name='course' value='" . $course . "'>"; ?>
                    <br><br>
                    <span>Birthdate  : <?php echo $birthdate ?></span>
                    <?php echo "<input type='hidden' name='birthdate' value='" . $birthdate . "'>"; ?>
                    <br><br>
                    <span>Gender  :<?php echo $gender ?></span>
                    <?php echo "<input type='hidden' name='gender' value='" . $gender . "'>"; ?>
                    <br><br>
                    <span>Contact Number  : <?php echo $contactNum ?></span>
                    <?php echo "<input type='hidden' name='contactNum' value='" . $contactNum . "'>"; ?>
                    <br><br>
                    <span>Religion :  <?php echo $religion ?></span>
                    <?php echo "<input type='hidden' name='religion' value='" . $religion . "'>"; ?>
                    <br><br>
                    <span>Marital Status  : <?php echo $maritalStat ?></span>
                    <?php echo "<input type='hidden' name='maritalStat' value='" . $maritalStat . "'>"; ?>
                    <br><br>
                    <span>Home Address  : <?php echo $homeAdd ?></span>
                    <?php echo "<input type='hidden' name='homeAdd' value='" . $homeAdd . "'>"; ?>
                    <br><br>
                    <span>Province Origin  : <?php echo $provinceOrig ?></span>
                    <?php echo "<input type='hidden' name='provinceOrig' value='" . $provinceOrig . "'>"; ?>
                    <br><br>
                    <span>Nationality  : <?php echo $nationality ?></span>
                    <?php echo "<input type='hidden' name='nationality' value='" . $nationality . "'>"; ?>
                    <br><br>
                    <span>Place of Birth  : <?php echo $placeOfBirth ?></span>
                    <?php echo "<input type='hidden' name='placeOfBirth' value='" . $placeOfBirth . "'>"; ?>
                    <br><br>
                    <span>Contact Person  : <?php echo $contactPerson ?></span>
                    <?php echo "<input type='hidden' name='contactPerson' value='" . $contactPerson . "'>"; ?>
                    <br><br>
                    <span>Relationship  : <?php echo $contactRs ?></span>
                    <?php echo "<input type='hidden' name='contactRs' value='" . $contactRs . "'>"; ?>
                    <br><br>
                    <span># of Contact  : <?php echo $cPerNum ?></span>
                    <?php echo "<input type='hidden' name='cPerNum' value='" . $cPerNum . "'>"; ?>
                    <br><br>
                    <span>Mother's Name  : <?php echo $mothersName ?></span>
                    <?php echo "<input type='hidden' name='mothersName' value='" . $mothersName . "'>"; ?>
                    <br><br>
                    <span>Father's Name  : <?php echo $fathersName ?></span>
                    <?php echo "<input type='hidden' name='fathersName' value='" . $fathersName . "'>"; ?>
                    <br><br>
                    <span>Picture : </span>
                    <?php echo "<img src='" . $picture . "' height='150px' width='150px'>" ?>
                    <?php echo "<input type='hidden' name='picture' value='" . $picture . "'>"; ?>
                    <br><br>
                    <input type="submit" name="confirm" value="CONFIRM">
                </div>
            </form>


            <div class="footer">
                <hr>
                <span>Copyright 2022. All Rights Reserved</span>
            </div>
        </div>
</body>
</html>
