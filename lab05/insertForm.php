<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Insert Record</title>
    <script type="text/javascript" src="showAvatar.js"></script> <!-- โหลด showAvatar.js -->
</head>

<body>
    <table align="center">
        <tr>
            <!-- รูป Avatar ให้เลือก -->
            <td><img src="./avatar/avatar1.jpg" width="45"></td>
            <td><img src="./avatar/avatar2.jpg" width="45"></td>
            <td><img src="./avatar/avatar3.jpg" width="45"></td>
            <td><img src="./avatar/avatar4.jpg" width="45"></td>
            <td><img src="./avatar/avatar5.jpg" width="45"></td>
            <td><img src="./avatar/avatar6.jpg" width="45"></td>
        </tr>
    </table>
    <br><br>

    <table align="center">
        <form id="myForm" action="insert.php" method="post" autocomplete="on">
            <tr>
                <!-- รูป Avatar ที่เปลี่ยนตามชื่อเล่น -->
                <td><img id="avatarImg" src="./avatar/avatar1.jpg" width="100"></td> 
                <td id="welcomeText">Welcome...</td>
                <td><input type="hidden" id="hid" name="avatar" value="./avatar/avatar1.jpg"></td>
            </tr>

            <tr>
                <td>Nickname:</td>
                <td><input type="text" id="nickname" name="nickname" maxlength="10" size="20" 
                           onblur="showAvatar(this.value)"></td> <!-- เรียก showAvatar.js เมื่อกรอกข้อมูล -->
            </tr>
            <tr>
                <td>Firstname:</td>
                <td><input type="text" name="firstname" maxlength="10" size="20"></td>
            </tr>
            <tr>
                <td>Lastname:</td>
                <td><input type="text" name="lastname" maxlength="10" size="20"></td>
            </tr>
            <tr>
                <td>Age:</td>
                <td><input type="number" name="age" min="1" max="100"></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td>
                    <select name="gender">
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><br><input type="submit" name="Save" value="Save">
                    <input type="reset" name="Cancel" value="Cancel"></td>
            </tr>
        </form>
    </table>
</body>
</html>
