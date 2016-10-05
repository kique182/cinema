$(document).ready(function () {
    Cargar();
});

function Cargar() {
    var tablaDatos=$('#datos');
    var route="http://localhost:8000/genero";

    $("#datos").empty();
    $.get(route, function (res) {
        $(res).each(function (key,value) {
            tablaDatos.append("<tr><td>"+value.genre+"</td><td><button value="+value.id+" OnClick='Mostrar(this);' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>Editar</button><button value="+value.id+" OnClick='Eliminar(this);' class='btn btn-danger'>Eliminar</button></td></tr>");
        });
    });

}

function Mostrar(btn)
{
    var route = "http://localhost:8000/genero/"+btn.value+"/edit";
    $.get(route, function (res) {
       $("#genre").val(res.genre);
        $("#id").val(res.id);
    });
}

function Eliminar(btn)
{
    var route = "http://localhost:8000/genero/"+btn.value+"";
    var token = $("#token").val();
    $.ajax({
        url:route,
        headers: {'X-CSRF-TOKEN':token},
        type:'DELETE',
        dataType:'json',

        success:function ()
        {
            Cargar();
            $("#msj-success").fadeIn();
        }
    });
}
$("#actualizar").click(function ()
{
    var value = $('#id').val();
    var dato = $('#genre').val();
    var route = "http://localhost:8000/genero/"+value+"";
    var token = $("#token").val();
    $.ajax({
       url:route,
       headers: {'X-CSRF-TOKEN':token},
       type:'PUT',
       dataType:'json',
       data:{genre:dato},

       success:function ()
       {
            Cargar();
            $("#myModal").modal('toggle');
            $("#msj-success").fadeIn();
       }
    });
});