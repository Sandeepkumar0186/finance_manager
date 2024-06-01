<?php
// process.php

// Connect to your MySQL database (replace with your credentials)
$host = 'localhost';
$username = 'your_db_username';
$password = 'your_db_password';
$dbname = 'your_db_name';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $transactionType = $_POST['transactionType'];
    $amount = floatval($_POST['amount']);
    $description = $conn->real_escape_string($_POST['description']);

    // Insert data into the database (you'll need to create the appropriate table)
    $sql = "INSERT INTO transactions (type, amount, description) VALUES ('$transactionType', $amount, '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "Transaction added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
