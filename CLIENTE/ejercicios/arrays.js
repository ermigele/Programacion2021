//Crear un Array

let frutas = ["Manzana", "Banana"]

//console.log(frutas.length)
// 2
//Acceder a un elemento de Array mediante su índice

let primero = frutas[0]
    // Manzana

let ultimo = frutas[frutas.length - 1]
    // Banana
    //Recorrer un Array

frutas.forEach(function(elemento, indice, array) {
        console.log(elemento, indice);
    })
    // Manzana 0
    // Banana 1
    //Añadir un elemento al final de un Array

let nuevaLongitud = frutas.push('Naranja') // Añade "Naranja" al final
    // ["Manzana", "Banana", "Naranja"]
    // Eliminar el último elemento de un Array

let ultimo = frutas.pop() // Elimina "Naranja" del final
    // ["Manzana", "Banana"]
    //Añadir un elemento al principio de un Array

let nuevaLongitud = frutas.unshift('Fresa') // Añade "Fresa" al inicio
    // ["Fresa" ,"Manzana", "Banana"]
    //Eliminar el primer elemento de un Array

let primero = frutas.shift() // Elimina "Fresa" del inicio
    // ["Manzana", "Banana"]
    //Encontrar el índice de un elemento del Array

frutas.push('Fresa')
    // ["Manzana", "Banana", "Fresa"]

let pos = frutas.indexOf('Banana') // (pos) es la posición para abreviar
    // 1
    //Eliminar un único elemento mediante su posición

Ejemplo:
    //Eliminamos "Banana" del array pasándole dos parámetros: la posición del primer elemento que se elimina y el número de elementos que queremos eliminar. De esta forma, .splice(pos, 1) empieza en la posición que nos indica el valor de la variable pos y elimina 1 elemento. En este caso, como pos vale 1, elimina un elemento comenzando en la posición 1 del array, es decir "Banana".
    let elementoEliminado = frutas.splice(pos, 1)
        // ["Manzana", "Fresa"]