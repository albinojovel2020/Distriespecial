<?php
/**
 * 
 */
class PreguntaSecreta //inicio de clase
{
	
	private $pdo; //para la BD
	//atributos
	public $idpreguntasecreta;
	public $nombre;

	//constructor
	public function __CONSTRUCT()
	{
		try 
		{
			$this->pdo = Conexion::Conectar();
		} 
		catch (Throwable $t) 
		{
			die($t->getMessage());
		}
	}

	//generar lista de datos
	public function ListarPreguntasSecretas()
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM pregunta_Secreta");

			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		} 
		catch (Throwable $t) 
		{
			die($t->getMessage());
		}
	}

	//buscar registro por id
	public function ObtenerPreguntaSecreta($id)
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM pregunta_Secreta WHERE id_pregunta_secreta = ?");

			$stm->execute(array($id));

			return $stm->fetch(PDO::FETCH_OBJ);
		} 
		catch (Throwable $t) 
		{
			die($t->getMessage());
		}
	}
}// fin de la clase
?>