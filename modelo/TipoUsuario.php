<?php
/**
 * 
 */
class TipoUsuario //inicio clase
{
	private $pdo; //para la bd
	//atributos
	public $idtipousuario;
	public $nombre;
	public $descripcion;
	
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
	public function ListarTiposUsuarios()
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM tipo_Uusuario");

			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		} 
		catch (Throwable $t) 
		{
			die($t->getMessage());
			
		}
	}

	//buscar un registro por id
	public function ObtenerTipoUsuario($id)
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM tipo_Uusuario WHERE id_tipo_usuario = ?");

			$stm->execute(array($id));

			return $stm->fetch(PDO::FETCH_OBJ);
			
		} 
		catch (Throwable $t) 
		{
			die($t->getMessage());
		}

	}
}//fin de la clase

?>