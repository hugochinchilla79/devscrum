
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	if(! function_exists("obtener_directorios")){
		function obtener_directorios($dir,$ruta=""){
			// array_keys me retorna los indices de cada uno de los elementos del array
			//los indices de los archivos son numeros y los de las carpetas string
			$nombres = array_keys($dir); 
			echo "<ul>";
			foreach ($nombres as $key) {//evaluo solo los indices que sean texto (directorios)
				if(is_string($key)){
					echo "<li><a href=\"".base_url()."upload/?v=".$ruta.$key."\">".$ruta."/".$key."</a></li>";
					//echo "<li><a href=\"".base_url()."upload/1?param=1\">".$key."</li>";
				}
				
			}
			echo "</ul>";
		}
	}
?>