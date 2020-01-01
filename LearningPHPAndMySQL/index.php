<?php
// set off: 0 as parameter, use when porduction, even if there is error it would not show on the page
// turn on: E_ALL as parameter, use when developing, error does show up as error
error_reporting(E_ALL); // need to have this on every single page
include "db/connect.php";

// NEW CHAPTER
echo "REQUEST DATA FROM DATA BASE";
echo "<br>";echo "<br>";

// A query is a request for information from a database
// put your table name here, not data base name
// check if you query is success, else clause will run if query has error
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


echo "<br>";echo "<br>";echo "<br>";echo "<br>";

// NEW CHAPTER
echo "UPDATING AND DELETING";
echo "<br>";echo "<br>";echo "<br>";echo "<br>";

// update
if ($update = $db->query("UPDATE people SET last_name = 'Wang' WHERE id = 1")) {
    // // we cannot do this because we are not returning any data
    // echo $update->num_rows

    // but you can print number of rows affected by the last query
    echo $db->affected_rows;
}

// delete
if ($delete = $db->query("DELETE FROM people WHERE id = 1")) {

    echo $db->affected_rows;
}



echo "<br>";echo "<br>";echo "<br>";echo "<br>";

// NEW CHAPTER
echo "INSERTING";
echo "<br>";echo "<br>";echo "<br>";echo "<br>";


// if ($insert = $db->query("INSERT INTO people (first_name, last_name, bio, created) VALUES ('Shiyu', 'Chen', 'I\'m a second yr CS student', now())")) {
//     // echo number of row you inserted
//     echo $db->affected_rows;
// } 

// // if data come from other places (ex: user), an untrusted source, always escape before putting it into your data base
// if (isset($_GET['first_name'])) {
//     // escape any data that we do not want
//     $first_name = $db->real_escape_string(trim($_GET['first_name']));
// }




echo "<br>";echo "<br>";echo "<br>";echo "<br>";

// NEW CHAPTER
echo "BINDING";
echo "<br>";echo "<br>";echo "<br>";echo "<br>";

if(isset($_GET['first_name'])) {
    $first_name = trim($_GET['first_name']);

    // prepare is different from query, do not execute untill we use the execute method
    // "?" are values that are left unspecified, which we can provide actual value later
    // Condition after WHERE can use AND/OR to append other condition
    $people = $db->prepare("SELECT first_name, last_name FROM people WHERE first_name = ?");

    // we prepared a stateent, and now we will bind parameters with that statement
    // 's' means type is string, 'si' if a string and an integer
    $people->bind_param('s', $first_name);

    // execute the statement after binding parameters
    $people->execute();

    // bind the value returned to out variables (name can be different)
    $people->bind_result($first_name, $last_name); 

    // keep fetching next row of result, untill null
    while($people->fetch()) {
        echo $first_name, ' ', $last_name, '<br>';
    }

    

}



?>