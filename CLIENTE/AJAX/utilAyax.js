const pAJAX = (metodo, url, fCallback) => {
    const peti = new XMLHttpRequest();

    peti.onreadystatechange = () => {
            if ((peti.readyState == 4) && (peti.status == 200)) {
                console.log(peti.responseText);
                fCallback(JSON.parse(peti.responseText));
            }
        }
        //  Suponemos que este fichero está en la misma carpeta donde está servidor.php
    peti.open(metodo, url);
    //  Si el servicio al que llamamos está en la misma carpeta no hay que poner toda la url
    peti.send();
}