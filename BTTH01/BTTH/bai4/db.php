<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'btth01';
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die('Kết nối thất bại: ' . $conn->connect_error);
}

$conn->query("CREATE TABLE IF NOT EXISTS flowers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    image VARCHAR(255)
)");

$conn->query("CREATE TABLE IF NOT EXISTS quiz (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question TEXT,
    answers TEXT,
    correct VARCHAR(255)
)");

$conn->query("CREATE TABLE IF NOT EXISTS accounts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    password VARCHAR(255),
    lastname VARCHAR(255),
    firstname VARCHAR(255),
    city VARCHAR(255),
    email VARCHAR(255),
    course1 VARCHAR(255)
)");
?>