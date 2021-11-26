<<<<<<< Updated upstream
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="Styles/styleNB.css"/>
</head>
<body>
<?php
    $con = mysqli_connect("localhost","root","","sys");
   
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    session_start();
    
    if (isset($_POST['FirstName'])) {

        $Password = $_POST['Password']; //Uses md5 to encrypt
        $FirstName = $_POST['FirstName'];
        
        //To prevent injection attacks
        $Password = mysqli_real_escape_string($con,$Password);
        $FirstName = mysqli_real_escape_string($con,$FirstName);

        $query = "SELECT * FROM `passenger_db` WHERE First_Name ='$FirstName'AND Password ='$Password'";

        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);

        if ($rows == 1) {
            $_SESSION['FirstName'] = $FirstName;
            header("Location: GPpassenger.php");
        }else if($rows != 1){
            $_SESSION['FirstName'] = $FirstName;
            $AdminQuery = "SELECT * FROM `pilot_db` WHERE First_Name = '$FirstName'AND Password ='$Password'";
            $result2 = mysqli_query($con, $AdminQuery);
            $rows2 = mysqli_num_rows($result2);

            if($rows2 == 1){
                header("Location: GPadmin.php");
            }
        } else {
            echo "<div class='form'>
                    <br/>
                  <h3>Incorrect password.</h3><br/>
                  <h3>Click <a href='LIGP.php' style='text-decoration: none;'>here</a> to try again.</h3>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <div class="center">
            <a href="LIGP.php" style="text-shadow: 2px 2px 5px black; color: #E3D081; ">Log In</a1>
            <a href = "SUGP.php" style="background-color: #E3D081;  border-radius: 25px; box-shadow: 2px 2px 5px;">Click to Register</a><br>
        </div>
        <a href = "SUGP.php" style="text-decoration: none;"><h1 class="login-title">Green Port Login</h1></a>
        <input type="text" class="login-input" name="FirstName" placeholder="First Name"/>
        <input type="password" class="login-input" name="Password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
  </form>
<?php
    }
?>
</body>
=======
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="Styles/styleNB.css"/>
</head>
<body>
<?php
    $con = mysqli_connect("localhost","root","","greenport");
   
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    session_start();
    
    if (isset($_POST['FirstName'])) {

        $Password = $_POST['Password']; //Uses md5 to encrypt
        $FirstName = $_POST['FirstName'];
        
        
        //To prevent injection attacks
        $Password = mysqli_real_escape_string($con,$Password);
        $FirstName = mysqli_real_escape_string($con,$FirstName);

        $query = "SELECT * FROM `users` WHERE FirstName ='$FirstName' AND Password ='" . md5($Password) . "'";

        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);

        if ($rows == 1) {
            $row = $result->fetch_assoc();
            $type = $row['type'];
            $_SESSION['FirstName'] = $FirstName;
            $_SESSION['LastName'] = $row['LastName'];
            if ($type == 1){
                header("Location: GPpassenger.php");
            }
            if ($type == 0){
                header("Location: GPadmin.php");
            }
            
        } else {
            echo "<div class='form'>
                    <br/>
                  <h3>Incorrect password.</h3><br/>
                  <h3>Click <a href='LIGP.php' style='text-decoration: none;'>here</a> to try again.</h3>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <div class="center">
            <a href="LIGP.php" style="text-shadow: 2px 2px 5px black; color: #E3D081; ">Log In</a1>
            <a href = "SUGP.php" style="background-color: #E3D081;  border-radius: 25px; box-shadow: 2px 2px 5px;">Click to Register</a><br>
        </div>
        <a href = "SUGP.php" style="text-decoration: none;"><h1 class="login-title">Green Port Login</h1></a>
        <input type="text" class="login-input" name="FirstName" placeholder="First Name"/>
        <input type="password" class="login-input" name="Password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
  </form>
<?php
    }
?>
</body>
>>>>>>> Stashed changes
</html>