<?php
// เชื่อมต่อฐานข้อมูล
$conn = mysqli_connect("localhost", "root", "", "RegisterDB");
$conn->query("SET NAMES UTF8");

// ตรวจสอบว่ามีค่า ID ที่ส่งมาหรือไม่
if(isset($_GET['id'])) {
    $id = intval($_GET['id']); // ป้องกัน SQL Injection

    // ดึงข้อมูลของ ID ที่เลือกมาแก้ไข
    $sql = "SELECT * FROM Register WHERE ID = $id";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No record found!";
        exit();
    }
} else {
    echo "Invalid ID!";
    exit();
}
?>

<html>
<head>
    <title>Edit Record</title>
</head>
<body>
    <form action="edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
        <label>Firstname:</label> 
        <input type="text" name="firstname" value="<?php echo $row['FirstName']; ?>" required><br><br>
        
        <label>Lastname:</label> 
        <input type="text" name="lastname" value="<?php echo $row['LastName']; ?>" required><br><br>
        
        <label>Age:</label> 
        <input type="text" name="age" value="<?php echo $row['Age']; ?>" required><br><br>
        
        <label>Gender:</label>
        <select name="gender">
            <option value="Male" <?php if($row['Gender'] == 'Male') echo 'selected'; ?>>Male</option>
            <option value="Female" <?php if($row['Gender'] == 'Female') echo 'selected'; ?>>Female</option>
        </select><br><br>

        <input type="submit" name="save" value="Save">
        <input type="reset" value="Cancel">
    </form>
</body>
</html>

<?php
// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>
