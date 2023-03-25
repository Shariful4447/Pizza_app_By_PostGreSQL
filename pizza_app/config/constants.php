<?php

    // error showing
    ini_set('display_errors', 1);  
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    //Start Session
    session_start();


    //Create Constants to Store Non Repeating Values
    define('SITEURL', 'http://localhost/pizza_app/');// siteurl > define for links url


    $conn = pg_connect("host=localhost dbname=pizza_app user=postgres password=123456");





    if ($conn) {
        ?>
            <script>
                console.log('Connected to DB')
            </script>
        <?php
    } else {

        ?>
            <script>
                console.log('Not Connected to DB')
            </script>
        <?php
    }

?>
