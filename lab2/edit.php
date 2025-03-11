<?php
// เชื่อมต่อฐานข้อมูล
$conn = mysqli_connect("localhost", "root", "", "RegisterDB");
$conn->query("SET NAMES UTF8");

// ตรวจสอบว่ามีข้อมูลที่ถูกส่งมาหรือไม่
if(isset($_POST['save'])) {
    $id = intval($_POST['id']); // แปลงให้เป็นตัวเลข
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = intval($_POST['age']);
    $gender = $_POST['gender'];

    // คำสั่ง SQL เพื่ออัปเดตข้อมูล
    $sql = "UPDATE Register SET 
            FirstName = '$firstname', 
            LastName = '$lastname', 
            Age = $age, 
            Gender = '$gender' 
            WHERE ID = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Update Successfully!!</p>";
        echo '<p><a href="view.php">Go to Home</a></p>'; // ลิงก์กลับไปหน้า view.php
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>
