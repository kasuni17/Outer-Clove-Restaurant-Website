<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_REQUEST['name']);
    $contact = htmlspecialchars($_REQUEST['contact']);
    $party_size = htmlspecialchars($_REQUEST['party_size']);
    $date = htmlspecialchars($_REQUEST['date']);
    $time = htmlspecialchars($_REQUEST['time']);
    $message = htmlspecialchars($_REQUEST['message']);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "restaurant_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO `reservation` (name, contact, party_size, date, time, message) VALUES ('$name', '$contact', '$party_size', '$date', '$time', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>