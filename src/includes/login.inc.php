<?php
if (isset($_POST["submit"])){
    $username = $_POST['username'];
    $pass = $_POST['password'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    if(emptyInputLogin($username, $pass) !== false){
        header("location: ../../login.html?error=emptyinput");
        exit();
        var_dump($_POST);
    }


    loginUser($db, $username, $pass);

}else{
    var_dump($_POST);
    header("location: ../../login.html");
    
    exit();
}


?>