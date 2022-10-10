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
    <title>Enroll Page</title>
    <link rel="stylesheet" href="styles.css" />
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
            <form autocomplete="off" action="enrollValidation.php" method="POST" enctype="multipart/form-data">
                <div class="form-set">
                    <h1>ACCOUNT DETAILS</h1>
                    <span>First Name : </span>
                    <input autocomplete="new-password" type="text" name="fName" required> <br><br>
                    <span>Middle Name : </span>
                    <input  autocomplete="new-password" type="text" name="mName" required><br><br>
                    <span>Last Name : </span>
                    <input autocomplete="new-password" type="text" name="lName" required><br><br>
                    <span>Username : </span>
                    <input autocomplete="new-password" type="text" name="username" required><br><br>
                    <span>Password : </span>
                    <input autocomplete="new-password" type="password" name="password" required><br><br>
                    <span>E-Mail Address : </span>
                    <input autocomplete="new-password" type="text" name="email_add" required><br><br>
                </div>
                <hr>
                <div class="form-set">
                    <h1>Important Information</h1>
                    <!-- DEPARTMENT SECTION --->
                    <span>Department: </span>
                    <select name="department" required>
                        <option value="" disabled selected hidden>Select Department</option>
                        <option value="College of Engineering and Architecture">College of Engineering and Architecture</option>
                        <option value="College of Arts and Sciences">College of Arts and Sciences</option>
                        <option value="College of Education">College of Education</option>
                        <option value="College of Business, Entrepreneurship, and Accountancy">College of Business, Entrepreneurship, and Accountancy</option>
                        <option value="Institute of Human Kinetics">Institute of Human Kinetics</option>
                    </select> <br><br>

                    <!-- LEVEL SECTION --->
                    <span>Level : </span>
                    <select name="level" required>
                        <option value="" disabled selected hidden>Select Level</option>
                        <option value="First Year">First Year</option>
                        <option value="Second Year">Second Year</option>
                        <option value="Third Year">Third Year</option>
                        <option value="Fourth Year">Fourth Year</option>
                    </select> <br> <br>

                    <!-- COURSE SELECTION --->
                    <span>Course : </span>
                    <select name="course" required>
                        <option value="" disabled selected hidden>Select Course</option>
                        <option value="" disabled>==========COLLEGE OF ENGINEERING AND ARCHITECTURE ==========</option>
                        <option value="Bachelor of Science in Mechanical Enginnering">Bachelor of Science in Mechanical Enginnering</option>
                        <option value="Bachelor of Science in Architecture">Bachelor of Science in Architecture</option>
                        <option value="Bachelor of Science in Civil Engineering">Bachelor of Science in Civil Engineering</option>
                        <option value="Bachelor of Science in Electrical Engineering">Bachelor of Science in Electrical Engineering</option>
                        <option value="Bachelor of Science in Electronics Engineering">Bachelor of Science in Electronics Engineering</option>
                        <option value="Bachelor of Science in Astronomy">Bachelor of Science in Astronomy</option>
                        <option value="Bachelor of Science in Computer Engineering">Bachelor of Science in Computer Engineering</option>
                        <option value="Bachelor of Science in Industrial Engineering">Bachelor of Science in Industrial Engineering</option>
                        <option value="Bachelor of Science in Industrial Technology">Bachelor of Science in Industrial Technology</option>
                        <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                        <option value="Bachelor of Science in Instrumentation and Control Engineering">Bachelor of Science in Instrumentation and Control Engineering</option>

                        <option value="" disabled>==========COLLEGE OF BUSINESS, ENTREPRENEURSHIP, AND ACCOUNTANCY ==========</option>
                        <option value="Bachelor of Science in Accountancy">Bachelor of Science in Accountancy</option>
                        <option value="Bachelor of Science in Entrepreneurship">Bachelor of Science in Entrepreneurship</option>
                        <option value="Bachelor of Science in Office Administration Major In Office Management">Bachelor of Science in Office Administration Major In Office Management</option>
                        <option value="Bachelor of Science in Operations Management">Bachelor of Science in Operations Management</option>
                        <option value="Bachelor of Science in Business Administration Major in Marketing Management">Bachelor of Science in Business Administration Major in Marketing Management </option>
                        <option value="Bachelor of Science in Business Administration Major in Financial Management">Bachelor of Science in Business Administration Major in Financial Management </option>
                        <option value="Bachelor of Science in Business Administration Major in Human Resource Management">Bachelor of Science in Business Administration Major in Human Resource Management </option>

                        <option value="" disabled>==========COLLEGE OF EDUCATION ==========</option>
                        <option value="Bachelor of Secondary Education Major in English">Bachelor of Secondary Education Major in English</option>
                        <option value="Bachelor of Secondary Education Major in Math">Bachelor of Secondary Education Major in Math</option>
                        <option value="Bachelor of Secondary Education Major in Science">Bachelor of Secondary Education Major in Science</option>
                        <option value="Bachelor of Secondary Education Major in Social Studies">Bachelor of Secondary Education Major in Social Studies</option>
                        <option value="Bachelor of Secondary Education Major in Filipino">Bachelor of Secondary Education Major in Filipino</option>
                        <option value="Bachelor of Technical-Vocational Teacher Education Major in Animation">Bachelor of Technical-Vocational Teacher Education Major in Animation</option>
                        <option value="Bachelor of Technical-Vocational Teacher Education Major in Computer Hardware Servicing">Bachelor of Technical-Vocational Teacher Education Major in Computer Hardware Servicing</option>
                        <option value="Bachelor of Technical-Vocational Teacher Education Major in Visual Graphic Design">Bachelor of Technical-Vocational Teacher Education Major in Visual Graphic Design</option>
                        <option value="Bachelor of Technical-Vocational Teacher Education Major in Garments Fashion and Design">Bachelor of Technical-Vocational Teacher Education Major in Garments Fashion and Design</option>
                        <option value="Bachelor of Technical-Vocational Teacher Education Major in Electronics Technology">Bachelor of Technical-Vocational Teacher Education Major in Electronics Technology</option>
                        <option value="Bachelor of Technical-Vocational Teacher Education Major in Welding and Fabrications Technology">Bachelor of Technical-Vocational Teacher Education Major in Welding and Fabrications Technology</option>

                        <option value="" disabled>==========COLLEGE OF ARTS AND SCIENCES ==========</option>
                        <option value="Bachelor of Science in Psychology">Bachelor of Science in Psychology</option>
                        <option value="Bachelor of Arts in Political Science">Bachelor of Arts in Political Science</option>
                        <option value="Bachelor of Science in Statistics">Bachelor of Science in Statistics </option>
                        <option value="Bachelor of Biology">Bachelor of Biology</option>

                        <option value="" disabled>==========INSTITUTE OF HUMAN KINETICS ==========</option>
                        <option value="Bachelor of Science in Physical Education">Bachelor of Science in Physical Education</option>

                    </select> <br> <br>

                    <span>Birthdate : </span>
                    <input type="date" name="birthdate" required><br><br>

                    <!-- GENDER SELECTION --->
                    <span>Gender : </span>
                    <select name="gender" required>
                        <option value="" disabled selected hidden>Select Gender</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select> <br> <br>
                    <span>Contact Number : </span>
                    <input autocomplete="new-password" type="text" name="contactNum" required><br><br>
                    <span>Religion : </span>
                    <input autocomplete="new-password" type="text" name="religion" required><br><br>
                    <span>Marital Status : </span>
                    <select name="maritalStat" required>
                        <option value="" disabled selected hidden>Select Marital Status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Widowed">Widowed</option>
                    </select><br><br>
                    <span> Home Address : </span>
                    <input autocomplete="new-password" type="text" name="homeAdd" required> <br> <br>
                    <span> Province Origin :  </span>
                    <input autocomplete="new-password" type="text" name="provinceOrig" required> <br> <br>
                    <span>Nationality : </span>
                    <input autocomplete="new-password" type="text" name="nationality" required> <br> <br>
                    <span>Place of Birth : </span>
                    <input autocomplete="new-password" type="text" name="placeOfBirth" required> <br> <br>
                    <span> Contact Person : </span>
                    <input autocomplete="new-password" type="text" name="contactPerson" required> <br> <br>
                    <span> Relationship : </span>
                    <input autocomplete="new-password" type="text" name="contactRs" required> <br> <br>
                    <span> # of Contact :  </span>
                    <input  autocomplete="new-password" type="text" name="cPerNum" required> <br> <br>
                    <span> Mother's Name :  </span>
                    <input autocomplete="new-password" type="text" name="mothersName" required> <br> <br>
                    <span> Father's Name :  </span>
                    <input autocomplete="new-password" type="text" name="fathersName" required> <br> <br>
                    <span> Picture : </span>
                    <input type="file" name="picture" value="Select a File : " required> <br> <br>
                    <input type="submit" value="ENROLL">
                </div>
            </form>

            <div class="footer">
                <hr>
                <span>Copyright 2022. All Rights Reserved</span>
            </div>
        </div>


</body>

</html>
