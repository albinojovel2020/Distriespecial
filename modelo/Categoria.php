<?php 

class Categoria //inicio clase
{
	private $pdo; //para la bd
    //atributos
	public $idcategoria;
	public $nombre;
	public $descripcion;
	public $idusuario;

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


	public function RegistrarCategoria($data)
	{
		try 
		{
			$sql = "INSERT INTO categoria(nombre, descripcion, idusuario) 
			VALUES(?, ?, ?)";

			$this->pdo->prepare($sql)
			->execute(
				array(      
					$data->nombre, 
					$data->descripcion,
					$data->idusuario
				)
			);

		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}

	public function ListarCategoria()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT c.idcategoria AS idcategoria, c.nombre AS nombre, c.descripcion AS descripcion, c.idusuario AS idusuario, u.usuario AS nombreusuario  FROM categoria AS c INNER JOIN usuario AS u ON c.idusuario = u.idusuario");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}

	

	public function ObtenerCategoria($id)
	{
		try 
		{
			$stm = $this->pdo
			->prepare("SELECT c.idcategoria AS idcategoria, c.nombre AS nombre, c.descripcion AS descripcion, c.idusuario AS idusuario, u.usuario AS nombreusuario FROM categoria AS c INNER JOIN usuario AS u ON c.idusuario = u.idusuario WHERE c.idcategoria = ?");			          

			$stm->execute(array($id));

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}

	public function ActualizarCategoria($data)
	{
		try 
		{
			$sql = "UPDATE categoria SET 
			nombre            = ?, 
			descripcion       = ?,
			idusuario     = ?
			WHERE idcategoria = ?";

			$this->pdo->prepare($sql)
			->execute(
				array(
					$data->nombre, 
					$data->descripcion,
					$data->idusuario,
					$data->idcategoria
				)
			);

		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}

	public function EliminarCategoria($id)
	{
		try{
			$stm = $this->pdo->prepare("DELETE FROM categoria WHERE idcategoria = ?");		 

			$stm->execute(array($id));

			//return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch (Throwable $t) 
		{
			die($t->getMessage());
		}
	}
}
 ?>