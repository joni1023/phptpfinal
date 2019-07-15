$(document).ready(function () {
    console.log('Script cargado');
    $("#buscar").keyup(function () {
        let buscar=$("#buscar").val();
        let buscarpor=$("#buscarpor").val();
        console.log(buscar);
        $.ajax({
            url:"buscarbase.php",
            type:"POST",
            data:{buscar:buscar, buscarpor:buscarpor},
            success:  function (respuesta) {

                let resultados= JSON.parse(respuesta);
                let template = '';//estocrea etiquetas
                console.log(resultados);

                resultados.forEach( item =>{

                    template += `
                     <option value="${item.nombre} ">
                    `

                });
                $("#buscart").html(template);
                $('#buscados').html(template);

            }
        })

    });

    function listarmensajes() {


    }















});