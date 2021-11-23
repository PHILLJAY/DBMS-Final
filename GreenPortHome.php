<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>GreenPortHome</title>
    
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

    $sql2 = "SELECT pilot_db.First_Name, passenger_db.passenger_ID
            FROM ((passenger_db
            INNER JOIN flight_db ON flight_db.flight_ID = passenger_db.flight_ID)
            INNER JOIN pilot_db ON pilot_db.airplane_ID = flight_db.airplane_ID);";
            $result2 = $con->query($sql2);

        if ($result2->num_rows > 0) {
            for($y = 0; $y < $result2->num_rows; $y++){

                $row = $result2->fetch_assoc();
                    echo "<tr>";
                    echo "<td>".$row["First_Name"] ."</td>";
                    echo "<td>".$row["passenger_ID"] ."</td>";
                    echo "</tr>";
                }
        }
    
?>
    </table>

    <button onclick="stationed()"># of Stationed Airplanes</button>

    <p id="stationed"></p>
    <script>
        function stationed() {
        document.getElementById("stationed").innerHTML = "<?php 
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
    </script>
</body>

</html>