<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>GreenPortHomeAdmin</title>
    
</head>
<body>
    <p>Vancouver Departures Terminal 0<div id="Ctime"></div></p>

    <script>
        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate()+' '+today.getHours() + ":" + today.getMinutes();
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

    <button onclick="view7()"># of Stationed Airplanes</button>
    <button onclick="view2()">Passengers whose flight's are currently grounded</button>
    <button onclick="view3()">Find all aircraft with an under average amount of passengers </button>
    <button onclick="view9()">Find amount of passengers on all flights </button>

    <p id="display"></p>
    

    <script>

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