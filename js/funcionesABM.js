function BorrarVoto(idParametro)
{
	//alert(idParametro);
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"BorrarVoto",
			idVoto:idParametro	
		}
	});
	funcionAjax.done(function(retorno){
		//alert(retorno);
		Mostrar("MostrarGrilla");
		$("#principal").html("cantidad de eliminados "+ retorno);	
		
	});
	funcionAjax.fail(function(retorno){	
		//alert(retorno);
		$("#principal").html(retorno.responseText);	
	});	
}

function EditarCD(idParametro)
{
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"TraerCD",
			id:idParametro	
		}
	});
	funcionAjax.done(function(retorno){
		var cd =JSON.parse(retorno);	
		$("#idCD").val(cd.id);
		$("#cantante").val(cd.cantante);
		$("#titulo").val(cd.titulo);
		$("#anio").val(cd.año);
	});
	funcionAjax.fail(function(retorno){	
		$("#informe").html(retorno.responseText);	
	});	
	Mostrar("MostrarFormAlta");
}

function GuardarVoto()
{
	alert("hola");
		var id=$("#idVoto").val();
		var provincia=$("#provincia").val();
		var candidato=$("#candidato").val();
		var sexo=$("#sexo").val();

		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"GuardarVoto",
			idVoto:id,
			provincia:provincia,
			candidato:candidato,
			sexo:sexo	
		}
	});
	funcionAjax.done(function(retorno){
		alert(retorno);
			Mostrar("Deslogear");
			MostrarLogin();
		$("#principal").html("cantidad de agregados "+ retorno);	
		
	});
	funcionAjax.fail(function(retorno){
	alert(retorno);	
		$("#principal").html(retorno.responseText);	
	});	
}
