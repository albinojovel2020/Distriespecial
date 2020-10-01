<?php 

class Proveedor //inicio clase
{
	private $pdo; //para la bd
    //atributos
	public $idproveedor;
	public $nombre;
	public $apellido;
	public $dui;
	public $telefono;
	public $direccionempresa;
	public $nombreempresa;
	public $estado;
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


	public function RegistrarProveedor($data)
	{
		try 
		{
			$sql = "INSERT INTO proveedor(nombre, apellido, dui, telefono, direccionempresa, nombreempresa, idusuario) 
			VALUES(?, ?, ?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
			->execute(
				array(      
					$data->nombre, 
					$data->apellido,
					$data->dui,
					$data->telefono,
					$data->direccionempresa,
					$data->nombreempresa,
					$data->idusuario
				)
			);

		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}

	public function ListarProveedorActivos()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT p.idproveedor AS idproveedor, p.nombre AS nombre, p.apellido AS apellido, p.dui AS dui, p.telefono AS telefono, p.direccionempresa AS direccion, p.nombreempresa AS nombreempre, CONCAT(p.nombre,' ', p.apellido) AS nombreprove, u.usuario AS nombreusuario, p.estado AS estado FROM proveedor AS p INNER JOIN usuario AS u ON p.idusuario = u.idusuario WHERE p.estado = 1");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}

	public function ListarProveedorInactivos()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT p.idproveedor AS idproveedor, p.nombre AS nombre, p.apellido AS apellido, p.dui AS dui, p.telefono AS telefono, p.direccionempresa AS direccion, p.nombreempresa AS nombreempre, u.usuario AS nombreusuario, p.estado AS estado FROM proveedor AS p INNER JOIN usuario AS u ON p.idusuario = u.idusuario WHERE p.estado = 0");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}

	public function ObtenerProveedor($id)
	{
		try 
		{
			$stm = $this->pdo
			->prepare("SELECT p.idproveedor AS idproveedor, p.nombre AS nombre, p.apellido AS apellido, p.dui AS dui, p.telefono AS telefono, p.direccionempresa AS direccion, p.nombreempresa AS nombreempre, p.idusuario AS idusuario, u.usuario AS nombreusuario FROM proveedor AS p INNER JOIN usuario AS u ON p.idusuario = u.idusuario WHERE p.idproveedor = ?");			          

			$stm->execute(array($id));

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}

	public function ActualizarProveedor($data)
	{
		try 
		{
			$sql = "UPDATE proveedor SET 
			nombre            = ?,
			apellido		  = ?,
			dui				  = ?,
			telefono		  = ?,
			direccionempresa  = ?,
			nombreempresa	  = ?, 
			idusuario     	  = ?
			WHERE idproveedor = ?";

			$this->pdo->prepare($sql)
			->execute(
				array(
					$data->nombre, 
					$data->apellido,
					$data->dui,
					$data->telefono,
					$data->direccionempresa,
					$data->nombreempresa,
					$data->idusuario,
					$data->idproveedor
				)
			);

		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}

	public function CambiarEstadoProveedor($nuevo_estado, $id)
	{
		try 
		{
			$sql = "UPDATE proveedor SET 
			estado      = ?
			WHERE idproveedor = ?";

			$this->pdo->prepare($sql)
			->execute(
				array(
					$nuevo_estado,
					$id
				)
			);

		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}

	public function EliminarProveedor($id)
	{
		try{
			$stm = $this->pdo->prepare("DELETE FROM proveedor WHERE idproveedor = ?");		 

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