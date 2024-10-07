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
$stmt = $conn->prepare("DELETE FROM reservations WHERE id=?"); // Ensure 'id' is correct
if (!$stmt) {
    die("SQL Prepare Error: " . $conn->error); // Display error if prepare fails
}

$stmt->bind_param("i", $id);

// Set parameters and execute
$id = $_GET['id'];

if ($stmt->execute()) {
    echo "Reservation deleted successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
