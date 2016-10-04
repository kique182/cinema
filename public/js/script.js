/**
 * Created by Fenando Medina on 04/10/2016.
 */
$("#registro").click(function () {
   var dato=$('#genre').val();
   var route = "http://localhost:8000/genero";
   var token = $("#token").val();

    $.ajax({
       url: route,
       headers: {'X-CSRF-TOKEN': token},
       type: 'POST',
       dataType: 'json',
       data: {genre:dato},

       success:function()
       {
        $("#msj-success").fadeIn();
       }
    });
});