$('#nick').change(function() {
	$.post('ajax_validacion_nick.php', {
		nick: $('#nick').val(),
		beforeSend: function() {
			$('.validacion').html("Espere un momento por favor..");
		}
	}, function(respuesta) {
		$('.validacion').html(respuesta);
	});
});
//boton para $ins = $com->query("INSERT INTO mitabla VALUES ('')");

//verificador de contraseña
$('$pass2').change(function(event) {
	if ($('#pass1').val() == $('#pass2').val()) {
		swal('Bien hecho...', 'Las contraseñas coinciden', 'success');
		$('#btn_guardar').show();
	} else {
		swal('Ooppss......', 'Las contraseñas no coinciden', 'error');
		$('#btn_guardar').hide();
	}
});

//llama a formulario y desactiva la tecla enter
$('.form').keypress(function(e) {
	if (e.which == 13) {
		return false;
	}
});
