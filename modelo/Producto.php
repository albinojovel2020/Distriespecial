<?php 

class Producto //inicio clase
{
	private $pdo; //para la bd
    //atributos
	public $idproducto;
	public $nombre;
	public $descripcion;
	public $precio;
	public $stock;
	public $img;
	public $idcategoria;
	public $idproveedor;
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


	public function RegistrarProducto($data)
	{
		try 
		{
			$sql = "INSERT INTO producto(nombre, descripcion, preciounitario, stock, imagen, idcategoria, idproveedor, idusuario) 
			VALUES(?, ?, ?, ?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
			->execute(
				array(      
					$data->nombre, 
					$data->descripcion,
					$data->precio,
					$data->stock,
					$data->img,
					$data->idcategoria,
					$data->idproveedor,
					$data->idusuario
				)
			);

		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}

	public function ListarProductosActivos()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT pro.idproducto AS idproducto, pro.nombre AS nombre, pro.descripcion AS descripcion, pro.preciounitario AS precio, pro.stock AS stock, pro.imagen AS img, pro.idcategoria AS idcategoria, pro.idproveedor AS idproveedor, pro.idusuario AS idusuario, c.nombre AS nombrecate, CONCAT(p.nombre,' ', p.apellido) AS nombreprove, u.usuario AS nombreusuario, pro.estado AS estado FROM producto AS pro INNER JOIN categoria AS c ON pro.idcategoria = c.idcategoria INNER JOIN proveedor AS p ON pro.idproveedor = p.idproveedor INNER JOIN usuario AS u ON pro.idusuario = u.idusuario WHERE pro.estado = 1");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}

	public function ListarProductosInactivos()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT pro.idproducto AS idproducto, pro.nombre AS nombre, pro.descripcion AS descripcion, pro.preciounitario AS precio, pro.stock AS stock, pro.imagen AS img, pro.idcategoria AS idcategoria, pro.idproveedor AS idproveedor, pro.idusuario AS idusuario, c.nombre AS nombrecate, CONCAT(p.nombre,' ', p.apellido) AS nombreprove, u.usuario AS nombreusuario, pro.estado AS estado FROM producto AS pro INNER JOIN categoria AS c ON pro.idcategoria = c.idcategoria INNER JOIN proveedor AS p ON pro.idproveedor = p.idproveedor INNER JOIN usuario AS u ON pro.idusuario = u.idusuario WHERE pro.estado = 0");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}

	public function ObtenerProducto($id)
	{
		try 
		{
			$stm = $this->pdo
			->prepare("SELECT pro.idproducto AS idproducto, pro.nombre AS nombre, pro.descripcion AS descripcion, pro.preciounitario AS precio, pro.stock AS stock, pro.imagen AS img, pro.idcategoria AS idcategoria, pro.idproveedor AS idproveedor, pro.idusuario AS idusuario, c.nombre AS nombrecate, CONCAT(p.nombre,' ', p.apellido) AS nombreprove, u.usuario AS nombreusuario, pro.estado AS estado FROM producto AS pro INNER JOIN categoria AS c ON pro.idcategoria = c.idcategoria INNER JOIN proveedor AS p ON pro.idproveedor = p.idproveedor INNER JOIN usuario AS u ON pro.idusuario = u.idusuario WHERE pro.idproducto = ?");			          

			$stm->execute(array($id));

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}

	public function ActualizarProducto($data)
	{
		try 
		{
			$sql = "UPDATE producto SET 
			nombre            = ?,
			descripcion		  = ?,
			preciounitario	  = ?,
			stock			  = ?,
			imagen			  = ?,
			idcategoria		  = ?, 
			idproveedor		  = ?, 
			idusuario     	  = ?
			WHERE idproducto = ?";

			$this->pdo->prepare($sql)
			->execute(
				array(
					$data->nombre, 
					$data->descripcion,
					$data->precio,
					$data->stock,
					$data->img,
					$data->idcategoria,
					$data->idproveedor,
					$data->idusuario,
					$data->idproducto
				)
			);

		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}

	public function CambiarEstadoProducto($nuevo_estado, $id)
	{
		try 
		{
			$sql = "UPDATE producto SET 
			estado      = ?
			WHERE idproducto = ?";

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

	public function EliminarProducto($id)
	{
		try{
			$stm = $this->pdo->prepare("DELETE FROM producto WHERE idproducto = ?");		 

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