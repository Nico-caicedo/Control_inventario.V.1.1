

// Creamos una instancia del objeto XMLHttpRequest
var xhr = new XMLHttpRequest();

// Configuramos la petición
xhr.open("GET", "opciones.php");

// Definimos la función que se ejecutará cuando la respuesta esté lista
xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        // Parseamos la respuesta JSON
        var opciones = JSON.parse(xhr.responseText);

        // Referenciamos la etiqueta select
        var select = document.getElementById("lista-opciones");
        
        // Recorremos las opciones y las añadimos al select
        opciones.forEach(function (opcion) {
            var option = document.createElement("option");
            option.value = opcion.id;
            option.text = opcion.nombre;
            select.appendChild(option);
        });
    }
};

// Enviamos la petición
xhr.send();










// rellena el segundo select

// Referenciamos los elementos select
var selectOpciones = document.getElementById("lista-opciones");
var selectDatos = document.getElementById("select-datos");

// Agregamos un listener al evento change del primer select
selectOpciones.addEventListener("change", function () {
    // Obtenemos el id de la opción seleccionada
    var idOpcion = selectOpciones.value;

    // Hacemos la petición AJAX para obtener los datos relacionados
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "datos.php?id_opcion=" + idOpcion);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            // Parseamos la respuesta JSON
            var datos = JSON.parse(xhr.responseText);

            // Borramos las opciones anteriores del segundo select
            selectDatos.innerHTML = "";

            // Recorremos los datos y los añadimos al select
            datos.forEach(function (dato) {
                var option = document.createElement("option");
                option.value = dato.id;
                option.text = dato.nombre;
                selectDatos.appendChild(option);
            });
        }
    };
    xhr.send();
});

// Función para rellenar el segundo select con los datos devueltos
function rellenarSelectDatos(datos) {
    // Borramos las opciones anteriores del segundo select
    selectDatos.innerHTML = "";

    // Recorremos los datos y los añadimos al select
    datos.forEach(function (dato) {
        var option = document.createElement("option");
        option.value = dato.id;
        option.text = dato.nombre;
        selectDatos.appendChild(option);
    });
}
