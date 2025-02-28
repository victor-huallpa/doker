<?php
        use app\controllers\viewController;
        use app\controllers\loginController;

        $insLogin = new loginController();

        $viewsController= new viewController();
        $vista=$viewsController->obtenerVistasControlador($url[0]);

        $nombreVista = $viewsController->obtenerNombrePaginaControlador($url[0]);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Codificación de caracteres -->
    <meta charset="UTF-8">

    <!-- Configuración del viewport para diseño responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Descripción de la página (importante para SEO) -->
    <meta name="description" content="Sistema profesional dockerizado para gestión eficiente.">

    <!-- Palabras clave (opcional, menos relevante para SEO moderno) -->
    <meta name="keywords" content="sistema, docker, gestión, profesional">

    <!-- Autor de la página -->
    <meta name="author" content="Victor Hugo Huallpa Huahuacondori">

    <!-- Canonical URL (para evitar contenido duplicado) -->
    <link rel="canonical" href="http://docker.vech">

    <!-- Título de la página (aparece en la pestaña del navegador) -->
    <title>DOKERIZADO | <?php echo $nombreVista; ?></title>

    <!-- Favicon (icono de la pestaña del navegador) -->
    <link rel="shortcut icon" href="<?php echo APP_URL; ?>app/views/resources/img/logo.png" type="image/x-icon">

    <!-- Hojas de estilo adicionales (ejemplo: Bootstrap) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Scripts de JavaScript (ejemplo: Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>

    <!-- Estilos y scripts personalizados -->
    <link rel="stylesheet" href="<?php echo APP_URL; ?>app/views/resources/css/style.css">
     <script src="<?php echo APP_URL; ?>app/views/resources/js/sweetalert2.all.min.js"></script>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
