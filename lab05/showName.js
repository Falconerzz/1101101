var xmlHttp;

// ฟังก์ชันสร้าง XMLHttpRequest
function createXMLHttpRequest() {
    if (window.ActiveXObject) {
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    } else {
        xmlHttp = new XMLHttpRequest();
    }
}

// ฟังก์ชันจัดการผลลัพธ์ที่ได้จาก name.php
function stateChange() {
    if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
        document.getElementById("name").innerHTML = xmlHttp.responseText;
    }
}

// ฟังก์ชันส่งค่าค้นหาชื่อไปยัง name.php
function searchName(str) {
    createXMLHttpRequest();
    xmlHttp.onreadystatechange = stateChange;

    var url = "name.php?name=" + str;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}