<?php

	namespace app\controllers;
	use app\models\viewModel;

	class viewController extends viewModel{

		/*---------- Controlador obtener vistas ----------*/
		public function obtenerVistasControlador($vista){
			if($vista!=""){
				$respuesta=$this->obtenerVistasModelo($vista);
			}else{
				$respuesta="login";
			}
			return $respuesta;
		}

    //observacion para traer nombre de lapagina
		/*---------- Controlador obtener nombre de la pagina ----------*/
		public function obtenerNombrePaginaControlador($nombre) {

            if($nombre!=""){
				$respuesta=$this->obtenerVistasModelo($nombre);
                // Usa una expresión regular para separar las palabras
                // La expresión busca letras mayúsculas y las precede con un espacio
                $textoSeparado = preg_replace('/(?<!^)(?=[A-Z])/', ' ', $respuesta);
                // Convierte el texto a mayúsculas
    			$textoMayusculas = strtoupper($textoSeparado);
			}else{
				$textoMayusculas="LOGIN";
			}
			return $textoMayusculas;

		}
	}