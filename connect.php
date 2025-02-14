<?php
// Step 1: Database Connection Details
$servername = "localhost"; // If using locally, keep "localhost"
$username = "root"; // Default username for MySQL in XAMPP
$password = ""; // Default password is empty in XAMPP

// Step 2: Create Connection
$conn = new mysqli($servername, $username, $password);

// Step 3: Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 4: Create Database
$sql = "CREATE DATABASE IF NOT EXISTS food_donation";
if ($conn->query($sql) === TRUE) {
    echo "Database 'food_donation' created successfully.<br>";
} else {
    echo "Error creating database: " . $conn->error;
}

// Step 5: Select the Database
$conn->select_db("food_donation");

// Step 6: Create Table
$table_sql = "CREATE TABLE IF NOT EXISTS donations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    address TEXT NOT NULL,
    category ENUM('Veg', 'Non-Veg', 'Both') NOT NULL,
    quantity INT NOT NULL,
    food_datetime DATETIME NOT NULL
)";

// Step 7: Check if Table is Created
if ($conn->query($table_sql) === TRUE) {
    echo "Table 'donations' created successfully.<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

// Step 8: Close Connection
$conn->close();
?>