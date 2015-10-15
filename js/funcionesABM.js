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
	Mostrar("MostrarFormAlta");
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"TraerVoto",
			idVoto:idParametro	
		}
	});
	funcionAjax.done(function(retorno){

		var voto =JSON.parse(retorno);
		$("#provincia").val(voto.provincia);
		$("#candidato").val(voto.candidato);
		$("#idVoto").val(voto.id_voto);
		if (voto.sexo == 'M') {
			document.getElementById('sexoM').checked = true;
		}
		else{
			document.getElementById('sexoF').checked = true;
		}
	});
	funcionAjax.fail(function(retorno){	
		$("#principal").html(retorno.responseText);	
	});

	
}

function GuardarVoto()
{

		var id=$("#idVoto").val();
		var provincia=$("#provincia").val();
		var candidato=$("#candidato").val();
		var sexo;
		if (document.getElementById('sexoM').checked == true) {
			sexo = 'M';
		}
		else{
			sexo = 'F';
		}

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
