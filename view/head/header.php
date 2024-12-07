<?php
// Incluir la configuración global
require_once __DIR__ . '/../../config/app.php';

require_once base_path('view/head/head.php');

?>

<div class="fondo_menu">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Inicio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php if (empty($_SESSION['usuario'])): ?>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Productos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Precios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contactanos</a>
                            </li>
                        </ul>
                        <a href="/view/home/login.php" class="boton">Inicia Sesión</a>
                        <a href="/view/home/signup.php" class="boton">Registrate</a>
                    </div>
                <?php else: ?>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Agregar información</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Editar perfil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Sesión de recursos</a>
                            </li>
                        </ul>
                        <a href="/view/home/logout.php" class="boton">Cerrar Sesión</a>
                    </div>
                <?php endif ?>

            </div>
        </nav>
    </div>
</div>
<div class="fondo">