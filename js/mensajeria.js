$(document).ready(function () {
   console.log("script mensajeria cargado");
   listarmensaje();
$('#form-mensaje').submit(function (e) {
   e.preventDefault();

   let remitente=$("#remitente").val();
       let iditem=$("#iditem").val();
        let mensaje=$("#mensaje").val();
    //forma de seleccion or el name del radio ckeck
        let metodomensaje=$("input[name='metodomensaje']:checked").val();

    $.ajax({
        url: "logica/añadirMensaje.php",
        type:"POST",
        data:{iditem:iditem,remitente:remitente,mensaje:mensaje,metodomensaje:metodomensaje},
        success:function (respuesta) {
            console.log(respuesta);
            $('#form-mensaje').trigger('reset');
            listarmensaje();
        }
    })

});
function listarmensaje() {
    let iditem = $("#iditemM").val();
    console.log(iditem);
    $.ajax({
        url: "logica/listarmensaje.php",
        type:"POST",
        data: {iditem:iditem},
        success: function (respuesta) {
            let listamen = JSON.parse(respuesta);
            let template = '';
            listamen.forEach( mensaje => {
                template += `
                  <li>
                    <div class="review-heading">
                    <h5 class="name">${mensaje.remitente}</h5>
                    <p class="date">${mensaje.fecha}</p>
                    </div>
                    <div class="review-body">
                    <p style="overflow-wrap: break-word; ">${mensaje.mensaje}</p>
                    </div>
                    </li>
                `
            });
            $('#mensajeria').html(template);

        }
    });
}

});