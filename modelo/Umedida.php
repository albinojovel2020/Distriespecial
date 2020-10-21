<?php 

class Umedida //inicio clase
{
	private $pdo; //para la bd
    //atributos
	public $id;
	public $nombre;
	public $descripcion;
	public $codigo;

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


public function ListarUmedida()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * FROM cat_medidas");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}

public function RegistrarUmedida($data)
	{
		try 
		{
			$sql = "INSERT INTO cat_medidas (nombre, descripcion, codigo) 
			VALUES(?, ?, ?)";

			$this->pdo->prepare($sql)
			->execute(
				array(      
					$data->nombre, 
					$data->descripcion,
					$data->codigo
				)
			);

		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}



    public function ActualizarUmedida($data)
	{
		try 
		{
			$sql = "UPDATE cat_medidas SET 
			nombre            = ?, 
			descripcion       = ?,
			codigo     = ?
			WHERE id = ?";

			$this->pdo->prepare($sql)
			->execute(
				array(
					$data->nombre, 
					$data->descripcion,
					$data->codigo,
					$data->id
				)
			);

		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}



		public function ObtenerUmedida($id)
	{
		try 
		{
			$stm = $this->pdo
			->prepare("SELECT * FROM cat_medidas WHERE id = ?");			          

			$stm->execute(array($id));

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}

	
}
 ?>