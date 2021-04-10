<?php 
    session_start();
 ?>

<!DOCTYPE html>
<html>


<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='css/stylesheet.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
    <title>Break Time</title>
</head>


<body>
    <div class="flex-container">
        <div class="flex-child name">
            <img class=site-logo src="images/Logo.png">
            <p>Break Bank</p>
        </div>
        <div class="flex-child recommendation">
            <p>Recommendations</p>
        </div>
    </div>

    <div class="recommendation-container">
        <a href="https://www.google.ca/?gws_rd=ssl">
            <div id="google" class="box1">Google</div>
        </a>
        <a href="https://www.youtube.com">
            <div id="youtube" class="box2">YouTube</div>
        </a>
        <a href="https://www.reddit.com">
            <div id="reddit" class="box3">Reddit</div>
        </a>
        <a href="https://twitter.com/?lang=en">
            <div id="twitter" class="box4">Twitter</div>
        </a>
    </div>
    <div class="recommendation-container">
        <a href="https://www.facebook.com">
            <div id="facebook" class="box5">Facebook</div>
        </a>
        <a href="https://instagram.com">
            <div id="instagram" class="box6">Instagram</div>
        </a>
        <a href="https://netflix.com/browse">
            <div id="netflix" class="box7">Netflix</div>
        </a>
        <a href="https://www.tiktok.com/en/">
            <div id="tiktok" class="box8">TikTok</div>
        </a>
    </div>

<?php
    require "footer.php";
?>