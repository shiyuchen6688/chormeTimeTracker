<?php
// set off: 0 as parameter, use when porduction, even if there is error it would not show on the page
// turn on: E_ALL as parameter, use when developing, error does show up as error
error_reporting(E_ALL); // need to have this on every single page
include "db/connect.php";

// A query is a request for information from a database
// put your table name here, not data base name
// check if you query is success
if ($result = $db->query("SELECT * FROM people")) { //or die($db->error);
    // check if you got a certain amount of data
    if ($result->num_rows) {

        // // only fetch one row
        // $row = $result->fetch_assoc(); 
        // echo '<pre>', print_r($row), '</pre>'; // pre formatted tabs will give you bettwe view of the result

        //  // fetch all of the rows
        // $allRows = $result->fetch_all(MYSQLI_ASSOC); // pass MYSQLI_NUM none associative array, want assoc array use MYSQLI_ASSOC, rarely MYSQLI_BOTH
        // echo '<pre>', print_r($allRows), '</pre>'; // pre formatted tabs will give you bettwe view of the result


        // // print name of each people(row)
        // foreach($allRows as $row) {
        //     echo $row['first_name'], ' ', $row['last_name'], '<br>';
        // }


        // // ALTERNATIVE way to do this:
        // while($row = $result->fetch_assoc()) {
        //     echo $row['first_name'], ' ', $row['last_name'], '<br>';
        // }

        // BEST ANOTHER ALTERNATIVE: use object instead of array
        while($row = $result->fetch_object()) {
            echo $row->first_name, ' ', $row->last_name, '<br>';
        }

        // freee up memeory, since we already got what we want from result we get from SQL(what it returned)
        $result->free();
    } 
} else {
    die($db->error);
    // you can also redirect the parge or do something else here, it's up to you
}


?>