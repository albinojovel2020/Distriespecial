<?php 

class Compra //inicio clase
{
	private $pdo; //para la bd
    //atributos
	public $idcompra;
	public $fechacompra;
	public $idproveedor;
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


	
	
}
 ?>