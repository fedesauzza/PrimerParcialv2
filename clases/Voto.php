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
			$consulta =$objetoAccesoDato->RetornarConsulta("UPDATE voto
				set dni=:dni,
				provincia=:provincia,
				candidato=:candidato,
				sexo=:sexo
				WHERE id_voto=:id_voto");
			$consulta->bindValue(':id_voto',$this->id_voto, PDO::PARAM_INT);
			$consulta->bindValue(':dni',$this->dni, PDO::PARAM_INT);
			$consulta->bindValue(':provincia',$this->provincia, PDO::PARAM_STR);
			$consulta->bindValue(':candidato', $this->candidato, PDO::PARAM_STR);
			$consulta->bindValue(':sexo', $this->sexo, PDO::PARAM_STR);

			return $consulta->execute();
	 }
	 public function InsertarElVotoParametros()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into voto (dni,provincia,candidato,sexo)values(:dni,:provincia,:candidato,:sexo)");
				$consulta->bindValue(':dni', $this->dni, PDO::PARAM_INT);
				$consulta->bindValue(':provincia',$this->provincia, PDO::PARAM_STR);
				$consulta->bindValue(':candidato', $this->candidato, PDO::PARAM_STR);
				$consulta->bindValue(':sexo', $this->sexo, PDO::PARAM_STR);
				
		
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }
}
?>