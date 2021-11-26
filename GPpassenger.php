<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>GreenPortHomePassenger</title>
    <link rel="stylesheet" href="Styles/styleNB.css"/>
</head>
<body>
    <div class="content">
    <h1 class="login-title"><div id="Ctime"></div></h1>
    <h1 class="login-title">Vancouver Current Departures</h1>

    <script>
        var today = new Date();
        var date = 'Current time: ' + today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate()+' '+today.getHours() + ":" + today.getMinutes();
        document.getElementById("Ctime").innerHTML = date;
    </script>

    <table>
        <tr>
            <th>Flight</th>
            <th>Destination</th>
            <th>Depart Time</th>
            <th>Gate</th>
        </tr>

<?php
    $con = mysqli_connect("localhost","root","","sys"); //sys = schema name "miniairways"

    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    session_start();
    $current_user = $_SESSION['FirstName'];

    $sql1 = "SELECT * FROM flight_db";
        $result1 = $con->query($sql1);

            if ($result1->num_rows > 0) {
                for($y = 0; $y < $result1->num_rows; $y++){

                    $row = $result1->fetch_assoc();
                        echo "<tr>";
                        echo "<td>".$row["flight_ID"] ."</td>";
                        echo "<td>".$row["destination"] ."</td>";
                        echo "<td>".$row["depart_time"] ."</td>";
                        echo "<td>".$row["gate"] ."</td>";
                        echo "</tr>";
                    }
            }
?>
    </table>
    <br>

    <button onclick="case1()" class="login-button" >View your pilots name! </button>
    <button onclick="view10()" class="login-button">View your depart/arrive time! </button>

    <p id="display"></p>

    <script>

        function case1() {
        document.getElementById("display").innerHTML = "<?php
            $sql2 = "SELECT pilot_db.First_Name
                    FROM pilot_db
                    WHERE pilot_db.Airplane_ID = 
                        (SELECT flight_db.airplane_ID
                        FROM flight_db
                        WHERE flight_ID =
                            (SELECT passenger_db.flight_ID
                            FROM passenger_db
                            WHERE passenger_db.First_Name = '$current_user'));";             
            $result2 = $con->query($sql2);

            echo "<table>";
            echo "<tr>";
            echo "<th>Pilot Name(s):</th>";
            echo "</tr>";
            
            if ($result2->num_rows > 0) {
                for($y = 0; $y < $result2->num_rows; $y++){

                    $row = $result2->fetch_assoc();
                        echo "<tr>";
                        echo "<td>".$row["First_Name"] ."</td>";
                        echo "</tr>";
                    }
            }
            echo "</table>";
        ?>";
        }

        function view10() {
        document.getElementById("display").innerHTML = "<?php
            $sql2 = "SELECT depart_time, arrive_time
                    FROM flight_db
                    WHERE flight_db.flight_ID =
                        (SELECT passenger_db.flight_ID 
                        FROM passenger_db
                        WHERE passenger_db.First_Name = '$current_user');;";             
            $result2 = $con->query($sql2);

            echo "<table>";
            echo "<tr>";
            echo "<th>Depart Time</th>";
            echo "<th>Arrive Time</th>";
            echo "</tr>";
            
            if ($result2->num_rows > 0) {
                for($y = 0; $y < $result2->num_rows; $y++){

                    $row = $result2->fetch_assoc();
                        echo "<tr>";
                        echo "<td>".$row["depart_time"] ."</td>";
                        echo "<td>".$row["arrive_time"] ."</td>";
                        echo "</tr>";
                    }
            }
            echo "</table>";
        ?>";
        }

    </script>
    </div>
    </body>

</html>