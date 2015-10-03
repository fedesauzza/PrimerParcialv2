<?php 
require_once("clases/AccesoDatos.php");

$queHago=$_POST['queHacer'];

switch ($queHago) {
	case 'Votacion':
		include("partes/formVotacion.php");
		break;
	case 'video':
			include("partes/video.html");
		break;	
	case 'MostarBotones':
			include("partes/botonesABM.php");
		break;
	case 'MostrarGrilla':
			include("partes/formGrilla.php");
		break;
	case 'MostrarLogin':
			include("partes/formLogin.php");
		break;
	case 'MostrarFormAlta':
			include("partes/formvoto.php");
		break;
	case 'Borrarvoto':
			$voto = new voto();
			$voto->id=$_POST['id'];
			$cantidad=$voto->BorrarCd();
			echo $cantidad;

		break;
	case 'GuardarVoto':
			$voto = new Voto();
			$voto->id=$_POST['id'];
			$voto->dni=$_SESSION['registrado'];
			$voto->provincia=$_POST['provincia'];
			$voto->candidato=$_POST['candidato'];
			$voto->sexo=$_POST['sexo'];
			$cantidad=$voto->Guardarvoto();
			echo $cantidad;

		break;
	case 'Traervoto':
			$voto = voto::TraerUnvoto($_POST['id']);		
			echo json_encode($voto) ;

		break;
	default:
		# code...
		break;
}

 ?>