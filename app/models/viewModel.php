<?php
	
	namespace app\models;

	class viewModel{

		/*---------- Modelo obtener vista ----------*/
		protected function obtenerVistasModelo($vista){

			$listaBlanca=["dashboard", "register"];

			if(in_array($vista, $listaBlanca)){
				if(is_file("./app/views/content/".$vista."-view.php")){
					$contenido=$vista;
				}else{
					$contenido="404";
				}
			}elseif($vista=="login"){
				$contenido="login";
			}else{
				$contenido="404";
			}
			return $contenido;
		}
	}