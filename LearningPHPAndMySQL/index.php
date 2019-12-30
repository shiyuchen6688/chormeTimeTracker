<?php
// set off: 0 as parameter, use when porduction, even if there is error it would not show on the page
// turn on: E_ALL as parameter, use when developing, error does show up as error
error_reporting(0); // need to have this on every single page
include "db/connect.php";

echo("success");
?>