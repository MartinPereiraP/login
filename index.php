<?php
// index.php

// Incluir la configuración global
require_once __DIR__ . '/config/app.php';

// Usar rutas dinámicas para incluir otros archivos
require_once base_path('view/head/header.php');
?>

<!-- Aquí iría el contenido principal -->

<?php
require_once base_path('view/head/footer.php');
?>