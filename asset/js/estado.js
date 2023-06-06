$(document).ready(function () {
    $('#select-ambiente').on('change', function () {
        const idAmbiente = $(this).val();
        console.log(idAmbiente)
        filtrarPorAmbiente(idAmbiente);
     
    });



    function filtrarPorAmbiente(idAmbiente) {
        $.ajax({
            url: '../php/estado.php',
            method: 'POST',
            data: { idAmbiente: idAmbiente },

            success: function (response) {
                console.log(response);
                let template = '';
                response.forEach(inventario => {
                    let estado = '';
                    if (inventario.estado == 1) {
                        estado = 'En desuso';
                    } else if (inventario.estado == 2) {
                        estado = 'En uso';
                    } else if (inventario.estado == 3) {
                        estado = 'En reparación';
                    } else {
                        estado = 'Desconocido';
                    }
                    template += `
                    <tr>
                        <td>${inventario.id}</td>
                        <td>${inventario.nombre_aula}</td>
                        <td>${inventario.nombre_categoria}</td>
                        <td>${inventario.nombre_marca}</td>
                        <td>${inventario.nombre_elemento}</td>
                        <td>${estado}</td>
                    </tr>
                `

                });
              
                $('#tabla_inventario tbody').html(template); // insertar datos en la tabla
            }
        });
    }

    // // función para obtener los datos del inventario según el ambiente seleccionado
    // function obtenerDatosInventario(idAmbiente) {
    //     return $.ajax({
    //         url: '../php/estado.php',
    //         method: 'POST',
    //         data: { idAmbiente: idAmbiente }

    //     });
    // }



    // // función para actualizar la tabla con los datos del inventario
    // function actualizarTablaInventario(datos) {
    //     // obtener referencia a la tabla
    //     const tabla = $('#tabla_inventario tbody');

    //     // limpiar tabla antes de agregar los nuevos datos
    //     tabla.empty();

    //     // iterar por cada fila de datos y crear una nueva fila en la tabla
    //     datos.forEach(dato => {
    //         const fila = `<tr>
    //     <td>${dato.id}</td>
    //     <td>${dato.nombre_aula}</td>
    //     <td>${dato.nombre_categoria}</td>
    //     <td>${dato.nombre_marca}</td>
    //     <td>${dato.nombre_elemento}</td>
    //     <td>${dato.estado}</td>
    //   </tr>`;
    //         tabla.append(fila);
    //     });
    // }

    // // evento change del selector de ambiente
    // $('#select-ambiente').on('change', function () {
    //     // obtener el valor seleccionado
    //     const idAmbiente = $(this).val();

    //     // obtener los datos del inventario según el ambiente seleccionado
    //     obtenerDatosInventario(idAmbiente).done(function (response) {
    //         // convertir la respuesta JSON en un arreglo de objetos
    //         const datos = JSON.parse(response);
    //         console.log(datos)
    //         // actualizar la tabla con los nuevos datos
    //         actualizarTablaInventario(datos);
    //     });
    // });

    // // inicialmente cargar todos los datos del inventario
    // obtenerDatosInventario('').done(function (response) {
    //     // convertir la respuesta JSON en un arreglo de objetos
    //     const datos = JSON.parse(response);

    //     // actualizar la tabla con los nuevos datos
    //     actualizarTablaInventario(datos);
    // });




    // Creamos una instancia del objeto XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Configuramos la petición
    xhr.open("GET", "call_a.php");

    // Definimos la función que se ejecutará cuando la respuesta esté lista
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            // Parseamos la respuesta JSON
            var opciones = JSON.parse(xhr.responseText);

            // Referenciamos la etiqueta select
            var select = document.getElementById("select-ambiente");

            // Recorremos las opciones y las añadimos al select
            opciones.forEach(function (opcion) {
                var option = document.createElement("option");
                option.value = opcion.id_aula;
                option.text = opcion.nombre;
                select.appendChild(option);
            });
        }
    };

    // Enviamos la petición
    xhr.send();


})
