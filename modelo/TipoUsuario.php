<?php
class TipoUsuario //inicio clase
{
	private $pdo; //para la bd
    //atributos
    public $idtipousuario;
    public $nombre;
    public $descripcion;

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

	public function ListarTiposUsuarios()
	{
		try
		{

            $stm = $this->pdo->prepare("SELECT * FROM tiposusuario");
            
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
        catch (Throwable $t)
        {
			die($t->getMessage());
        }
	}



	public function ObtenerTipoUsuario($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM tiposusuario WHERE idtipousuario = ?");
			         
			$stm->execute(array($id));

			return $stm->fetch(PDO::FETCH_OBJ);
		}
        catch (Throwable $t)
        {
			die($t->getMessage());
        }
	}


} //fin clase

?>