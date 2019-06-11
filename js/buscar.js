$(document).ready(function () {
    let array=[];
    $.ajax({
        type: "GET",
        dataType: "json",
        url: 'buscaritem.php',
        success: function (respuesta) {
            // array = JSON.parse(respuesta);
            console.log(respuesta);
        }

    })

    $("#buscar").autocomplete({
        source: array
        }
    )

});