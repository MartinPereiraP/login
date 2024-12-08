<?php
// Incluir la configuración global
require_once __DIR__ . '/../../config/app.php';

require_once base_path('view/head/head.php');
if (empty($_SESSION['usuario'])) {
    header("Location:login.php");
}
?>
<section class="mt-5">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="text-center mt-4">Bienvenido <?= $_SESSION['usuario'] ?></h1>
                <a href="/">Retornar</a>
            </div>
        </div>
    </div>
</section>
<?php
require_once base_path('view/head/footer.php');
?>