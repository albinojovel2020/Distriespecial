<?php 

class Comprobantes //inicio clase
{
	private $pdo; //para la bd
    //atributos
	public $id;
	public $nombre;
	public $descripcion;
	public $correlativo;

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


	public function RegistrarComprobantes($data)
	{
		try 
		{
			$sql = "INSERT INTO comprobante(nombre, descripcion, correlativo) 
			VALUES(?, ?, ?)";

			$this->pdo->prepare($sql)
			->execute(
				array(      
					$data->nombre, 
					$data->descripcion,
					$data->correlativo
				)
			);

		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}

	public function ListarComprobantes()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT co.id AS id, co.nombre AS nombrecompro, co.descripcion AS descripcion, co.correlativo AS correlativo FROM cat_comprobante AS co ORDER BY nombrecompro ASC");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}

	public function ListarCorrelativo()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT co.id AS id, co.nombre AS nombrecompro, co.descripcion AS descripcion, co.correlativo AS correlativo FROM cat_comprobante AS co WHERE co.id=:id ORDER BY co.nombre;");
			$stm->execute(array(':id' => $id));

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}
	
}
 ?>