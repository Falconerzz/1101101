<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Register Database</title>
    <script type="text/javascript">
        // ฟังก์ชันยืนยันการลบ
        function confirmDelete(id) {
            var confirmation = confirm("Are you sure to delete #id " + id + " ?");
            if (confirmation) {
                // ถ้าผู้ใช้ยืนยันให้ไปยังหน้า delete.php
                window.location.href = "delete.php?id=" + id;
            } else {
                // ถ้าผู้ใช้กด Cancel จะไม่ทำการลบ
                return false;
            }
        }
    </script>
</head>

<body>
    <p><a href="insertForm.html">Add a new record</a></p>

    <?php
    // เชื่อมต่อฐานข้อมูล
    $conn = mysqli_connect("localhost", "root", "", "RegisterDB");
    $conn->query("SET NAMES UTF8");

    // ดึงข้อมูลจากฐานข้อมูล
    $sql = "SELECT * FROM Register";
    $rs = $conn->query($sql);

    // แสดงข้อมูลในตาราง
    echo "<table border='1' cellpadding='10' width='80%'>";
    echo "<tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Age</th>
    <th>Gender</th>
    <th>Photo</th>
    <th>Actions</th>
    </tr>";

    // loop ผ่านผลลัพธ์และแสดงในตาราง
    while ($row = $rs->fetch_assoc()) {
        echo "<tr>";
        echo '<td>' . $row['ID'] . '</td>';
        echo '<td>' . $row['FirstName'] . '</td>';
        echo '<td>' . $row['LastName'] . '</td>';
        echo '<td>' . $row['Age'] . '</td>';
        echo '<td>' . $row['Gender'] . '</td>';
        // แสดงรูป avatar ที่เลือก
        echo '<td><img src="' . $row['Photo'] . '" width="100"></td>';
        // เพิ่มปุ่ม Edit และ Delete
        echo '<td>
                <a href="editForm.php?id=' . $row['ID'] . '">Edit</a> |
                <a href="#" onclick="return confirmDelete(' . $row['ID'] . ')">Delete</a>
              </td>';
        echo "</tr>";
    }

    echo "</table>";

    // ปิดการเชื่อมต่อฐานข้อมูล
    $conn->close();
    ?>

</body>

</html>
