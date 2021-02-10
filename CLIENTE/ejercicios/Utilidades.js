function aMayusculas() {
    this.value = this.value.toUpperCase();
}

function validarDNI(dni) {

    if (dni == "") {
        correcto = false;
        document.getElementById("info_dni").innerHTML = "Rellene el DNI";
        //   dni.focus();
    } else {
        var numero = dni.substr(0, dni.length - 1);
        var letra = dni.substr(dni.length - 1, 1);
        var letras = 'TRWAGMYFPDXBNJZSQVHLCKET';
        var formatoDNI = /^\d{8}[a-zA-Z]$/;

        if (formatoDNI.test(dni) == true) {
            numero = numero % 23;
            letras = letras.substring(numero, numero + 1);
            if (letras != letra.toUpperCase()) {
                document.getElementById("info_dni").innerHTML = "Letra del DNI no se corresponde";
                //   dni.focus();
                correcto = false;
            }
        } else {
            document.getElementById("info_dni").innerHTML = "Formato incorrecto";
            //   dni.focus();
            correcto = false;
        }
    }

}

function PermiteSoloLetrasEspacios() {
    if ((!this.value >= 65 || !this.value <= 90) || (!this.value >= 97 || !this.value <= 122)) {
        document.getElementById("nombre").innerHTML = "Solo se permite caracter tipo letra o espacio";
        return false;
    }
}