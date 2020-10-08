function validarIBAN(IBAN) {

    //Se pasa a Mayusculas
    IBAN = IBAN.toUpperCase();
    //Se quita los blancos de principio y final.
    IBAN = IBAN.trim();
    IBAN = IBAN.replace(/\s/g, ""); //Y se quita los espacios en blanco dentro de la cadena

    var letra1, letra2, num1, num2;
    var isbanaux;
    var numeroSustitucion;
    //La longitud debe ser siempre de 24 caracteres
    if (IBAN.length != 24) {
        return false;
    }

    // Se coge las primeras dos letras y se pasan a números
    letra1 = IBAN.substring(0, 1);
    letra2 = IBAN.substring(1, 2);
    num1 = getnumIBAN(letra1);
    num2 = getnumIBAN(letra2);
    //Se sustituye las letras por números.
    isbanaux = String(num1) + String(num2) + IBAN.substring(2);
    // Se mueve los 6 primeros caracteres al final de la cadena.
    isbanaux = isbanaux.substring(6) + isbanaux.substring(0, 6);

    //Se calcula el resto, llamando a la función modulo97, definida más abajo
    resto = modulo97(isbanaux);
    if (resto == 1) {
        return true;
    } else {
        return false;
    }
}

function modulo97(iban) {
    var parts = Math.ceil(iban.length / 7);
    var remainer = "";

    for (var i = 1; i <= parts; i++) {
        remainer = String(parseFloat(remainer + iban.substr((i - 1) * 7, 7)) % 97);
    }

    return remainer;
}

function getnumIBAN(letra) {
    ls_letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    return ls_letras.search(letra) + 10;
}

/* Función comprobarSiHayItemSeleccionado
Esta función permite saber si hay un item seleccionado en un radio button
 - Entradas: botonRadio (elemento radio button)
 - Salida: haySeleccionado (bool)
*/

function comprobarSiHayItemSeleccionado(botonRadio) {

    var haySeleccionado = false;

    for (var i in botonRadio) {
        if (botonRadio[i].checked) haySeleccionado = true;
    }

    return haySeleccionado;
}


/* Función comprobarLongitudTexto
Esta función permite saber si una cadena de caracteres tiene menos de una longitud determinada
 - Entradas: cadena (str), longitud (int)
 - Salida: valido (bool)
*/

function comprobarLongitudTexto(cadena, longitud) {

    valido = true;

    if (typeof cadena != "string" || typeof longitud != "number") valido = false;
    if (cadena.length < longitud) valido = false;

    return valido;

}	

/* Función soloNumerosDecimales
Esta función permite comprobar si una tecla introducida es un valor numérico entero o un punto
 - Entradas: evento (keyUp)
 - Salida: valido (booleano)
*/

function soloNumerosDecimales(e) {

    var valido = true;

    if (".0123456789".indexOf(e.key) == -1) valido = false;

    return valido;
}

/* Función soloNumeros
Esta función permite comprobar si una tecla introducida es un valor numérico entero
 - Entradas: evento (keyUp)
 - Salida: valido (booleano)
*/

function soloNumeros(e) { 
    var valido = true;

    return !("0123456789".indexOf(e.key) == -1);
}


function soloNum(e) {
    return (e.keyCode >= 48) && (e.keyCode <= 57);
}

/* Función soloAlfanumericos
Esta función permite comprobar si una tecla introducida es un valor numérico o alfabético español
 - Entradas: evento (keyUp)
 - Salida: valido (booleano)
*/

function soloAlfanumericos(e) {

    var valido = true;

    return ((e.key >= 'a' && e.key <= 'z') ||
        (e.key >= 'A' && e.key <= 'Z') ||
        "áéíóúÁÉÍÓÚñÑ ".indexOf(e.key) != -1 ||
        "0123456789".indexOf(e.key) == -1)
}

/* Función validarDni
Esta función nos permite comprobar si un DNI es válido o no. */


function soloLetras(e) {
    var condicion = (((e.keyCode >= 97) && (e.keyCode <= 122)) || ((e.keyCode >= 65) && (e.keyCode <= 90)));
    return condicion = condicion || (" ñÑáÁéÉíÍóÓúÚ".indexOf(e.key) != -1);;
}

function validaDni(dni) {
    var numero, letr
    var letras = 'TRWAGMYFPDXBNJZSQVHLCKET';

    if (dni.length == 9) {
        numero = dni.substr(0, dni.length - 1) % 23;
        letr = dni.substr(dni.length - 1, 1);
        return letr.toUpperCase() == letras.charAt(numero);
    }

    return false;
}

function contarLetras(letras, min) {
    return (letras.trim().length < min) ? true : false;
}

function contarLetrasExac(letras, num) {
    return (letras.trim().length == num) ? true : false;
}

