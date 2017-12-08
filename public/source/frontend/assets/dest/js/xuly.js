
function Searchajax(str) {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = ajaxRespond;
    xmlhttp.open("GET", "timkiem?q=" + str);
    xmlhttp.send();
}
function ajaxRespond() {
    if (xmlhttp.readyState != 4) {
        return;
    } else {
        if (xmlhttp.status == 200) {
            document.getElementById("livesearch").innerHTML = xmlhttp.responseText;
        } else {
            alert("failed");
        }
    }
}

function xuly(str) {// khi chọn 1 row kết quả row đó sẽ hiện trong ô text
    document.getElementById("text_search").value = str;
    document.getElementById("livesearch").style.visibility = 'hidden';// ẩn kết quả còn lại
}