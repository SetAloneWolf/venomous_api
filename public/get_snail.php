<?php
// เปิดการแสดงข้อผิดพลาด
ini_set('display_errors', 1);
error_reporting(E_ALL);

// รวมไฟล์เชื่อมต่อฐานข้อมูล
include('config.php');

// สร้างการเชื่อมต่อ
$conn = new mysqli($host, $username, $password, $database);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// กำหนด category ที่ต้องการกรอง (ในที่นี้เรากรอง 'snake')
$category = 'snail';

// เขียนคำสั่ง SQL เพื่อดึงข้อมูลจากตาราง images ตาม category
$sql = "SELECT name_images, image_path FROM images WHERE category = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}
$stmt->bind_param("s", $category); // ใช้ 's' เนื่องจาก category เป็น string
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // สร้าง array สำหรับข้อมูลที่ได้จากฐานข้อมูล
    // สร้าง array สำหรับข้อมูลที่ได้จากฐานข้อมูล
$snakes = array();
while($row = $result->fetch_assoc()) {
    // เพิ่ม URL แบบเต็มให้กับ image_path
    $image_url = 'http://192.168.3.26/FP/' . $row['image_path']; // เพิ่ม URL ของเซิร์ฟเวอร์
    $snakes[] = array(
        'name' => $row['name_images'],
        'image' => $image_url // ใช้ URL แบบเต็ม
    );
}
    echo json_encode($snakes); // ส่งข้อมูลกลับในรูปแบบ JSON
} else {
    // ส่งข้อมูลในรูปแบบ JSON แม้ไม่มีข้อมูล
    echo json_encode([]); // ส่งเป็น array ว่าง ๆ
}

$conn->close();
?>
