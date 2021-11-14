<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <meta http-equiv='refresh' content='0; URL=/public/index.php'> -->

    </head>
    <body>
<?php

if( !session_id() ) session_start();

require_once 'app/init.php';

$app = new App;
?>

<script src="js/app.js"></script>
    </body>
</html>
