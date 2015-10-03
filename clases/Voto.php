<?php
class Voto
{
	public $id_voto;
	public $dni;
	public $provincia;
	public $candidato;
	public $sexo;

	public function GuardarVoto()
	 {

	 	if($this->id_voto>0)
	 		{
	 			$this->ModificarVotoParametros();
	 		}else {
	 			$this->InsertarElVotoParametros();
	 		}

	 }
	 public function ModificarVotoParametros()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL ModificarVotoParametros('$this->id_voto','$this->provincia','$this->candidato','$this->sexo')");
			return $consulta->execute();
	 }
	 public function InsertarElVotoParametros()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("CALL InsertarElVotoParametros('$this->dni','$this->provincia','$this->candidato','$this->sexo')");
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }
	 public static function TraerTodoLosVotos()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerTodoLosVotos()");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Voto");		
	}

	public function BorrarVoto()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL BorrarVoto('$this->id_voto')");			
			$consulta->execute();
			return $consulta->rowCount();
	 }

	 public static function TraerUnVoto($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerUnVoto($id)");
			$consulta->execute();
			$votoBuscado= $consulta->fetchObject('Voto');
			return $votoBuscado;				

			
	}
}
?>