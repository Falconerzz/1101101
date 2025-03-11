<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Insertion</title>
</head>
<body>

<?php
// เชื่อมต่อฐานข้อมูล
$conn = mysqli_connect("localhost", "root", "", "RegisterDB");
$conn->query("SET NAMES UTF8");

// ตรวจสอบว่ากรอกข้อมูลครบหรือไม่
if (($_POST["firstname"] <> "") && ($_POST["lastname"] <> "") && ($_POST["age"] <> "") && ($_POST["gender"] <> "") && ($_POST["avatar"] <> "")) {

    // รับค่าจากฟอร์ม
    $FirstName = $_POST["firstname"];
    $LastName = $_POST["lastname"];
    $Age = $_POST["age"];
    $Gender = $_POST["gender"];
    $Avatar = $_POST["avatar"]; // รับค่าของ avatar ที่เลือกจาก hidden input

    // สร้าง SQL query สำหรับการบันทึกข้อมูล
    $sql = "INSERT INTO Register (FirstName, LastName, Age, Gender, Photo) 
            VALUES ('$FirstName', '$LastName', '$Age', '$Gender', '$Avatar')";

    // ทำการ query
    if ($conn->query($sql) === TRUE) {
        echo "Insertion Successfully!!";
    } else {
        echo "Error: " . $conn->error;
    }

} else {
    exit("คุณยังกรอกข้อมูลไม่ครบ!");
}

// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>

<p><a href="view.php">Go to Home</a></p>

</body>
</html>
