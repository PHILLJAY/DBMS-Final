<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>GreenPortHomeAdmin</title>
    
</head>
<body>
    <div id="Ctime"></div>
    <p>Vancouver Current Departures</p>

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

    <button onclick="view1()">View all passenger pilots</button>
    <button onclick="view2()">Passengers whose flight's are currently grounded</button>
    <button onclick="view3()">Find all aircraft with an under average amount of passengers </button>
    <button onclick="view6()">View number of airplanes owned by companies</button>
    <button onclick="view7()">View Number of Stationed Airplanes</button>
    <button onclick="view8()">View airplane model for current flight </button>
    <button onclick="view9()">Find amount of passengers on all flights </button>

    <p id="display"></p>
    

    <script>

        function view1() {
        document.getElementById("display").innerHTML = "<?php
            //view1
            $sql2 = "SELECT pilot_db.First_Name, passenger_db.passenger_ID
                    FROM ((passenger_db
                    INNER JOIN flight_db ON flight_db.flight_ID = passenger_db.flight_ID)
                    INNER JOIN pilot_db ON pilot_db.airplane_ID = flight_db.airplane_ID);";
            $result2 = $con->query($sql2);

            echo "<table>";
            echo "<tr>";
            echo "<th>Pilot Name</th>";
            echo "<th>Passenger ID</th>";
            echo "</tr>";
        
            if ($result2->num_rows > 0) {
                for($y = 0; $y < $result2->num_rows; $y++){

                    $row = $result2->fetch_assoc();
                        echo "<tr>";
                        echo "<td>".$row["First_Name"] ."</td>";
                        echo "<td>".$row["passenger_ID"] ."</td>";
                        echo "</tr>";
                    }
            }
            echo "</table>";
            ?>";
        }

        function view2() {
        document.getElementById("display").innerHTML = "<?php 

            $sql3 = "SELECT Passenger_ID
                    FROM passenger_db
                    WHERE flight_ID = ANY
                    (SELECT flight_ID
                    FROM flight_db AS f INNER JOIN stationed_db AS s ON f.airplane_ID = s.airplane_ID);";

            $result3 = $con->query($sql3);
            echo "<table>";
            echo "<tr>";
            echo "<th>Passengers ID's whose flight's are currently grounded:</th>";
            echo "</tr>";
            if ($result3->num_rows > 0) {
                for($y = 0; $y < $result3->num_rows; $y++){

                    $row = $result3->fetch_assoc();
                        echo "<tr>";
                        echo "<td>".$row["Passenger_ID"] ."</td>";
                        echo "</tr>";
                    }
            }
            echo "</table>";
            ?>";
        }

        function view3() {
        document.getElementById("display").innerHTML = "<?php 

            $sql3 = "SELECT airplane_ID
                    FROM airplane_db
                    WHERE capacity < (
                    SELECT AVG(capacity)
                    FROM airplane_db
                    WHERE capacity > 0);";

            $result3 = $con->query($sql3);
            echo "<table>";
            echo "<tr>";
            echo "<th>Airplanes:</th>";
            echo "</tr>";
            if ($result3->num_rows > 0) {
                for($y = 0; $y < $result3->num_rows; $y++){

                    $row = $result3->fetch_assoc();
                        echo "<tr>";
                        echo "<td>".$row["airplane_ID"] ."</td>";
                        echo "</tr>";
                    }
            }
            echo "</table>";
            ?>";
        }

        function view6() {
        document.getElementById("display").innerHTML = "<?php 

            $sql3 = "SELECT company, COUNT(*) AS count
                    FROM airplane_db
                    GROUP BY company;";

            $result3 = $con->query($sql3);
            echo "<table>";
            echo "<tr>";
            echo "<th>Company</th>";
            echo "<th>Aiplanes Owned</th>";
            echo "</tr>";
            if ($result3->num_rows > 0) {
                for($y = 0; $y < $result3->num_rows; $y++){

                    $row = $result3->fetch_assoc();
                        echo "<tr>";
                        echo "<td>".$row["company"] ."</td>";
                        echo "<td>".$row["count"] ."</td>";
                        echo "</tr>";
                    }
            }
            echo "</table>";
            ?>";
            }

        function view7() {
        document.getElementById("display").innerHTML = "<?php 

            $sql3 = "SELECT COUNT(*) AS planes
                    FROM stationed_db;";

            $result3 = $con->query($sql3);

            if ($result3->num_rows > 0) {
                for($y = 0; $y < $result3->num_rows; $y++){

                    $row = $result3->fetch_assoc();
                        echo "<tr>";
                        echo "<td> Number of stationed airplanes: ".$row["planes"] ."</td>";
                        echo "</tr>";
                    }
            }
            ?>";
        }

        function view8() {
        document.getElementById("display").innerHTML = "<?php 

            $fname = 'Todd';//change to current admin/pilot

            $sql3 = "SELECT model
                    FROM airplane_db
                    WHERE airplane_db.airplane_ID = 
                        (SELECT pilot_db.airplane_ID
                        FROM pilot_db 
                        WHERE pilot_db.First_Name = '$fname');";
;
            $result3 = $con->query($sql3);

            if ($result3->num_rows > 0) {
                for($y = 0; $y < $result3->num_rows; $y++){

                    $row = $result3->fetch_assoc();
                        echo "<tr>";
                        echo "<td>Your aircraft model: ".$row["model"] ."</td>";
                        echo "</tr>";
                    }
            }
            ?>";
        }

        function view9() {
        document.getElementById("display").innerHTML = "<?php 

            $sql3 = "SELECT flight_ID, COUNT(*) AS count
                    FROM passenger_db
                    GROUP BY flight_ID;";

            $result3 = $con->query($sql3);
            echo "<table>";
            echo "<tr>";
            echo "<th>Flight</th>";
            echo "<th>Passenger Amount</th>";
            echo "</tr>";
            if ($result3->num_rows > 0) {
                for($y = 0; $y < $result3->num_rows; $y++){

                    $row = $result3->fetch_assoc();
                        echo "<tr>";
                        echo "<td>".$row["flight_ID"] ."</td>";
                        echo "<td>".$row["count"] ."</td>";
                        echo "</tr>";
                    }
            }
            echo "</table>";
            ?>";
            }

    </script>
    
</body>

</html>