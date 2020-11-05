<?php 

class Producto //inicio clase
{
	private $pdo; //para la bd
    //atributos
	public $idproducto;
	public $nombre;
	public $descripcion;
	public $precio; //PRECIO DE COMPRA DEL PRODUCTO
	public $stock;
	public $stockanterior;
	public $img;
	public $idcategoria;
	public $idproveedor;
	public $estado;
	public $idusuario;
	public $idumedida;
	public $fecha;
	public $idingreso;
	public $cantidadingreso;
	public $precio1;
	public $precio2;
	public $precio3;
	public $motivo;



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
			$sql = "INSERT INTO producto(nombre, descripcion, preciocompra, stock, imagen, idcategoria, idproveedor, idusuario, umedida, precio1, precio2, precio3) 
			VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

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
					$data->idumedida,
					$data->precio1,										
					$data->precio2,
					$data->precio3					
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

			$stm = $this->pdo->prepare("SELECT pro.idproducto AS idproducto, pro.nombre AS nombre, pro.descripcion AS descripcion, pro.preciocompra AS precio, pro.precio1,pro.precio2,pro.precio3, pro.stock AS stock, pro.imagen AS img, pro.idcategoria AS idcategoria, pro.idproveedor AS idproveedor, pro.idusuario AS idusuario, c.nombre AS nombrecate, CONCAT(p.nombre,' ', p.apellido) AS nombreprove, u.usuario AS nombreusuario, pro.estado AS estado FROM producto AS pro INNER JOIN categoria AS c ON pro.idcategoria = c.idcategoria INNER JOIN proveedor AS p ON pro.idproveedor = p.idproveedor INNER JOIN usuario AS u ON pro.idusuario = u.idusuario WHERE pro.estado = 1");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}

	public function ListarProductosActivoConexistencia()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT ci.monto as montoiva, pro.idproducto AS idproducto, cm.nombre as cmnombre, pro.nombre AS nombre, pro.descripcion AS descripcion, pro.preciocompra AS precio, pro.precio1,pro.precio2,pro.precio3, pro.stock AS stock, pro.imagen AS img, pro.idcategoria AS idcategoria, pro.idproveedor AS idproveedor, pro.idusuario AS idusuario, c.nombre AS nombrecate, CONCAT(p.nombre,' ', p.apellido) AS nombreprove, u.usuario AS nombreusuario, pro.estado AS estado FROM cat_impuesto ci, producto AS pro INNER JOIN categoria AS c ON pro.idcategoria = c.idcategoria INNER JOIN cat_medidas AS cm ON pro.umedida = cm.id INNER JOIN proveedor AS p ON pro.idproveedor = p.idproveedor INNER JOIN usuario AS u ON pro.idusuario = u.idusuario WHERE pro.estado = 1 and pro.stock > 0 and ci.nombre = 'iva'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}

	public function ListarProductosActivoSinexistencia()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT pro.idproducto AS idproducto, pro.nombre AS nombre, pro.descripcion AS descripcion, pro.preciocompra AS precio, pro.precio1,pro.precio2,pro.precio3, pro.stock AS stock, pro.imagen AS img, pro.idcategoria AS idcategoria, pro.idproveedor AS idproveedor, pro.idusuario AS idusuario, c.nombre AS nombrecate, CONCAT(p.nombre,' ', p.apellido) AS nombreprove, u.usuario AS nombreusuario, pro.estado AS estado FROM producto AS pro INNER JOIN categoria AS c ON pro.idcategoria = c.idcategoria INNER JOIN proveedor AS p ON pro.idproveedor = p.idproveedor INNER JOIN usuario AS u ON pro.idusuario = u.idusuario WHERE pro.estado = 1 and pro.stock = 0");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}

	public function ContarProductos()
	{
		try
		{

			$stm = $this->pdo->query("SELECT * FROM producto WHERE estado = 1");

			$total = $stm->rowCount();

			return $total;
		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}


	public function ListarIngresoProductos()
	{
		try
		{

			$stm = $this->pdo->prepare("
				select
				ip.id,
				p.idproducto,
				p.nombre nprod,
				p.descripcion,
				p.stock,
				ip.stockanterior,
				ip.motivo,
				ip.cantidad,
				ip.stockdespues,
				ip.usuario,
				u.nombre,
				ip.fcrea
				from ingreso_producto ip 
				inner join producto p on p.idproducto = ip.idproducto
				inner join usuario u on u.idusuario = ip.usuario;
				");
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

			$stm = $this->pdo->prepare("SELECT pro.idproducto AS idproducto, pro.nombre AS nombre, pro.descripcion AS descripcion, pro.preciocompra AS precio, pro.precio1,pro.precio2,pro.precio3, pro.stock AS stock, pro.imagen AS img, pro.idcategoria AS idcategoria, pro.idproveedor AS idproveedor, pro.idusuario AS idusuario, c.nombre AS nombrecate, CONCAT(p.nombre,' ', p.apellido) AS nombreprove, u.usuario AS nombreusuario, pro.estado AS estado FROM producto AS pro INNER JOIN categoria AS c ON pro.idcategoria = c.idcategoria INNER JOIN proveedor AS p ON pro.idproveedor = p.idproveedor INNER JOIN usuario AS u ON pro.idusuario = u.idusuario WHERE pro.estado = 0");
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
			->prepare("SELECT pro.idproducto AS idproducto, pro.nombre AS nombre, pro.descripcion AS descripcion, pro.preciocompra AS precio, pro.precio1,pro.precio2,pro.precio3, pro.stock AS stock, pro.imagen AS img, pro.idcategoria AS idcategoria, pro.idproveedor AS idproveedor, pro.idusuario AS idusuario, c.nombre AS nombrecate, CONCAT(p.nombre,' ', p.apellido) AS nombreprove, u.usuario AS nombreusuario, pro.estado AS estado, cm.nombre as nombreumedida, pro.umedida FROM producto AS pro INNER JOIN categoria AS c ON pro.idcategoria = c.idcategoria INNER JOIN proveedor AS p ON pro.idproveedor = p.idproveedor 
				INNER JOIN usuario AS u ON pro.idusuario = u.idusuario
				INNER JOIN cat_medidas AS cm ON pro.umedida = cm.id
				WHERE pro.idproducto = ?");			          

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
			preciocompra	  = ?,
			stock			  = ?,
			imagen			  = ?,
			idcategoria		  = ?, 
			idproveedor		  = ?, 
			idusuario     	  = ?,
			umedida           = ?,
			precio1           = ?,
			precio2           = ?,
			precio3           = ?

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
					$data->idumedida,
					$data->precio1,										
					$data->precio2,
					$data->precio3,
					$data->idproducto
				)
			);

		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}

	public function ActualizarStockProducto($data)
	{
		try 
		{
			$sql = "INSERT INTO ingreso_producto VALUES (null,?,?,?,?,?,?)";

			$this->pdo->prepare($sql)
			->execute(
				array(
					$data->idproducto,
					$data->stockanterior,
					$data->stock,
					$data->stockdespues,
					$data->idusuario,
					$data->fecha
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

	public function ActualizarStockProductoPorAnulacionVenta($data)
	{
		try 
		{
			$sql = "UPDATE producto set stock = ? WHERE idproducto = ?";

			$this->pdo->prepare($sql)
			->execute(
				array(
					$data->stock,
					$data->idproducto
				)
			);

		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}
}
?>