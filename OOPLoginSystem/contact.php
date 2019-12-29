<?php
// start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Welcome To Contact Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <ul>
        <li><a href="index.php">HOME</a></li>
        <li><a href="contact.php">CONTACT</a></li>
    </ul>
</body>


<?php
echo $_SESSION["userName"];
?>



</html>