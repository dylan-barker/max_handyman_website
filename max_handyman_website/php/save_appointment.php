<?php
$conn = new mysqli("localhost", "root", "", "handyman_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $service = $_POST['service'];
    $appointment_date = $_POST['appointment_date'];
    $message = $_POST['message'];

    $sql = "INSERT INTO appointments (name, email, service, appointment_date, message) VALUES ('$name', '$email', '$service', '$appointment_date', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Appointment booked successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>