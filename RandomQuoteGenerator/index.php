<?php
    $quotes = array();
    $quotes[0] = array(
        "author" => "Milton Berle",
        "text" => "If opportunity doesn't knock, build a door."
    );
    $quotes[1] = array(
        "author" => "Mark Twain",
        "text" => "The secret of getting ahead is getting started."
    );
    $quotes[2] = array(
        "author" => "Theodore Roosevelt",
        "text" => "Believe you can and you're halfway there."
    );
    $quotes[3] = array(
        "author" => "Winston Churchill",
        "text" => "Success is not final, failure is not fatal: it is the courage to continue that counts."
    );
    $quotes[4] = array(
        "author" => "Benjamin Franklin",
        "text" =>  "Well done is better than well said."
    );
        
    $quote = $quotes[rand(0,count($quotes)-1)];
    $quoteAuthor= $quote["author"];
    $quoteText= $quote["text"];


    ?>

    <!DOCTYPE HTML>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Random Quote</title>
        </head>
        <body>
            <h2>&ldquo;<?php echo $quoteText; ?>&rdquo;</h2>
            <strong>- &ldquo;<?php echo $quoteAuthor; ?>&rdquo;</strong>
        </body>
    </html>