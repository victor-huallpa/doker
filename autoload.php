<?php
    // recarga los archivos necesarios de acuerdo a la clase que se solicita
    spl_autoload_register(function($clase){
        //establece la ruta de la clase
        $archivo= __DIR__."/".$clase.".php";
        //reemplaza las barras invertidas por barras normales
        $archivo=str_replace("\\","/",$archivo);

        //verfica la existencia del archivo de acurdo a la ruta dada
        if(is_file($archivo)){
            //carga el archivo en la vista solicitada
            require_once $archivo;
        } 
    });


/* NOTA */

// __DIR__ es una constante mágica que devuelve el directorio del archivo actual.
// spl_autoload_register() es una función que registra cualquier número de autoloaders, permitiendo que las clases y interfaces sean cargadas automáticamente cuando se instancian.
// La función anónima es una función sin nombre que se puede asignar a una variable o pasar como argumento a otra función. En este caso, se pasa como argumento a spl_autoload_register().
// La función str_replace() reemplaza todas las apariciones del string de búsqueda con el string de reemplazo.
// La función is_file() verifica si el archivo dado es un archivo regular.
// La función require_once() incluye y evalúa el archivo especificado.