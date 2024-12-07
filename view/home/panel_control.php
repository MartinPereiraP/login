<?php
// Incluir la configuración global
require_once __DIR__ . '/../../config/app.php';

require_once base_path('view/head/head.php');
if (empty($_SESSION['usuario'])) {
    header("Location:login.php");
}
?>
<h1 class="text-center mt-4">Bienvenido <?= $_SESSION['usuario'] ?></h1>
<?php
require_once base_path('view/head/footer.php');
?>