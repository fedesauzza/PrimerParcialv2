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

function EditarVoto(idParametro)
{
	alert("hola");
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"TraerVoto",
			idVoto:idParametro	
		}
	});
	funcionAjax.done(function(retorno){

		alert("chau");
		var voto =JSON.parse(retorno);
		$("#provincia").val(voto.provincia);
		alert(voto.provincia);
		$("#candidato").val(voto.candidato);
		alert(voto.candidato);
		$("#sexo").val(voto.sexo);
		alert(voto.sexo);	
		$("#idVoto").val(voto.id_voto);
		alert(voto.id_voto);

		
		Mostrar("MostrarFormAlta");
	});
	funcionAjax.fail(function(retorno){	
		$("#principal").html(retorno.responseText);	
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
