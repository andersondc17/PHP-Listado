$(document).ready(function(){


   $('.btn-eliminar').click(function(){
       var valor = $(this).data('value');
       $('.btn-confirmar').attr('href','eliminar.php?id='+valor);
   });
});