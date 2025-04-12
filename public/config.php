<?php
$host = "localhost"; // หรือ IP ของเซิร์ฟเวอร์
$username = "root"; // Username MySQL
$password = "08998099"; // รหัสผ่าน MySQL (ถ้ามี)
$database = "venomous_animals_db"; // ชื่อฐานข้อมูล

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

mysqli_set_charset($conn, "utf8"); // รองรับภาษาไทย
?>
