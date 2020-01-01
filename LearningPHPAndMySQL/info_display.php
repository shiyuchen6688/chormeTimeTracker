<?php
error_reporting(E_ALL);
include "db/connect.php";
include "security.php";
$records = array();

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
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name">
        </div>
    </form>


</body>

</html>