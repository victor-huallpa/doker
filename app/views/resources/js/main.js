/*
 * Funcionalidad para regresar a la página anterior en el historial del navegador
 * Se puede utilizar en botones o enlaces para retroceder una página.
 */
function regresarPagina() {
    window.history.back(); // Vuelve a la página anterior
}

// Ejemplo de uso en un botón con id "btn_regresar"
let btn_regresar = document.getElementById("btn_regresar");
if (btn_regresar) {
    btn_regresar.addEventListener("click", function() {
        regresarPagina();
    });
}