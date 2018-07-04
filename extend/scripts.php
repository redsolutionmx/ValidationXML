-  </main>
<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
  <script src="../js/materialize.min.js"></script>
    <script src="../js/push.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.js"></script>
  <script
  src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
  integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
  crossorigin="anonymous">
  </script>
<!--css datepicker-->
  <link href="https://dl.dropboxusercontent.com/s/vlpbj1w2e5ty7i7/jquery.sidr.dark.css?dl=0" rel="stylesheet"></link>
  <link href="https://dl.dropboxusercontent.com/s/sgzcu4kvh9brayv/jquery-ui-1.10.2.css?dl=0" rel="stylesheet"></link>
  <!--Incluir jquery y libreria para el calendario y su traduccion al español-->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.7.2.custom.css" />
  <script>
  // Get the modal
  var modal = document.getElementById('myModal');

  // Get the button that opens the modal
  var btn = document.getElementById("myBtn");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks the button, open the modal
  btn.onclick = function() {
      modal.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
      modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }
  </script>



  <!--Calendario de historial-->
  <script>
      /*const Calender = document.querySelector('.datepicker');
      M.Datepicker.init(Calender,{
        format: 'dd-mm-yyyy'
      });*/

      $(document).ready(function(){
        $('.datepicker').datepicker();
      });
  </script>

<script type="text/javascript" src="jquery.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<!-- jquery para boton de menu-->
  <script>
//Script para filtrar informacion en el Buscador
$('#buscar').keyup(function(event){
  var contenido = new RegExp($(this).val(), 'i');
  $('tr').hide();
  $('tr').filter(function(){
    return contenido.test($(this).text());
  }).show();
  //seleccion la tabla de abajo y no la de arriba
  $('.cabecera').attr('style','');
});
//-------------------------------

    $('.button-collapse').sideNav();
    //Arriba es jquery para boton de menu deslizable, abajo para convertir todas las letras del formulario en mayuscula
    $('select').material_select();
    //usado para el select
    function may(ibj,id){
      obj = obj.toUpperCase();
      document.getElementById(id).value = obj;
    }

//script para el switch
$(document).ready(function() {
    $("input").change(function() {
    if($(this).is(":checked")) {
      console.log("Is checked");
    }
    else {
      console.log("Is Not checked");
    }
  })
});
//Termina script para switch

  </script>
<!--ajax para el input de comentario-->
  <script>
$(document).ready(function(){
    $("form#get").submit(function(event) {
        event.preventDefault();
        var input = $("#pin");

        $.ajax({
            type: "POST",
            url: "carga.php",
            success: function(data) { input.val(data); }
        });
    });
});
</script>
<!--Toma el valor de comentario -->
<script>
//var Comentario = prompt("¿Porque lo rechaza?" , "No ingreso comentario");
//Primera opcion

function post()
	{
		//var Comentario = prompt("¿Porque lo rechaza?" , "Sin comentario");
    var Comentario = $('#Comentario').val();
    //alert(Comentario);

    $.post('comentario.php', {postComentario: Comentario},
  function(data)
  {
    $('#result').html(data);
  });
}


/* Segunda opcion
$("#sub").click(function(){
$.post($("#myForm").attr("action"), $("#myForm :input").serializeArray() data, function(info) { echo $("#result").html(info); } );
clearInput();
});

$("#myForm").submit(function(){
  return false;
} );

function clearInput(){
  $("#myForm :input").each(function(){
    $(this).val('');
  });
}*/

//Tercera opcion
//Variable to hold request
var request;
//Bind to the sibmit event of our form
$("#foo").submit(function(event){
  //Prevent default posting of form - put here to work in case of errors
  event.preventDefault();

//Abort any pending request
if (request) {
    request.abort();
}
//setup some local variables
var $form = $(this);
//Let's select and cache all the fields
var $inputs = $form.find("input, select, button, textarea");
//serialize the data in the form

var serializedData = $form.serialize();
//Let´s disable the inputs for the duration of the ajax request
//Note: we disable elements AFTER the form data has been serialized
//Disable form elements will not be serialized
$inputs.prop("disabled" , true);
//Fire off the request to /comentario.php
request = $.ajax({
  url: "/comentario.php",
  type: "post",
  data: serializedData
});
//Callback handler that will be called on success
request.done(function (response, textStatus, jqXHR){
  //log a message to the console
  console.log("Huurra funciona!");
});
//Callback handler that will be called on failure
request.fail(function (jqXHR, textStatus, errorThrown){
  //Log the error to the console
  console.error(
    "Ocurrio el siguiente error: " + textStatus, errorThrown
  );
});

//Callback handler that will be called regardless
//if the request failed or succeded
request.always(function(){
  //Reenable the inputs
  $inputs.prop("disabled", false);
  });
});
</script>

<script>
/*
(async function tomarValor(){
  id=1;
  const {value: comenta} = await swal({
    title: '¿Cual es tu Comentario?',
    input: 'text',
    inputPlaceholder: 'Comentario',
    type: 'question',
    confirmButtonColor:'#3085d6',
    confirmButtonText: 'Comentar',
  })
  if (comenta) {
    swal({
      title: '¿Estas seguro?',
      text: '¿desea rechazarlo?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor:'#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, rechazar!'
    }).then(function () {
    swal('rechazo.php?id='+id+'&coment='+comenta+';'  )})
  }
})()
*/

//jQuery swalExtend para mas botones
var swalFunction = function(){
  swal({
      title: "Are you sure?",
      text: "You will not be able to recover this imaginary file!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, delete it!",
      closeOnConfirm: false
    },
    function(){
      swal("Deleted!", "Your imaginary file has been deleted.", "success");
    });
};

$("button").click(function() {
    swalExtend({
        swalFunction: swalFunction,
        hasCancelButton: true,
        buttonNum: 2,
        buttonColor: ["blue", "green"]
        buttonNames: ["maybe delete", "probably/partially delete"],
        clickFunctionList: [
            function() {
                console.debug('ONE BUTTON');
            },
            function() {
                console.debug('TWO BUTTON');
            }
        ]
    });
  });
  //*************************************************************************
</script>

<script>
//Script para hacer buscar por estatus
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('select').formSelect();
  });

</script>

<script>
//Script de inicio para calendario de busqueda
$('.datepicker').datepicker()

</script>

<script src="../js/swalExtend.js"></script>
<link rel="stylesheet" type="text/css" href="../css/swalExtend.css">
<script>$('.datepicker').datepicker()</script>

<link rel="stylesheet" href="../css/jquery.dialog.min.css">
<script src="../js/jquery.dialog.min.js"></script>

<!--Funcion de boton valido-->
<script></script>
