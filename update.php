<?php
session_start();
include "connection.php";
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
    <title>Update</title>
    <link rel="stylesheet" href="styles.css" />
</head>

<body>
    <div class="header">
        <a href="#"><img class="logo" src="images/placeholder.png" /></a>
        <h3>School Name</h3>
    </div>

    <div class="search-section">
        <h2>UPDATE EXISTING DATA</h2>
        <form action="<?=$_SERVER['PHP_SELF'];?>" method="GET">
            <input type="text" name="studID" placeholder="Enter Student ID" />
            <br />
            <br />
            <input type="submit" value="SEARCH" />
        </form>

<?php
if (isset($_GET['studID'])) {
    $studID = $_GET['studID'];

    $sql = "SELECT stud_id FROM " . $tableName . " WHERE stud_id = '" . $studID . "';";
    $query = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($query);
    if (is_array($row)) {
        header("Location:updateForm.php?studID=" . urlencode(serialize($row)));
    } else {
        echo "<span>No student found with ID</span>";
    }

}
?>
    </div>
</body>

</html>
