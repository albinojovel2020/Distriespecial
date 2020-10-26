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



	public function ConsultaPDF($nfac)
	{
		try 
		{
			//SELECT * FROM venta AS v INNER JOIN detalleventa AS dv ON v.idventa= dv.idventa INNER JOIN producto AS p ON dv.idproducto = p.idproducto WHERE v.numeroventa = 2020
			//SELECT v.idventa AS id, v.numeroventa AS numVenta, v.fechaventa AS fecha, v.total AS total, v.idusuario AS idusuario, v.tipo_comprobante AS comprobante, dv.iddetalleventa as iddv, dv.idventa AS idv, dv.idproducto as idpro, dv.cantidadventa AS cantidad, dv.precioventa AS precioventa, p.nombre as nombrepro FROM venta AS v INNER JOIN detalleventa AS dv ON v.idventa= dv.idventa INNER JOIN producto AS p ON dv.idproducto = p.idproducto WHERE v.numeroventa = 2020
			$stm = $this->pdo->prepare("SELECT dv.iddetalleventa AS iddv, dv.idventa AS idv, dv.idproducto AS idp, dv.cantidadventa AS cantidad, dv.precioventa AS preciov, p.nombre AS pron, compro.nombre AS nombrecompro, v.fechaventa AS fecha, v.total AS total FROM detalleventa AS dv INNER JOIN venta AS v ON dv.idventa = v.idventa INNER JOIN producto AS p ON dv.idproducto = p.idproducto INNER JOIN cat_comprobante AS compro ON v.tipo_comprobante = compro.id WHERE v.numeroventa = ?;");


			$stm->execute(array($nfac));
			
			return $stm->fetch(PDO::FETCH_OBJ);

		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}

	public function VerPDF($data1)
	{
		try 
		{
			if ($data1 != null) {                          
				$id=$data1->idv;
				$fe=$data1->fecha;
				$total=$data1->total;
                     if ($data1->nombrecompro == 'Ticket') {
                    # Mostrar Ticket   				."&id=".base64_encode($id)
					header("Location: ?c=".base64_encode('Movimientos')."&a=".base64_encode('Ticket')."&id=".base64_encode($id)."&fe=".base64_encode($fe)."&total=".base64_encode($total));

                    } elseif ($data1->nombrecompro == 'Factura consumidor final') {
						header("Location: ?c=".base64_encode('Movimientos')."&a=".base64_encode('Factura')."&id=".base64_encode($id));
                     } else{
                     	# code...
                     
                         //header("Location: ?c=".base64_encode('Login')."&a=".base64_encode('Error_inactivo'));    
                     }

                 /*} else {
                 // enviar al login
                     header("Location: ?c=".base64_encode('Login')."&a=".base64_encode('Error'));*/
                 }
		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}


	public function ListarVenta11($id)
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT dv.iddetalleventa AS iddv, dv.idventa AS idv, dv.idproducto AS idp, dv.cantidadventa AS cantidad, dv.precioventa AS preciov, p.nombre AS pron, compro.nombre AS nombrecompro, v.fechaventa AS fecha FROM detalleventa AS dv INNER JOIN venta AS v ON dv.idventa = v.idventa INNER JOIN producto AS p ON dv.idproducto = p.idproducto INNER JOIN cat_comprobante AS compro ON v.tipo_comprobante = compro.id WHERE dv.idventa=$id");
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