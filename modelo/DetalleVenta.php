<?php
class DetalleVenta
{
	private $pdo;
    
    public $iddetalleventa;
    public $idventa;
    public $idproducto;
    public $cantidadventa;
    public $precioventa;

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
			          ->prepare("INSERT INTO `detalleventa`(`idventa`, `idproducto`, `cantidadventa`, `precioventa`) VALUES (?,?,?,?)");
			          

			$stm->execute(array(
				                    $data->idventa,
                                    $data->idproducto,
                                    $data->cantidadventa,
                                    $data->precioventa
                				));

			return $stm->fetch(PDO::FETCH_OBJ);
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



}

?>