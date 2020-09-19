<?php
/**
 * 
 */
class Usuario //inicio de la clase
{
	private $pdo; //para la bd
	//atributos
	public $id_usuario;
	public $nombre;
	public $apellido;
	public $telefono;
	public $usuario;
	public $clave;
	public $id_pregunta_secreta;
	public $respuesta_secreta;
	public $id_tipo_usuario;
	public $estado;
	
	function __CONSTRUCT()
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

	//Registrar Usuarios
	public function RegistrarUsuario($data)
	{
		try 
		{
			$sql = "INSERT INTO usuario(nombre, apellido, telefono, usuario, clave, id_pregunta_secreta, respuesta_secreta, id_tipo_usuario, id_estado) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$this->pdo->prepare($sql)
							->execute(
								array(
									$data->nombre,
									$data->apellido,
									$data->telefono,
									$data->usuario,
									$data->clave,
									$data->id_pregunta_secreta,
									$data->pregunta_secreta,
									$data->id_tipo_usuario
								)
							);
		} 
		catch (Throwable $t) 
		{
			die($t->getMessage());
		}
	}

	//Listar Usuarios Activos
	public function ListarUsuariosActivos()
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT u.id_usuario AS id_usuario, u.nombre AS nombre, u.apellido AS apellido, u.telefono AS telefono, u.usuario AS usuario, tp.nombre AS tipo FROM Usuario AS u INNER JOIN tipo_Usuario AS tp ON u.id_tipo_usuario = tp.id_usuario WHERE u.id_estado = 1");

			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		} 
		catch (Throwable $t) 
		{
			die($t->getMessage());
		}
	}

	//Listar Usuarios Inactivos
	public function ListarUsuariosInactivos()
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT u.id_usuario AS id_usuario, u.nombre AS nombre, u.apellido AS apellido, u.telefono AS telefono, u.usuario AS usuario, tp.nombre AS tipo FROM Usuario AS u INNER JOIN tipo_Usuario AS tp ON u.id_tipo_usuario = tp.id_usuario WHERE u.id_estado = 0");

			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		} 
		catch (Throwable $t) 
		{
			die($t->getMessage());
		}
	}

	//Obtener Usuario por id
	public function ObtenerUsuarios($id)
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT u.id_usuario AS id_usuario, u.nombre AS nombre, u.apellido AS apellido, u.telefono AS telefono, u.usuario AS usuario, tp.nombre AS tipo, u.clave AS clave, u.id_pregunta_secreta AS id_pregunta_secreta, u.respuesta_secreta AS respuesta_secreta, ps.nombre AS pregunta FROM Usuario AS u INNER JOIN tipo_Usuario AS tp ON u.id_tipo_usuario = tp.id_tipo_usuario INNER JOIN pregunta_Secreta AS ps ON u.id_pregunta_secreta = ps.id_pregunta_secreta WHERE u.id_usuario = ?");

			$stm->execute(array($id));

			return $stm->fetch(PDO::FETCH_OBJ);
		} 
		catch (Throwable $t) 
		{
			die($t->getMessage());
		}
	}

	//Actualizar Usuario
	public function ActualizarUsuario($data)
	{
		try 
		{
			$sql = "UPDATE Usuario SET 
						nombre			  = ?,
						apellido		  = ?,
						telefono		  = ?,
						usuario			  = ?,
						id_tipo_usuario   = ?
					WHERE id_usuario = ?";

			$this->pdo->prepare($sql)
						->execute(
							array(
								$data->nombre,
								$data->apellido,
								$data->telefono,
								$data->usuario,
								$data->id_tipo_usuario,
								$data->id_usuario
							)
						);

		} 
		catch (Throwable $t) 
		{
			die($t->getMessage());
		}
	}


	//Cambiar Estado a un Usuario
	public function CambiarEstadoActivo($nuevo_estado, $id)
	{
		try 
		{
			$sql = "UPDATE Usuario SET 
						estado		 = ?
					WHERE id_usuario =?";

			$this->pdo->prepare($sql)
							->execute(
								array(
									$nuevo_estado,
									$id_usuario
								)
							);
		} 
		catch (Throwable $t) 
		{
			die($t->getMessage());
		}
	}

	//Actualizar Clave de Usuario
	public function ActualizarClave($clave, $id)
	{
		try 
		{
			$sql = "UPDATE Usuario SET 
						clave		 = ?
					WHERE id_usuario = ?";
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

	//Actualizar pregunta Secreta asociado a Usuario
	public function ActualizarPregunta($id_pregunta_secreta, $respuesta_secreta, $id)
	{
		try 
		{
			$sql = "UPDATE Usuario SET 
						id_pregunta_secreta		= ?,
						respuesta_secreta		= ?,
					WHERE id_usuario = ?";

			$this->pdo->prepare($sql)
						->execute(
							array(
								$id_pregunta_secreta,
								$pregunta_secreta,
								$id
							)
						);
		} 
		catch (Throwable $t) 
		{
			die($t->getMessage());
		}
	}

	//Login
	public function Entrar($usuario, $clave)
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM Usuario WHERE usuario = ? AND clave = ? AND id_estado = 1");

			$stm->execute(array($usuario, $clave));

			return $stm->fetch(PDO::FETCH_OBJ);
		} 
		catch (Throwable $t) 
		{
			die($t->getMessage());
		}
	}


	//Generar Sesion de Usuario
	public function GenerarSesion($data)
	{
		try 
		{
			//condicionar el inicio de sesión
			if ($data != null) {
				//Tomar los valores es variables de sesión
				$_SESSION["id"] = $data->id_usuario;
				$_SESSION["nombre"] = $data->nombre;
				$_SESSION["apellido"] = $data->apellido;
				$_SESSION["usuario"] = $data->usuario;

				if ($data->id_tipo_usuario == 1) {
					// entrar como Administrador
					//echo '<script>alert("Datos Incorrectos");</script>';
					header("Location: ?c=".base64_encode('Tablero'));
				}else{
					// entrar como Normal
				}
			} else{
				// Enviar al login
				
				header("Location: ?c=".base64_encode('Login')."&a=".base64_encode('Error'));

			}
		} 
		catch (Throwable $t) 
		{
			die($t->getMessage());
		}
	}

}//Fin de la clase
?>