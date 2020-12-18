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
    public $anulada;
    public $tiva;
    public $cliente;
    public $giro;
    public $nit;
    public $nrc;
    

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
			          ->prepare("CALL ps_guardar_venta(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
			        

			$stm->execute(array(
                                    $data->numeroventa,
                                    $data->fechaventa,
                                    $data->total,
                                    $data->idusuario,
                                    $data->tipo_comprobante,
                                    $data->tiva,
                                    $data->cliente,
                                    $data->giro,
                                    $data->nrc,
                                    $data->nit,
									
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
                     v.tiva,
                     u.nombre nusu,
                     u.apellido apellido,
                     cc.nombre as tipocomprobante,
                     v.anulada
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

			$stm = $this->pdo->prepare("SELECT dv.iddetalleventa AS iddv, dv.idventa AS idv, dv.idproducto AS idp, dv.cantidadventa AS cantidad, dv.precioventa AS preciov, p.nombre AS pron, compro.nombre AS nombrecompro, v.fechaventa AS fecha, v.total AS total, v.tiva AS iva, v.idusuario AS idusu, CONCAT(u.nombre,' ',u.apellido) AS nombreusu, dv.montoiva AS motoindi, p.umedida AS medida, catmedida.nombre AS nombremedi, v.cliente AS cliente, v.anulada AS anulada FROM detalleventa AS dv INNER JOIN venta AS v ON dv.idventa = v.idventa INNER JOIN producto AS p ON dv.idproducto = p.idproducto INNER JOIN cat_comprobante AS compro ON v.tipo_comprobante = compro.id INNER JOIN usuario AS u ON v.idusuario = u.idusuario INNER JOIN cat_medidas AS catmedida ON p.umedida = catmedida.id WHERE v.numeroventa = ?;");


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
				$iva=$data1->iva;
				$nombrevende=$data1->nombreusu;
				$cliente=$data1->cliente;
				$anulada=$data1->anulada;
                     if ($data1->nombrecompro == 'Ticket') {
                    # Mostrar Ticket   				."&id=".base64_encode($id)
						header("Location: ?c=".base64_encode('Movimientos')."&a=".base64_encode('Ticket')."&id=".base64_encode($id)."&fe=".base64_encode($fe)."&iva=".base64_encode($iva)."&cliente=".base64_encode($cliente)."&nombrevende=".base64_encode($nombrevende)."&anulada=".base64_encode($anulada)."&total=".base64_encode($total));

                    } elseif ($data1->nombrecompro == 'Factura consumidor final') {
						header("Location: ?c=".base64_encode('Movimientos')."&a=".base64_encode('Factura')."&id=".base64_encode($id)."&fe=".base64_encode($fe)."&iva=".base64_encode($iva)."&cliente=".base64_encode($cliente)."&nombrevende=".base64_encode($nombrevende)."&anulada=".base64_encode($anulada)."&total=".base64_encode($total));
                     } elseif ($data1->nombrecompro == 'Comprobante de credito fiscal') {
						header("Location: ?c=".base64_encode('Movimientos')."&a=".base64_encode('CFiscal')."&id=".base64_encode($id)."&fe=".base64_encode($fe)."&iva=".base64_encode($iva)."&cliente=".base64_encode($cliente)."&nombrevende=".base64_encode($nombrevende)."&anulada=".base64_encode($anulada)."&total=".base64_encode($total));
                     } elseif ($data1->nombrecompro == 'Nota de envio'){
						header("Location: ?c=".base64_encode('Movimientos')."&a=".base64_encode('NEnvio')."&id=".base64_encode($id)."&fe=".base64_encode($fe)."&iva=".base64_encode($iva)."&cliente=".base64_encode($cliente)."&nombrevende=".base64_encode($nombrevende)."&anulada=".base64_encode($anulada)."&total=".base64_encode($total));
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

			$stm = $this->pdo->prepare("SELECT dv.iddetalleventa AS iddv, dv.idventa AS idv, dv.idproducto AS idp, dv.cantidadventa AS cantidad, dv.precioventa AS preciov, p.nombre AS pron, compro.nombre AS nombrecompro, v.fechaventa AS fecha, v.total AS total, v.tiva AS iva, v.idusuario AS idusu, CONCAT(u.nombre,' ',u.apellido) AS nombreusu, dv.montoiva AS motoindi, p.umedida AS medida, catmedida.nombre AS nombremedi FROM detalleventa AS dv INNER JOIN venta AS v ON dv.idventa = v.idventa INNER JOIN producto AS p ON dv.idproducto = p.idproducto INNER JOIN cat_comprobante AS compro ON v.tipo_comprobante = compro.id INNER JOIN usuario AS u ON v.idusuario = u.idusuario INNER JOIN cat_medidas AS catmedida ON p.umedida = catmedida.id WHERE dv.idventa=$id");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}

		public function AnulaVenta($idventa)
	{
		try 
		{
			$sql = "UPDATE venta set anulada = 1 WHERE idventa = ?";

			$this->pdo->prepare($sql)
			->execute(
				array(
                     $idventa
				)
			);

		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}

	public function TotalVenta()
	{
		try 
		{	
			$fecha=date('d-m-Y');
			$idusuario=$_SESSION["id"];
			$stm = $this->pdo->prepare("SELECT COUNT(*) AS contador, SUM(total) AS total FROM venta WHERE substring(fechaventa,1,10)='$fecha' AND idusuario=$idusuario");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}



	public function VentaDias(){
		try {
			$fecha=date('d-m-Y');
			$stm = $this->pdo->prepare("SELECT v.idusuario AS iduv, CONCAT(u.nombre,' ',u.apellido) AS Nombres, v.total AS total, u.idusuario AS idu, substring(v.fechaventa,1,10) AS fecha FROM venta AS v INNER JOIN usuario AS u ON v.idusuario = u.idusuario ORDER BY substring(v.fechaventa,1,10) DESC");
			
			#AND substring(v.fechaventa,1,10) = '06-11-2020'
			#select CONCAT(u.nombre,' ',u.apellido) AS Nombres, SUM(v.total) AS total from venta AS v INNER JOIN usuario AS u ON v.idusuario = u.idusuario WHERE substring(fechaventa,1,10) = '06-11-2020' GROUP BY v.idusuario
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Throwable $t) {
			die($t->getMessage());
		}
	}

	public function VentaDiass(){
		try {
			$fecha=date('d-m-Y');
			$stm = $this->pdo->prepare("SELECT CONCAT(u.nombre,' ',u.apellido) AS Nombres, SUM(v.total) AS total, v.idusuario AS iduv, u.idusuario AS idu, substring(fechaventa,1,10) AS fecha FROM venta AS v INNER JOIN usuario AS u ON v.idusuario = u.idusuario");
			
			#AND substring(v.fechaventa,1,10) = '06-11-2020'
			#select CONCAT(u.nombre,' ',u.apellido) AS Nombres, SUM(v.total) AS total from venta AS v INNER JOIN usuario AS u ON v.idusuario = u.idusuario WHERE substring(fechaventa,1,10) = '06-11-2020' GROUP BY v.idusuario
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (\Throwable $t) {
			die($t->getMessage());
		}
	}
	


}
	

?>