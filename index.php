<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <meta http-equiv='refresh' content='0; URL=/public/index.php'> -->
        <link rel="icon" type="image/png" href="uploads/icons/favicon.png">
        <link rel="manifest" href="manifest.json">
        <link rel="apple-touch-icon" href="uploads/icons/apple_icon_192.png">
        <meta name="apple-mobile-web-app-status-bar" content="#7367f0">
        <meta name="theme-color" content="#7367f0">

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
