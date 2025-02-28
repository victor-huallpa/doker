<?php
	
	namespace app\models;
	use app\models\dataBase;

	class mainModel extends dataBase{

        private $db;

		//constructor para instanciar conexion privada
		public function __construct() {
			// Obtener la instancia de la conexión a la base de datos
			$this->db = DataBase::startConnection();
		}

		/*----------  Funcion ejecutar consultas  ----------*/
		protected function ejecutarConsulta($consulta){
			// Obtener la conexión PDO
			$conexion = $this->db->getConnection()->prepare($consulta);
			$conexion->execute();
			// Cerrar la conexión
			// $this->db->disconnect();
			return $conexion;
		}

        		/*----------  Funcion limpiar cadenas  ----------*/
		public function limpiarCadena($cadena) {

			$palabras=["<script>","</script>","<script src","<script type=","SELECT * FROM","SELECT "," SELECT ","DELETE FROM","INSERT INTO","DROP TABLE","DROP DATABASE","TRUNCATE TABLE","SHOW TABLES","SHOW DATABASES","<?php","?>","--","^","<",">","==","=",";","::"];

			$cadena=trim($cadena);
			$cadena=stripslashes($cadena);

			foreach($palabras as $palabra){
				$cadena=str_ireplace($palabra, "", $cadena);
			}

			$cadena=trim($cadena);
			$cadena=stripslashes($cadena);

			return $cadena;
		}

		/*----------  Funcion para ejecutar una consulta INSERT preparada  ----------*/
		protected function guardarDatos($tabla, $datos, $retornar_id = false){
			$query = "INSERT INTO $tabla (";
			$C = 0;
			foreach ($datos as $clave) {
				if ($C >= 1) {
					$query .= ",";
				}
				$query .= $clave["campo_nombre"];
				$C++;
			}
			
			$query .= ") VALUES (";
		
			$C = 0;
			foreach ($datos as $clave) {
				if ($C >= 1) {
					$query .= ",";
				}
				$query .= $clave["campo_marcador"];
				$C++;
			}
		
			$query .= ")";
			$sql = $this->db->getConnection()->prepare($query);
		
			foreach ($datos as $clave) {
				$sql->bindParam($clave["campo_marcador"], $clave["campo_valor"]);
			}
		
			$sql->execute();
		
			// Retornar el ID insertado si es necesario
			if ($retornar_id) {
				return $this->db->getConnection()->lastInsertId();
			}
		
			return $sql;
		}

		/*---------- Funcion verificar datos (expresion regular) ----------*/
		protected function verificarDatos($filtro,$cadena){
			if(preg_match("/^".$filtro."$/", $cadena)){
				return false;
            }else{
                return true;
            }
		}
    }