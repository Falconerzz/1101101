<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="showData.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    var clickCount3 = 0;  // จำนวนคลิกสำหรับรูปที่ 3
    var clickCount4 = 0;  // จำนวนคลิกสำหรับรูปที่ 4

    // คำสั่งที่ 2.1: คลิก 1 ครั้ง รูปที่ 1 ให้เปลี่ยนพื้นหลังเป็นสีเขียว
    $("#img1").click(function() {
        $("body").css("background-color", "green"); // เปลี่ยนพื้นหลังของหน้าเว็บเป็นสีเขียว
        changeImg(1);  // เรียกฟังก์ชันการเปลี่ยนรูป
    });

    // คำสั่งที่ 2.2: คลิกรูปที่ 2 และดับเบิ้ลคลิกที่รูปที่ 2 ให้เปลี่ยนพื้นหลังเป็นสีเหลือง
    $("#img2").click(function() {
        changeImg(2);  // เรียกฟังก์ชันการเปลี่ยนรูป
    });

    $("#img2").dblclick(function() {
        $("body").css("background-color", "yellow"); // เปลี่ยนพื้นหลังเป็นสีเหลือง
    });

    // คำสั่งที่ 2.3: ดับเบิ้ลคลิกที่รูปที่ 3 เพื่อเปลี่ยนตัวอักษรใน <td> เป็นสีแดง
    $("#img3").dblclick(function() {
        $("td").css("color", "red");  // เปลี่ยนสีตัวอักษรใน <td> (Firstname, Lastname, Age, Gender) เป็นสีแดง
    });

    // คำสั่งที่ 2.4: ดับเบิ้ลคลิกที่รูปที่ 4 เพื่อเปลี่ยนสีพื้นหลังของ <td> ที่มี input และ select
    $("#img4").dblclick(function() {
        $("input, select").closest("input, select").css("background-color", "blue");  // เปลี่ยนสีพื้นหลังของ td ที่มี input และ select
    });

    // คำสั่งที่ 2.5: เอาเมาส์วางเหนือรูปที่ 5 ซ่อนแท็ก input ทั้งหมด
    $("#img5").mouseenter(function() {
        $("input").hide();  // ซ่อนทุก <input> ที่อยู่ในหน้า
        changeImg(5);  // เรียกฟังก์ชันการเปลี่ยนรูป
    });

    // คำสั่งที่ 2.6: เอาเมาส์วางเหนือรูปที่ 5 และคลิกที่รูปที่ 6 แล้วเอาเมาส์ออกจากรูป
    $("#img5").mouseenter(function() {
        $("#img6").click(function() {
            $("input").show();  // แสดง <input> ทั้งหมดที่ถูกซ่อน
            changeImg(6);  // เรียกฟังก์ชันการเปลี่ยนรูป
        });
    });
});

function changeImg(imgID) {
    if(imgID == 1) {
        document.getElementById("pic").innerHTML = '<img src="./avatar/avatar1.jpg">';
        document.getElementById("hid").value = "./avatar/avatar1.jpg";
    } else if(imgID == 2) {
        document.getElementById("pic").innerHTML = '<img src="./avatar/avatar2.jpg">';
        document.getElementById("hid").value = "./avatar/avatar2.jpg";
    } else if(imgID == 3) {
        document.getElementById("pic").innerHTML = '<img src="./avatar/avatar3.jpg">';
        document.getElementById("hid").value = "./avatar/avatar3.jpg";
    } else if(imgID == 4) {
        document.getElementById("pic").innerHTML = '<img src="./avatar/avatar4.jpg">';
        document.getElementById("hid").value = "./avatar/avatar4.jpg";
    } else if(imgID == 5) {
        document.getElementById("pic").innerHTML = '<img src="./avatar/avatar5.jpg">';
        document.getElementById("hid").value = "./avatar/avatar5.jpg";
    } else if(imgID == 6) {
        document.getElementById("pic").innerHTML = '<img src="./avatar/avatar6.jpg">';
        document.getElementById("hid").value = "./avatar/avatar6.jpg";
    }
}

function searchName(str) {
    if (str.length == 0) {
        document.getElementById("note").innerHTML = "";
        return;
    }
    createXMLHttpRequest();
    xmlHttp.onreadystatechange = stateChange;
    var url = "data.php?name=" + str;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function stateChange() {
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
        var result = JSON.parse(xmlHttp.responseText);  // แปลงข้อมูลที่ได้จาก JSON
        alert("localhost says\n" + JSON.stringify(result)); // แสดงข้อมูลใน Alert Box
        document.myForm.firstname.value = result.firstname;
        document.myForm.lastname.value = result.lastname;
        document.myForm.age.value = result.age;
        document.myForm.gender.value = result.gender;
        document.getElementById("pic").innerHTML = '<img src="' + result.photo + '">';
        document.getElementById("hid").value = result.photo;
    }
}
</script>
</head>

<body>
<Table align="center">
 <TR>
 <TD><img src="./avatar/avatar1.jpg" id="img1" width="45" onclick="changeImg(1)"></TD>
 <TD><img src="./avatar/avatar2.jpg" id="img2" width="45" onclick="changeImg(2)"></TD>
 <TD><img src="./avatar/avatar3.jpg" id="img3" width="45" onclick="changeImg(3)"></TD>
 <TD><img src="./avatar/avatar4.jpg" id="img4" width="45" onclick="changeImg(4)"></TD>
 <TD><img src="./avatar/avatar5.jpg" id="img5" width="45" onclick="changeImg(5)"></TD>
 <TD><img src="./avatar/avatar6.jpg" id="img6" width="45" onclick="changeImg(6)"></TD>
 </TR>
</Table>

<BR>
<p id="note"></p>

<BR>
<Table align="center">
<form name="myForm" action="insert.php" method="post" autocomplete="on" enctype="multipart/form-data">
 <TR><TD id="pic"><img src="./avatar/avatar1.jpg"></TD>
     <TD><input type="hidden" id="hid" name="avatar" value="./avatar/avatar1.jpg"></TD>
 </TR>
 <TR><TD> Firstname:</TD><TD><input type="text" name="firstname" maxlength="10" size="20" onblur="searchName(this.value)"></TD></TR>
 <TR><TD> Lastname: </TD><TD><input type="text" name="lastname" maxlength="10" size="20"></TD></TR>
 <TR><TD> Age: </TD><TD><input type="number" name="age" min="1" max="100"></TD></TR>
 <TR><TD>Gender:</TD><TD>
     <select name="gender">
 <option value="Female">Female</option>
 <option value="Male">Male</option>
     </select></TD></TR>
<TR><TD></TD><TD><BR><input type="submit" name="Save" value="Save">
<input type="reset" name="Cancel" value="Cancel"></TD></TR>
</form>
</Table>

</body>
</html>
