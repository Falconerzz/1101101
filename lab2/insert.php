<?php
// เชื่อมต่อฐานข้อมูล
$conn = new mysqli("localhost", "root", "", "RegisterDB");

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ตั้งค่าการเชื่อมต่อให้รองรับ UTF-8
$conn->set_charset("utf8mb4");

// ตรวจสอบว่ามีการกดปุ่ม Save หรือไม่
if(isset($_POST['save'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = intval($_POST['age']); // แปลงเป็นตัวเลข
    $gender = $_POST['gender'];

    // ใช้ Prepared Statement เพื่อความปลอดภัยและป้องกัน SQL Injection
    $stmt = $conn->prepare("INSERT INTO Register (FirstName, LastName, Age, Gender) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $firstname, $lastname, $age, $gender);

    if ($stmt->execute()) {
        echo "<p>Insertion Successfully!!</p>";
        echo '<p><a href="view.php">Go to Home</a></p>';
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>
