<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Welcome To Main Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <ul>
        <li><a href="index.php">HOME</a></li>
        <li><a href="contact.php">CONTACT</a></li>
    </ul>
</body>


<?php
$_SESSION["userName"] = "shiyuc";
echo $_SESSION["userName"];

// ALWAYS check wrong situation first
if (!isset($_SESSION['userName']) {
    echo "You are not logged in!";
} else {
    echo "You are logged in!";
}
?>



</html>