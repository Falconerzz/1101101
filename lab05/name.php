<?php  
// รับค่าชื่อที่ค้นหาจาก JavaScript
$name = isset($_GET["name"]) ? $_GET["name"] : "";

// เชื่อมต่อฐานข้อมูล
$conn = mysqli_connect("localhost", "root", "", "RegisterDB");
$conn->query("SET NAMES UTF8");

// ตรวจสอบการเชื่อมต่อ
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// ดึงข้อมูลชื่อที่มีตัวอักษรขึ้นต้นตรงกับค่าที่ป้อน
$sql = "SELECT DISTINCT FirstName FROM register WHERE FirstName LIKE '$name%' ORDER BY FirstName";
$result = $conn->query($sql);

// สร้างรายการตัวเลือก <option> สำหรับ <datalist>
$suggestions = "";
while ($row = $result->fetch_assoc()) {
    $suggestions .= "<option value='".$row['FirstName']."'>";
}

// ส่งกลับผลลัพธ์ไปที่ JavaScript
echo $suggestions;

$conn->close();
?>
