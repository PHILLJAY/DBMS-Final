<?php

<<<<<<< Updated upstream
function getdb(){
=======

>>>>>>> Stashed changes
    $serverName = "localhost";
    $dBUsername = "root";
    $dBPass = "";
    $dBName = "greenport";
    $db = mysqli_connect($serverName,$dBUsername,$dBPass,$dBName)or die("connection to database failed");
    return $db;
<<<<<<< Updated upstream
}
=======

>>>>>>> Stashed changes
?>