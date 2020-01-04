<!-- Record tasks user planned -->
<?php
include "../db/connect.php";
include "../security/security.php";

echo "Hello";
$test = "test2";
$db->prepare("INSERT INTO tasks (task_name, created_time, task_type, user_id, done)
        VALUES ($test, NOW(),'NONE', 1, 0)");
$db->bind_param('s', $test);
echo $db->error;

// echo $_POST['hour'] + $_POST['newTaskName'];
if (!empty($_POST)) {
    // echo "not empty";
    // if (isset($_POST['hour']) && isset($_POST['min']) && isset($_POST['newTaskName'])) {
    //     $hour = escape($_POST['hour']);
    //     $min = escape($_POST['min']);
    //     $new_task_name = escape($_POST['newTaskName']);
    //     echo $hour;
    //     // currently assume only one user, change later
    //     $user_id = 1;
    //     $db->query("INSERT INTO tasks (task_name, created_time, task_type, user_id, done)
    //     VALUES ({$new_task_name}, NOW(),'NONE', 1, 0)");
    //     echo $db->error;
    // }
}
echo "empty";
?>