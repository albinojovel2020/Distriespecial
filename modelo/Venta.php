<?php
class Venta
{
	private $pdo;
    
    public $idventa;
    public $numeroventa;
    public $fechaventa;
    public $total;
    public $idusuario;
    public $tipo_comprobante;
    

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


	public function guardarventa($data)
	{
		
		try 
		{
			$stm = $this->pdo
			          ->prepare("CALL ps_guardar_venta(?, ?, ?, ?, ?)");
			        

			$stm->execute(array(
                                    $data->numeroventa,
                                    $data->fechaventa,
                                    $data->total,
                                    $data->idusuario,
                                    $data->tipo_comprobante
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


	public function ListarVentas()
	{
		try
		{

			$stm = $this->pdo->prepare("
				select
    				 v.idventa id,
    				 v.numeroventa nfac,
                     v.fechaventa fventa,
                     v.total total,
                     u.nombre nusu,
                     u.apellido apellido,
                     cc.nombre as tipocomprobante
				from venta v 
				 	inner join usuario u on u.idusuario = v.idusuario
                    inner join cat_comprobante cc on cc.id = v.tipo_comprobante;
				");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}





}
	

?>