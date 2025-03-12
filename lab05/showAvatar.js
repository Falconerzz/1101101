var xmlHttp;

// ฟังก์ชันสร้าง XMLHttpRequest
function createXMLHttpRequest() {
    if (window.ActiveXObject) {
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    } else {
        xmlHttp = new XMLHttpRequest();
    }
}

// ฟังก์ชันจัดการผลลัพธ์ที่ได้จาก avatar.php
function stateChange() {
    if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
        var response = xmlHttp.responseText.trim(); // รับค่าจาก avatar.php

        // Step 1: แจ้งเตือนชื่อ Avatar ที่ได้จาก avatar.php
        alert(response);

        // Step 2: ตัดคำหน้าชื่อ (Mr. หรือ Mrs.)
        var avatarParts = response.split(" ");
        var avatarName = avatarParts[avatarParts.length - 1]; // เช่น "Mr. avatar4" → "avatar4"

        // แจ้งเตือน Alert Box เฉพาะชื่อ Avatar ที่ถูกตัดคำนำหน้าออกแล้ว
        alert(avatarName);

        // Step 3: สร้างข้อความ Tag Image ของชื่อรูป
        var avatarImgPath = "./avatar/" + avatarName + ".jpg";
        var imgTag = '<img src="' + avatarImgPath + '">';

        // แจ้งเตือน Alert Box แสดงข้อความที่ต้องการส่งไปแสดง
        alert(imgTag);

        // Step 4: เปลี่ยนข้อความ Welcome...
        document.getElementById("welcomeText").innerHTML = "Welcome.. " + response;

        // เปลี่ยนรูป Avatar
        document.getElementById("avatarImg").src = avatarImgPath;

        // อัปเดตค่าใน hidden input เพื่อส่งไปยังฐานข้อมูล
        document.getElementById("hid").value = avatarImgPath;
    }
}

// ฟังก์ชันส่งค่า Nickname ไปยัง avatar.php
function showAvatar(str) {
    createXMLHttpRequest();
    xmlHttp.onreadystatechange = stateChange;

    var url = "avatar.php?nickname=" + str;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}