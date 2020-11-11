const petiPOST = (url, objeto, fCallback) => {
    var peti = new XMLHttpRequest();

    peti.onreadystatechange = () => {
        if (fCallback != null && (peti.readyState == 4) && (peti.status == 200)) {
            fCallback(JSON.parse(peti.responseText));
        }
    }
    peti.open("POST", url);
    peti.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Establezco una cabecera para petición POST:
    peti.send(JSON.stringify(objeto));
}