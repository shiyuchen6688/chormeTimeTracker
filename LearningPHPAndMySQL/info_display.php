<?php
error_reporting(E_ALL);
include "db/connect.php";
include "security.php";
$records = array();

// getting user input from url
if(!empty($_POST)) {
    if(isset($_POST['first_name'], $_POST['last_name'], $_POST['bio'])) {
        $first_name = trim($_POST['first_name']);
        $last_name = trim($_POST['last_name']);
        $bio = trim($_POST['bio']);

        if(!empty($first_name) && !empty($last_name) && !empty($bio)) {
            $insert = $db->prepare("INSERT INTO people (first_name, last_name, bio,  created) VALUES (?, ?, ?, NOW())");
            $insert->bind_param('sss', $first_name, $last_name, $bio);

            if($insert->execute()) {
                header("Location: info_display.php");
                die();
            }
        }
    }
}

if ($results = $db->query("SELECT * FROM people")) {
    if ($results->num_rows) {
        while ($row = $results->fetch_object()) {
            array_push($records, $row);
        }
        $results->free();
    }
}

// echo '<pre>', print_r($records), '</pre>';
?>
<link rel="stylesheet" type="text/css" href="style.css">
<!DOCTYPE html>
<html>

<head>
    <title>
    </title>
</head>

<body>
    <h1>Example1 Information Display</h1>
    <h3>People</h3>

    <?php
            if(!count($records)) {
                echo "No Records";
            } else {
    ?> 
        <table>
            <thead>
                <tr>
                    <th>First name:</th>
                    <th>Last:</th>
                    <th>Bio:</th>
                    <th>Created:</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($records as $r) {
                ?>
                    <tr>
                        <td><?php echo escape($r->first_name); ?></td>
                        <td><?php echo escape($r->last_name); ?></td>
                        <td><?php echo escape($r->bio); ?></td>
                        <td><?php echo escape($r->created); ?></td>
                    </tr>
                <?php
                }
                ?>
        </tbody>
    </table>
    <?php
    }
    ?>

    <hr>

    <form action="" method="POST">
        <div class="field">
            <!-- if you match input id with label name, when you click the label, input will be highlighted -->
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name">
        </div>
        <div class="field">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name">
        </div>
        <div class="field">
            <label for="bio">Bio</label>
            <textarea name="bio" id="bio"></textarea>
        </div>
        <button type="submit" value="Insert">Insert</button>
    </form>


</body>

</html>