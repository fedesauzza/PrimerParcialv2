function validarLogin()
{
		var varDni=$("#dni").val();
		var recordar=$("#recordarme").is(':checked');
		
$("#sidebar").html("<img src='imagenes/ajax-loader.gif' style='width: 30px;'/>");
	

	var funcionAjax=$.ajax({
		url:"php/validarDni.php",
		type:"post",
		data:{
			recordarme:recordar,
			dni:varDni,

		}
	});


	funcionAjax.done(function(retorno){
		//alert(retorno);
			if (retorno ==" ingreso")	
				{
				MostarBotones();
				MostrarLogin();

				$("#BotonLogin").html("Ir a salir<br>-Sesión-");
				$("#BotonLogin").addClass("btn btn-danger");				
				$("#dni").val("dni: "+retorno);
			}
	});
	funcionAjax.fail(function(retorno){
		$("#botonesABM").html(":(");
		$("#informe").html(retorno.responseText);	
	});
	
}
function deslogear()
{	
	var funcionAjax=$.ajax({
		url:"php/deslogearDni.php",
		type:"post"		
	});
	funcionAjax.done(function(retorno){
			MostarBotones();
			MostrarLogin();
			$("#dni").val("Sin DNI.");
			$("#BotonLogin").html("Login<br>-Sesión-");
			$("#BotonLogin").removeClass("btn-danger");
			$("#BotonLogin").addClass("btn-primary");
			
	});	
}
function MostarBotones()
{		//alert(queMostrar);
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostarBotones"}
	});
	funcionAjax.done(function(retorno){
		$("#botonesABM").html(retorno);
		//$("#informe").html("Correcto BOTONES!!!");	
	});
}
