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





}
	

?>