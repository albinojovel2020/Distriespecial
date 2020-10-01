<?php
class Usuario //inicio clase
{
	private $pdo; //para la bd
    //atributos
	public $idusuario;
	public $nombre;
	public $apellido;
	public $telefono;
	public $usuario;
	public $clave;
	public $idpreguntasecreta;
	public $respuestasecreta;
	public $idtipousuario;
	public $estado;

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

	public function RegistrarUsuario($data)
	{
		try 
		{
			$sql = "INSERT INTO usuario(nombre, apellido, telefono, usuario, clave, fecha, idpreguntasecreta, respuestasecreta, idtipousuario) 
			VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
			->execute(
				array(      
					$data->nombre, 
					$data->apellido,
					$data->telefono,
					$data->usuario,
					$data->clave,
					$data->fecha,
					$data->idpreguntasecreta,
					$data->respuestasecreta,
					$data->idtipousuario
				)
			);

		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}

	public function ListarUsuariosActivos()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT u.idusuario AS idusuario, u.nombre AS nombre, u.apellido AS apellido, u.telefono AS telefono, u.usuario AS usuario, u.fecha AS fecha, tp.nombre AS tipo  FROM usuario AS u INNER JOIN tiposusuario AS tp ON u.idtipousuario = tp.idtipousuario WHERE u.estado = 1");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}

	public function ListarUsuariosInactivos()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT u.idusuario AS idusuario, u.nombre AS nombre, u.apellido AS apellido, u.telefono AS telefono, u.usuario AS usuario, u.fecha AS fecha, tp.nombre AS tipo FROM usuario AS u INNER JOIN tiposusuario AS tp ON u.idtipousuario = tp.idtipousuario WHERE u.estado = 0");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}
	/*public function ListarUsuario()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT u.idusuario AS idusuario, u.nombre AS nombre, u.apellido AS apellido, u.telefono AS telefono, u.usuario AS usuario, u.fecha AS fecha, tp.nombre AS tipo  FROM usuario AS u INNER JOIN tiposusuario AS tp ON u.idtipousuario = tp.idtipousuario WHERE u.estado = 1 AND u.idusuario = $_SESSION["id"]");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}*/

	public function ObtenerUsuario($id)
	{
		try 
		{
			$stm = $this->pdo
			->prepare("SELECT u.idusuario AS idusuario, u.nombre AS nombre, u.apellido AS apellido, u.telefono AS telefono, u.usuario AS usuario, u.idtipousuario AS idtipousuario, tp.nombre AS tipo, u.clave AS clave, u.idpreguntasecreta AS idpreguntasecreta, u.respuestasecreta AS respuestasecreta, ps.nombre AS pregunta FROM usuario AS u INNER JOIN tiposusuario AS tp ON u.idtipousuario = tp.idtipousuario INNER JOIN preguntasecreta AS ps ON u.idpreguntasecreta = ps.idpreguntasecreta WHERE u.idusuario = ?");			          

			$stm->execute(array($id));

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}

	public function ActualizarUsuario($data)
	{
		try 
		{
			$sql = "UPDATE usuario SET 
			nombre            = ?, 
			apellido          = ?,
			telefono          = ?,
			usuario           = ?,
			fecha			  = ?,		
			idtipousuario     = ?
			WHERE idusuario = ?";

			$this->pdo->prepare($sql)
			->execute(
				array(
					$data->nombre, 
					$data->apellido,
					$data->telefono,
					$data->usuario,
					'Modificación: '.$data->fecha,
					$data->idtipousuario,
					$data->idusuario
				)
			);

		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}	

	public function CambiarEstadoUsuario($nuevo_estado, $id)
	{
		try 
		{
			$sql = "UPDATE usuario SET 
			estado      = ?
			WHERE idusuario = ?";

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

	public function ActualizarClave($clave, $id)
	{
		try 
		{
			$sql = "UPDATE usuario SET  
			clave 	    = ?
			WHERE idusuario = ?";

			$this->pdo->prepare($sql)
			->execute(
				array(
					$clave,
					$id
				)
			);
			
		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}

	public function ActualizarPregunta($idpreguntasecreta, $respuestasecreta, $id)
	{
		try 
		{
			$sql = "UPDATE usuario SET  
			idpreguntasecreta   = ?,
			respuestasecreta    = ?
			WHERE idusuario = ?";

			$this->pdo->prepare($sql)
			->execute(
				array(
					$idpreguntasecreta,
					$respuestasecreta,
					$id
				)
			);
			
		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}

	public function Entrar($email, $clave)
	{
		try 
		{
			$stm = $this->pdo
			->prepare("SELECT * FROM usuario WHERE usuario = ? AND clave = ?");


			$stm->execute(array($email, $clave));
			
			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}

	public function GenerarSesion($data)
	{
		try 
		{
			//condicionar el inicio de sesión
			if ($data != null) {           
                 #tomar los valores es variables de sesión
                     session_start();
                     $_SESSION["id"] = $data->idusuario;
                     $_SESSION["nombre"] = $data->nombre;
                     $_SESSION["apellido"] = $data->apellido;
                     $_SESSION["usuario"] = $data->usuario;
 
                     if ($data->idtipousuario == 1 & $data->estado == 1) {
                    # entrar como encargado de inventario                       
                         header("Location: ?c=".base64_encode('Tablero')."&idusuario=".base64_encode($_SESSION["id"]));

                    } elseif ($data->idtipousuario == 2 & $data->estado == 1) {
                         # code...
                         # # entrar como otro tipo de usuario        

                     } else{
                         header("Location: ?c=".base64_encode('Login')."&a=".base64_encode('Error_inactivo'));    
                     }

                 } else {
                 // enviar al login
                     header("Location: ?c=".base64_encode('Login')."&a=".base64_encode('Error'));
                 }
		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}
	}

	public function ConsulUser($user, $preguntasecreta, $respuestasecreta){
		try {

			$stm = $this->pdo
			->prepare("SELECT * FROM usuario WHERE usuario = ? AND idpreguntasecreta = ? AND respuestasecreta = ?");
			$stm->execute(array($user, $preguntasecreta, $respuestasecreta));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $t) {
		}
	}

    //cambio 
	public function Cambio($data){
		try {

			if($data != null){
				session_start();
				$_SESSION["iduser"] = $data->idusuario;
				$_SESSION["pregunta"] = $data->preguntasecreta;
				$_SESSION["respuesta"] = $data->respuestasecreta;
				header("Location: ?c=".base64_encode('Usuario')."&a=".base64_encode('NuevaPassword'));
			}else{
				header("Location: ?c=".base64_encode('Usuario')."&a=".base64_encode('RespuestasecretaNoCoiciden'));
			}

		} catch (Exception $t) {

		}
	}
	public function CambioPass($nuevapass, $fecha, $idusuario){
		try 
		{
			$sql = "UPDATE usuario SET 
			clave      = ?,
			fecha      = ?
			WHERE idusuario = ?";
			$this->pdo->prepare($sql)
			->execute(
				array(
					$nuevapass,
					'Ultima modificación: '.$fecha,
					$idusuario
				)
			);

		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}

	}


	public function ConsulActual($user, $actual){
		try {

			$stm = $this->pdo
			->prepare("SELECT idusuario, clave FROM usuario WHERE idusuario = ? AND clave = ?");
			$stm->execute(array($user, $actual));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $t) {
		}
	}

    //cambio 
	public function Cambioo($data){
		try {

			if($data != null){
				//session_start();
				$_SESSION["iduser"] = $data->idusuario;
				$_SESSION["actualclave"] = $data->actual;
				//$_SESSION["respuesta"] = $data->respuestasecreta;
				header("Location: ?c=".base64_encode('Usuario')."&a=".base64_encode('NuevaPasswords'));
			}else{
				header("Location: ?c=".base64_encode('Usuario')."&a=".base64_encode('RespuestasecretaNoCoicidenn'));
			}

		} catch (Exception $t) {

		}
	}

	public function CambioPasss( $nuevapass, $fecha, $idusuario ){
		try 
		{
		
			$sql = "UPDATE usuario SET 
			clave      = ?,
			fecha      = ?
			WHERE idusuario = ?";
			$this->pdo->prepare($sql)
			->execute(
				array(
					$nuevapass,
					'Ultima modificación: '.$fecha,
					$idusuario
				)
			);
			
			

		}
		catch (Throwable $t)
		{
			die($t->getMessage());
		}

	}
	

} //fin clase

?>