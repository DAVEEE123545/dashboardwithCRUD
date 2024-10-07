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

// Fetch reservations
$sql = "SELECT * FROM reservations";
$result = $conn->query($sql);

$reservations = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $reservations[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($reservations);

$conn->close();
?>
