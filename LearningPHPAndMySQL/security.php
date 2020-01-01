<?php
function escape($string) {
    // htmlentities display html tags as plain text
    return htmlentities(trim($string), ENT_QUOTES, "UTF-8");
}
?>