<?php
require_once 'modelo/Conexion.php';

class RespaldarController
{
	public function Index(){
		//muestra todas las partes de la vista de Usuario Almacenado
		require_once 'vistas/pages/encabezadopagina1.php';
		require_once 'vistas/pages/respaldo/backup.php';
		require_once 'vistas/pages/piepagina1.php';
	}

	public function Restore(){
		//muestra todas las partes de la vista de Usuario Almacenado
		require_once 'vistas/pages/encabezadopagina1.php';
		require_once 'vistas/pages/respaldo/restore.php';
		require_once 'vistas/pages/piepagina.php';
	}

	public function Guardar(){
		session_start();

		$day=date("d");
		$mont=date("m");
		$year=date("Y");
		$hora=date("h-i-s");
		$fecha=$day.'_'.$mont.'_'.$year;
		$DataBASE=BD."_".$fecha."_(".$hora."_hrs).sql";
		$tables=array();
		$result=BACKUP1::sql('SHOW TABLES');
		if($result){
			while($row=mysqli_fetch_row($result)){
				$tables[] = $row[0];
			}
			$sql='SET FOREIGN_KEY_CHECKS=0;'."\n\n";
			$sql.='CREATE DATABASE IF NOT EXISTS '.BD.";\n\n";
			$sql.='USE '.BD.";\n\n";;
			foreach($tables as $table){
				$result=BACKUP1::sql('SELECT * FROM '.$table);
				if($result){
					$numFields=mysqli_num_fields($result);
					$sql.='DROP TABLE IF EXISTS '.$table.';';
					$row2=mysqli_fetch_row(BACKUP1::sql('SHOW CREATE TABLE '.$table));
					$sql.="\n\n".$row2[1].";\n\n";
					for ($i=0; $i < $numFields; $i++){
						while($row=mysqli_fetch_row($result)){
							$sql.='INSERT INTO '.$table.' VALUES(';
							for($j=0; $j<$numFields; $j++){
								$row[$j]=addslashes($row[$j]);
								$row[$j]=str_replace("\n","\\n",$row[$j]);
								if (isset($row[$j])){
									$sql .= '"'.$row[$j].'"' ;
								}
								else{
									$sql.= '""';
								}
								if ($j < ($numFields-1)){
									$sql .= ',';
								}
							}
							$sql.= ");\n";
						}
					}
					$sql.="\n\n\n";
				}else{
					$error=1;
				}
			}
			if($error==1){
				echo 'Ocurrio un error inesperado al crear la copia de seguridad';
			}else{

				$carpeta = "./backup";
				if (!mkdir($carpeta, 0777, true)) {
            //echo("Fallo");
				}
				chmod(BACKUP_PATH, 0777);        
				$sql.='SET FOREIGN_KEY_CHECKS=1;';
				$handle=fopen(BACKUP_PATH.$DataBASE,'w+');
				if(fwrite($handle, $sql)){
					fclose($handle);
            //header("location: $handle");
					echo "<script>
					alert('Copia de seguridad realizada con éxito.');
					window.location.href='?c=".base64_encode('Respaldar')."&a=".base64_encode('Restore')."';
					</script>";

				}else{
					echo 'Ocurrio un error inesperado al crear la copia de seguridad';
				}
			}
		}else{
			echo 'Ocurrio un error inesperado';
		}
		mysqli_free_result($result);
	}

	public function Guardar1(){
		 //moving the uploaded sql file
        $filename = $_FILES['sql']['name'];
        move_uploaded_file($_FILES['sql']['tmp_name'],'backup/' . $filename);
        $file_location = 'upload/' . $filename;


        session_start(); // mantiene la sesión
        //if (isset($_SESSION['validacion']) && $_SESSION['validacion'] == 1) {
           
           $restorePoint=BACKUP1::limpiarCadena($_POST['restorePoint']);
            $sql=explode(";",file_get_contents($restorePoint));
            $totalErrors=0;
            set_time_limit (60);
            $con=mysqli_connect(SERVER, USER, PASS, BD);
            $con->query("SET FOREIGN_KEY_CHECKS=0");
            for($i = 0; $i < (count($sql)-1); $i++){
                if($con->query($sql[$i].";")){  }else{ $totalErrors++; }
            }
            $con->query("SET FOREIGN_KEY_CHECKS=1");
            $con->close();
            if($totalErrors<=0){
               echo "<script>
					alert('Copia de seguridad realizada con éxito.');
					window.location.href='?c=".base64_encode('Respaldar')."&a=".base64_encode('Restore')."';
					</script>";
            }else{
                echo "Ocurrio un error inesperado, no se pudo hacer la restauración completamente";
            }


    //}
	}
}
?>