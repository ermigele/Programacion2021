function validarNIF_V2(dni) {
    debugger;
    var num;
    var letra;
    var condicion = "TRWAGMYFPDXBNJZSQVHLCKE";
    var valido = true;

    if (dni.length == 10) {
        num = dni.substr(0, dni.length - 2);
        letra = dni.substr(dni.length - 2)
    } else {
        num = dni.substr(0, dni.length - 1);
        letra = dni.substr(dni.length - 1)
    }

    if (dni.length != 9) {
        valido = false;
    } else if (letra != condicion[num % 23]) {
        valido = false;
    }
    letra = letra.toUpperCase();
    return { letra, valido, dni };
}