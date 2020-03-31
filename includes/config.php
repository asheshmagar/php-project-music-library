<?php
    ob_start ();
    session_start();

    $timezone = date_default_timezone_set ("Asia/Kathmandu");
    $con = mysqli_connect ("localhost","root","","spotify");
    if(mysqli_connect_errno ()){
        echo "Failed to connect to the server!".mysqli_connect_errno ();

    }