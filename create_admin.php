<?php
require_once 'connect.php';

// Create users table if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $createTable)) {
    echo "Users table created successfully<br>";
} else {
    echo "Error creating users table: " . mysqli_error($conn) . "<br>";
}

// Create admin user if it doesn't exist
$adminEmail = 'admin@example.com';
$adminPassword = password_hash('admin123', PASSWORD_DEFAULT);

$checkAdmin = "SELECT * FROM users WHERE email = '$adminEmail'";
$result = mysqli_query($conn, $checkAdmin);

if (mysqli_num_rows($result) == 0) {
    $createAdmin = "INSERT INTO users (first_name, last_name, email, password, role) 
                   VALUES ('Admin', 'User', '$adminEmail', '$adminPassword', 'admin')";
    
    if (mysqli_query($conn, $createAdmin)) {
        echo "Admin user created successfully<br>";
        echo "Email: admin@example.com<br>";
        echo "Password: admin123<br>";
    } else {
        echo "Error creating admin user: " . mysqli_error($conn) . "<br>";
    }
} else {
    echo "Admin user already exists<br>";
}
?> 