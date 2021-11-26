<<<<<<< Updated upstream
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Sign Up</title>
    <link rel="stylesheet" href="Styles/styleNB.css"/>
</head>
<body>
<?php
    $con = mysqli_connect("localhost","root","","sys");
   
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    session_start();

    if (isset($_REQUEST['FirstName'])) {
        
        $FirstName = $_POST['FirstName'];
        $LastName = $_POST['LastName'];
        $Password = $_POST['Password']; //Uses md5 to encrypt

        //To prevent injection attacks
        $FirstName = mysqli_real_escape_string($con,$FirstName);
        $LastName = mysqli_real_escape_string($con,$LastName);
        $Password = mysqli_real_escape_string($con,$Password);

        $s = "SELECT * FROM `passenger_db` WHERE First_Name='$FirstName'";

        $result2 = mysqli_query($con, $s);

        $num = mysqli_num_rows($result2);

        if ($num == 1) {
            echo "<div class='form'>
                  <h3>Name is already taken<h3>
                  <p class='link'>Click <a href='SUGP.php'>here</a> to try again.</p>
                  </div>";
        } else {
            $query = "INSERT into `passenger_db` (First_Name, Last_Name, Password)
                      VALUES ('$FirstName','$LastName', '$Password')";
            mysqli_query($con, $query);
            echo "<div class='form'>
            <h3>You have registered successfully.</h3><br/>
            <h3>Click<a href='LIGP.php' style='text-decoration: none;'> here </a>to login</h3>
            </div>";
        }
    } else {
?>
    <form class="form" method="post">
        <div class="center">
            <a href="LIGP.php" style="background-color: #E3D081;  border-radius: 25px; box-shadow: 2px 2px 5px;">Click to Login</a1>
            <a href = "SUGP.php" style= "text-shadow: 2px 2px 5px black; color: #E3D081; ">Register</a><br>
        </div>
        <a href = "SUGP.php" style="text-decoration: none;"><h1 class="login-title">Green Port Registration</h1></a>
        <input type="text" class="login-input" name="FirstName" placeholder="First Name" required />
        <input type="text" class="login-input" name="LastName" placeholder="Last Name" required />
        <input type="text" class="login-input" name="Password" placeholder="Password" required />
        
        <input type="submit" name="submit" value="Register" class="login-button">
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
    <title>Sign Up</title>
    <link rel="stylesheet" href="Styles/styleNB.css"/>
</head>
<body>
<?php
    $con = mysqli_connect("localhost","root","","greenport");
   
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    session_start();

    if (isset($_REQUEST['FirstName'])) {
        
        $FirstName = $_POST['FirstName'];
        $LastName = $_POST['LastName'];
        $Password = $_POST['Password']; //Uses md5 to encrypt

        //To prevent injection attacks
        $FirstName = mysqli_real_escape_string($con,$FirstName);
        $LastName = mysqli_real_escape_string($con,$LastName);
        $Password = mysqli_real_escape_string($con,$Password);

        $s = "SELECT * FROM `users` WHERE FirstName='$FirstName'";

        $result2 = mysqli_query($con, $s);

        $num = mysqli_num_rows($result2);

        if ($num == 1) {
            echo "<div class='form'>
                  <h3>Name is already taken<h3>
                  <p class='link'>Click <a href='SUGP.php'>here</a> to try again.</p>
                  </div>";
        } else {
            $query = "INSERT into `users` (FirstName, LastName, Password, type)
                      VALUES ('$FirstName','$LastName', '" . md5($Password) . "', 1)";
            mysqli_query($con, $query);
            echo "<div class='form'>
            <h3>You have registered successfully.</h3><br/>
            <h3>Click<a href='LIGP.php' style='text-decoration: none;'> here </a>to login</h3>
            </div>";
        }
    } else {
?>
    <form class="form" method="post">
        <div class="center">
            <a href="LIGP.php" style="background-color: #E3D081;  border-radius: 25px; box-shadow: 2px 2px 5px;">Click to Login</a1>
            <a href = "SUGP.php" style= "text-shadow: 2px 2px 5px black; color: #E3D081; ">Register</a><br>
        </div>
        <a href = "SUGP.php" style="text-decoration: none;"><h1 class="login-title">Green Port Registration</h1></a>
        <input type="text" class="login-input" name="FirstName" placeholder="First Name" required />
        <input type="text" class="login-input" name="LastName" placeholder="Last Name" required />
        <input type="text" class="login-input" name="Password" placeholder="Password" required />
        
        <input type="submit" name="submit" value="Register" class="login-button">
    </form>
<?php
    }
?>
</body>
>>>>>>> Stashed changes
</html>