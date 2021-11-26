<?php

if (isset($_POST["submit"])){
    $username = $_POST['username'];
    $password_1 = $_POST['password'];
    $email = "testing@gmail.com";

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    //Form validation functions (see functions.inc.php)
    if(emptyInputSignup($username,$email, $password_1) !== false){
        header("location: ../../registration.php?error=emptyinput");
        exit();
    }
    if (invalidUsername($username) !== false){
        //header("location: ../../registration.php?error=invalidusername");
        exit();
    }
    if (userExists($db,$username,$email)){
        header("location: ../../registration.php?error=usernametaken");
        exit();
    }
    createUser($db,$username, $password_1);

}else{
    header("location: ../../registration.php");
    exit();
}

?>