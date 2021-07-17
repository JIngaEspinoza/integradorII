<?php 
	function bd_conecta(){
		    
		// $servidor = "192.168.90.8:1433";
		// $usuario = "sa";
		// $clave = "Redes--";
		// $bd = "bk_simi_01_05_2020";

		// $servidor = "192.168.90.15:1433";
		// $usuario = "acceso_produccion";
		// $clave = "db-Pr0duccion2018-";
		// $bd = "simi";

		$servidor = "192.168.90.8:1433";
		$usuario = "sa";
		$clave = "Redes--";
		$bd = "bk_sga_01_07_2021";
		// $bd = "SGA_FEBRERO_02_2016";

		$conn = mssql_connect($servidor,$usuario,$clave);
		
		if($conn)
 		{ 
 			$okbd = mssql_select_db($bd,$conn);	
 		}else
 		{
			echo "Error de Conexion";
   			exit(0);
 		}
		
		return $conn;

	}
?>
