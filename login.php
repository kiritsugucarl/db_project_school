<?php
session_start();
include 'connection.php';
if (isset($_SESSION['loggedInAsAdmin']) && $_SESSION['loggedInAsAdmin']) {
    header("Location:admin.php");
}
if (isset($_SESSION['loggedInAsUser']) && $_SESSION['loggedInAsUser']) {
    header("Location:user.php");
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
        <a href="index.php"><img class="logo" src="images/placeholder.png" /></a>
        <h3>School Name</h3>
    </div>

    <div class="main-page">
        <div class="login">
            <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
                <span>Username &nbsp;</span>
                <input class="unForm" type="text" name="username" placeholder="Username" required />
                <br />
                <br />
                <span>Password &nbsp;&nbsp;</span>
                <input class="pwForm" type="password" name="password" placeholder="Password" required />
                <br />
                <br />
                <input class="submit-btn" type="submit" name="login" value="Log In" />
                <br>
                <br>
            </form>
<?php
if (isset($_POST['login'])) {
    $uName = $_POST['username'];
    $pWord = $_POST['password'];

    $sql = mysqli_query($conn, "SELECT stud_id, username, password FROM " . $tableName . " WHERE username = '" . $uName . "' AND password = '" . $pWord . "';");
    $stud = mysqli_fetch_array($sql);

    if (is_array($stud)) {
        $_SESSION["uName"] = $stud['username'];
        $_SESSION["pWord"] = $stud['password'];
    } else {
        echo 'Invalid username or password';
    }

    if (isset($_SESSION["uName"])) {
        if ($_SESSION["uName"] == "admin") {
            $_SESSION['loggedInAsAdmin'] = true;
            header("Location:admin.php");
        } else {
            $_SESSION["stud_id"] = $stud['stud_id'];
            $_SESSION['loggedInAsUser'] = true;
            header("Location:user.php");
        }
    }

}

?>
        </div>
        <div style="clear: both"></div>


    </div>
</body>

</html>
