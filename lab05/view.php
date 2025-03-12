<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>View Register Database</title>
<script src="showName.js"></script>
</head>

<body>
<p><a href="insertForm.php">Add a new record</a></p>

<!-- ฟอร์มค้นหา -->
<form action="view.php" method="get">
    <input list="name" name="search" onkeyup="searchName(this.value)"> 
    <datalist id="name">
        <option value="%">
    </datalist>
    <input type="submit" value="search">
</form>

<?php
// เชื่อมต่อฐานข้อมูล
$conn = mysqli_connect("localhost", "root", "", "RegisterDB");
$conn->query("SET NAMES UTF8");

// ตรวจสอบการเชื่อมต่อ
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// ค้นหาข้อมูลตามชื่อ
if (isset($_GET["search"]) && $_GET["search"] !== "") {
    $name = $_GET["search"];
    $sql = "SELECT * FROM register WHERE FirstName LIKE '$name%'";
} else {
    $sql = "SELECT * FROM register";
}

$rs = $conn->query($sql);

// สร้างตารางแสดงข้อมูล
echo "<table border='1' cellpadding='10' width=80%>";
echo "<tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Photo</th>
        <th></th>
      </tr>";

// แสดงผลลัพธ์จากฐานข้อมูล
while ($row = $rs->fetch_assoc()) {
    $id = $row['ID'];
    echo "<tr>";
    echo "<td>" . $id . "</td>";
    echo "<td>" . $row['FirstName'] . "</td>";
    echo "<td>" . $row['LastName'] . "</td>";
    echo "<td>" . $row['Age'] . "</td>";
    echo "<td>" . $row['Gender'] . "</td>";
    echo "<td><img src='" . $row['Photo'] . "' width='100'></td>";
    echo "<td><a href='editForm.php?id=" . $id . "'>Edit</a> ";
    echo "<a href='delete.php?id=" . $id . "'>Delete</a></td>";
    echo "</tr>";
}

echo "</table>"; // ปิดตาราง

$conn->close();
?>
</body>
</html>
