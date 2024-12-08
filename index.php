<?php
// index.php

// Mostrar errores en pantalla
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

// Incluir la configuración global
require_once __DIR__ . '/config/app.php';

// Usar rutas dinámicas para incluir otros archivos
require_once base_path('view/head/header.php');
?>

<!-- Aquí iría el contenido principal -->

<?php
require_once base_path('view/head/footer.php');
?>