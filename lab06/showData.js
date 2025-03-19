var xmlHttp;

function createXMLHttpRequest() {
    if (window.ActiveXObject) { // Internet Explorer
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    } else { // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    }
}

function stateChange() {
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
        var result = JSON.parse(xmlHttp.responseText); // แปลงข้อมูลที่ได้จาก JSON
        alert("localhost says\n" + JSON.stringify(result)); // แสดงข้อมูลใน alert box
        // ส่งข้อมูลที่ได้แสดงในฟอร์ม
        document.myForm.firstname.value = result.firstname;
        document.myForm.lastname.value = result.lastname;
        document.myForm.age.value = result.age;
        document.myForm.gender.value = result.gender;
        document.getElementById("pic").innerHTML = '<img src="' + result.photo + '">';
        document.getElementById("hid").value = result.photo;
    }
}

function searchName(str) {
    createXMLHttpRequest();
    xmlHttp.onreadystatechange = stateChange;
    var url = "data.php?name=" + str;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}