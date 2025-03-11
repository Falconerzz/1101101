<?php
// เชื่อมต่อฐานข้อมูล
$conn = mysqli_connect("localhost", "root", "", "RegisterDB");
$conn->query("SET NAMES UTF8");

// ตรวจสอบว่ามีค่า ID ถูกส่งมาหรือไม่
if(isset($_GET['id'])) {
    $id = intval($_GET['id']); // แปลงค่า ID ให้เป็นตัวเลขเพื่อความปลอดภัย

    // คำสั่ง SQL เพื่อลบข้อมูล
    $sql = "DELETE FROM Register WHERE ID = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<p>ID $id Deleted Already!!</p>";
        echo '<p><a href="view.php">Go to Home</a></p>'; // ลิงก์กลับไปหน้า view.php
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "No ID provided for deletion.";
}

// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>
