<?php
// mysqli(host, username, password, name of the data base
$db = new mysqli("127.0.0.1", "root", "", "learning");

// check connect error number, output msg to user, 0 menas succesfully connected
if ($db->connect_errno) {
    die ("Sorry, we are having some problems");
}
