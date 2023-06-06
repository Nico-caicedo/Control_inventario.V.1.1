
// ejecuciones

$(document).ready(function () {
    let edit = false;
    fechaula();



    // crea los elementos

    $('#form').submit(function (e) {

        var categoria = $('#lista-opciones').val();
        var marca = $('#select-datos').val();

        const datos = {
            name: $('#name').val(),
            cod: $('#cod').val(),
            categoria: categoria,
            marca: marca,
            crear: $('#crear').val(),
            descripcion: $('#descripcion').val()
        }
        let url = edit === false ? '../php/add_e.php' : '../php/edit_a.php';
        console.log(datos, url);
        $.post(url, datos, function (response) {
            edit = false;
               console.log(response);
            fechaula();
            $('#form').trigger('reset');


        })
        e.preventDefault();

    })

    // validar datos e input



    // hace aparecer los elementos



    function fechaula() {
        $.ajax({
            url: '../php/show_e.php',
            type: 'GET',
            success: function (response) {
                let aulas = JSON.parse(response);
                let template = '';
                aulas.forEach(aulas => {
                    template += `
                <tr aulaid=${aulas.id}>
                  
                    <td>${aulas.name}</td>
                    <td>${aulas.cod}</td>
                    <td>
                 
                    <img class="delet" src="../asset/img/trash.svg" alt="">
                   
                    </td>
                    </td>
                    <td >
                    <img  class="edit" src="../asset/img/edit.svg" alt="">
                    </td>
                   
                </tr>
                `
                });
                $('#show-e').html(template);
            }
        }

        )
    }


    $(document).on('click', '.delet', function () {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('aulaid');
        $.post('../php/delet_e.php', { id }, function (response) {
            fechaula();


        })
    });


    $(document).on('click', '.edit', function () {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('aulaid');
        $.post('../php/consul_a.php', { id }, function (response) {
            
            const aulas = JSON.parse(response);
            $('#name').val(aulas.name);
            $('#cod').val(aulas.cod);
            $('#id').val(aulas.id);
            edit = true;

        })
    })


})