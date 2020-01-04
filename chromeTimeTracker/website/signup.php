<?php
include "../db/connect.php";
include "../security/security.php";

if (!empty($_POST)) {
    if (isset($_POST['userName']) && isset($_POST['passWord'])) {
        $user_name = escape($_POST['userName']);
        $password = escape($_POST['passWord']);
        $bio = escape($_POST['bio']);

        if (!empty($user_name) && !empty($password)) {
            $insert = $db->prepare("INSERT INTO users (user_name, password, bio, created_date) VALUE(?, ?, ?, NOW())");
            $insert->bind_param('sss', $user_name, $password, $bio);

            if ($insert->execute()) {
                echo "success";
                header("Location: login_success.php");
            } else {
                echo "fail";
                header("Location: signnup.php");
            }
        } else {
            echo "Invalid User Name Or Password";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="common_style.css">
    <title>Sign Up</title>
</head>

<body>
    <h1>Simple Time Table</h1>

    <h2>test</h2>

    <hr>

    <form action="signup.php" method="POST">
        <label for="userName">User Name: </label>
        <input type="text" name="userName" id="userName">
        <br>
        <label for="passWord">Password: </label>
        <input type="text" name="passWord" id="passWord">
        <br>
        <label for="bio">Bio (optional): </label>
        <textarea name="bio" id="bio"></textarea>
        <br>
        <br>
        <button type="submit" id="signUpBtn">Sign Up</button>
    </form>
</body>

</html>