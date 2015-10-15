<?php

require_once("clases/AccesoDatos.php");
require_once("clases/Voto.php");
session_start();

$queHago=$_POST['queHacer'];

switch ($queHago) {
	case 'Votacion':
		include("partes/formVotacion.php");
		break;
	case 'Deslogear':
			include("php/deslogearDni.php");
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
			include("partes/formVotacion.php");

		break;
	case 'BorrarVoto':
			$voto = new Voto();
			$voto->id_voto=$_POST['idVoto'];
			$cantidad=$voto->BorrarVoto();
			echo $cantidad;

		break;
	case 'GuardarVoto':
			//session_start();
			$voto = new Voto();
			$voto->id_voto=$_POST['idVoto'];
			$voto->dni=$_SESSION['registrado'];
			$voto->provincia=$_POST['provincia'];
			$voto->candidato=$_POST['candidato'];
			$voto->sexo=$_POST['sexo'];
			$cantidad=$voto->GuardarVoto();
			echo $cantidad;

		break;
	case 'TraerVoto':
			$voto = Voto::TraerUnVoto($_POST['idVoto']);		
			echo json_encode($voto) ;

		break;
	default:
		# code...
		break;
}

 ?>