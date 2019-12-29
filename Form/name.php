<?php

$name = $_POST["name"] ?? null;

if (empty(trim($name))) {
    header('Location: http://localhost:8080/Form/index.php');
}


echo "Hi, {$_POST["name"]}!";
?>