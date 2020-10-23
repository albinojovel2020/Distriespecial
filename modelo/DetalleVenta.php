<?php
class DetalleVenta
{
	private $pdo;
    
    public $iddetalleventa;
    public $idventa;
    public $idproducto;
    public $cantidadventa;
    public $precioventa;
    public $preciocompra;
	public $stockanterior;
	public $stockdespues;
	public $usuario;
	public $precio;
	public $fcrea;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Conexion::Conectar();     
		}		
        catch (Throwable $t)//php7
        {
			die($t->getMessage());
        }
		catch(Exception $e)//php5
		{
			die($e->getMessage());
		}
	}	


	public function guardardetalleventa($data)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("CALL ps_guardar_detalleventa(?, ?, ?, ?)");
			          

			$stm->execute(array(
				                    $data->idventa,
                                    $data->idproducto,
                                    $data->cantidadventa,
                                    $data->precioventa
                				));

			return 0;
		}
        catch (Throwable $t)//php7
        {
			die($t->getMessage());
        }
		catch(Exception $e)//php5
		{
			die($e->getMessage());
		}
	}

	public function ActualizarStockProductoSalida($data)
	{
		try 
		{
			$sql = "INSERT INTO ventas_producto VALUES (null,?,?,?,?,?,?,?,?,?)";

			$this->pdo->prepare($sql)
			->execute(
				array(
					$data->idventa,
					$data->idproducto,
					$data->stockanterior,
					$data->cantidadventa,
					$data->stockdespues,
					$data->usuario,
					$data->preciocompra,					
					$data->precioventa,
					$data->fcrea
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