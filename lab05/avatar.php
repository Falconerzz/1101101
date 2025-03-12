<?php
// รับค่าหมายเลขชื่อเล่นจาก showAvatar.js
$nickname = isset($_GET["nickname"]) ? intval($_GET["nickname"]) : 0;

// กำหนดชื่อ Avatar ตามหมายเลขที่ได้รับ
if ($nickname == 1) {
    echo "Mr. avatar1";
} elseif ($nickname == 2) {
    echo "Mrs. avatar2";
} elseif ($nickname == 3) {
    echo "Mr. avatar3";
} elseif ($nickname == 4) {
    echo "Mrs. avatar4";
} elseif ($nickname == 5) {
    echo "Mr. avatar5";
} else {
    echo "Mrs. avatar6"; // กรณีอื่น ๆ
}
?>
