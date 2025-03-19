<?php
class Data {
    public $firstname;
    public $lastname;
    public $age;
    public $gender;
    public $photo;

    function __construct() {
        $this->firstname = "";
        $this->lastname = "";
        $this->age = 0;
        $this->gender = "";
        $this->photo = "";
    }
}

$name = isset($_GET['name']) ? $_GET['name'] : ''; // ตรวจสอบค่าจาก URL

// เชื่อมต่อฐานข้อมูล
$conn = mysqli_connect("localhost", "root", "", "registerdb");  // แก้ชื่อฐานข้อมูลเป็น registerdb
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()); // ถ้าเชื่อมต่อไม่สำเร็จ
}

$conn->query("SET NAMES UTF8");

// คำสั่ง SQL สำหรับค้นหาชื่อที่ตรงกับที่กรอก
$sql = "SELECT * FROM register WHERE FirstName LIKE '$name%'";

// ทำการ query ฐานข้อมูล
$rs = $conn->query($sql);

// สร้างอ็อบเจ็กต์สำหรับเก็บผลลัพธ์
$myObj = new Data();

if ($rs->num_rows > 0) {
    // ถ้ามีผลลัพธ์
    while ($row = $rs->fetch_assoc()) {
        $myObj->firstname = $row['FirstName'];
        $myObj->lastname = $row['LastName'];
        $myObj->age = $row['Age'];
        $myObj->gender = $row['Gender'];
        $myObj->photo = $row['Photo']; // เก็บข้อมูลรูปภาพ
    }
} else {
    // ถ้าไม่มีข้อมูลที่ตรงกับชื่อ
    $myObj->firstname = "No data found";
}

// ส่งผลลัพธ์เป็น JSON
echo json_encode($myObj);

// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>
