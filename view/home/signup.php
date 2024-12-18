<?php
// Incluir la configuración global
require_once __DIR__ . '/../../config/app.php';

require_once base_path('view/head/head.php');
if (!empty($_SESSION['usuario'])) {
    header("Location:panel_control.php");
}
?>

<div class="fondo-login">
    <div class="icon">
        <a href="/index.php">
            <i class="fa-solid fa-shield-dog dog-icon"></i>
        </a>
    </div>
    <div class="titulo">
        Create una cuenta aquí
    </div>
    <form action="/view/home/store.php" method="POST" class="col-3 login" autocomplete="off">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="correo" value="<?= (!empty($_GET['correo'])) ? $_GET['correo'] : "" ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese su correo electrónico" require>
        </div>

        <div class="mb-3">
            <label form="exampleInputRut" class="form-label">Rut</label>
            <input type="text" name="rut" value="<?= (!empty($_GET['rut'])) ? $_GET['rut'] : "" ?>" class="form-control" id="exampleInputRut" aria-describedby="rutHelp" placeholder="Ingrese su RUT (Ej: 15325419-K)" required pattern="\d{7,8}-[0-9kK]" title="Ingrese un RUT válido">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <div class="box-eye">
                <button type="button" onclick="mostrarContraseña('password','eyepassword')">
                    <i id="eyepassword" class="fa-solid fa-eye changePassword"></i>
                </button>
            </div>
            <input type="password" name="contraseña" value="<?= (!empty($_GET['contraseña'])) ? $_GET['contraseña'] : "" ?>" class="form-control" id="password" placeholder="Ingese su Contraseña" require>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Repeat the password</label>
            <div class="box-eye">
                <button type="button" onclick="mostrarContraseña('password2','eyepassword2')">
                    <i id="eyepassword2" class="fa-solid fa-eye changePassword"></i>
                </button>
            </div>
            <input type="password" name="confirmarContraseña" value="<?= (!empty($_GET['confirmarContraseña'])) ? $_GET['confirmarContraseña'] : "" ?>" class="form-control" id="password2" placeholder="Repita su Contraseña" require>
        </div>
        <?php if (!empty($_GET['error'])): ?>
            <div id="alertError" style="margin: auto;" class="alert alert-danger mb-2" role="alert">
                <?= !empty($_GET['error']) ? $_GET['error'] : "" ?>
            </div>
        <?php endif; ?>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">CREAR CUENTA</button>
        </div>
    </form>

    <div class="login col-3 mt-3">
        Tienes una cuenta? <a href="/view/home/login.php" style="text-decoration: none;">Inicia Sesion</a>
    </div>
</div>

<?php
require_once base_path('view/head/footer.php');
?>