<?php
$servername = "localhost:3307";
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "barangay_reservation"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO reservations (name, date, time, purpose) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $date, $time, $purpose);

// Set parameters and execute
$name = $_POST['name'];
$date = $_POST['date'];
$time = $_POST['time'];
$purpose = $_POST['purpose'];

if ($stmt->execute()) {
    echo "New reservation created successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
