<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Reservations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('gallery/tb.webp');
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            
        }
        h1{
            color: black;
            font-weight: bold;
            font-size:20;
        }
        
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            border: 2px solid #ddd;
            border-radius: 10px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #f2f2f2;
        }
        
        tr:hover {
            background-color: orange;
        }
        
        .center {
            text-align: center;
        }
        

        .logo {
            position: absolute;
            left: 0;
            top: 10%;
            transform: translateY(-50%);
        }
    </style>
</head>

<body>
    
    <a href="#" class="logo">
                <img src="./assets/images/logo.png" width="160" height="200" alt="Outer_clover - Home">
            </a>
      


    <div class="container">
        <h1>View Reservations</h1>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Contact Number</th>
                    <th>Party Size</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php
                     $servername = "localhost";
                     $username = "root";
                     $password = "";
                     $dbname = "restaurant_db";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT name, contact, party_size, date, time, message FROM `reservation`";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["contact"] . "</td>";
                            echo "<td>" . $row["party_size"] . "</td>";
                            echo "<td>" . $row["date"] . "</td>";
                            echo "<td>" . $row["time"] . "</td>";
                            echo "<td>" . $row["message"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No reservations found.</td></tr>";
                    }

                    $conn->close();
                ?>
            </tbody>
        </table><br>

        <a href="reservation.html"><button type="button" id="reserve_again">Reservation Again</button></a>
         <a href="home.html"><button type="button" id="reserve_again">Go to the home</button></a>
    </div>
</body>

</html>