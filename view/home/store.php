<?php
// Incluir la configuración global
require_once __DIR__ . '/../../config/app.php';

require_once base_path('controller/homeController.php');
$obj = new homeController();
$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];
$confirmarContraseña = $_POST['confirmarContraseña'];
$error = "";
if (empty($correo) && empty($contraseña) && empty($confirmarContraseña)) {
    $error .= "<li>Los campos son iguales</li>";
    header("Location:signup.php?error=" . $error . "&&correo=" . $correo . "&&contraseña=" . $contraseña . "&&confirmarContraseña=" . $confirmarContraseña);
} else if ($correo || $contraseña || $confirmarContraseña) {
    if ($contraseña == $confirmarContraseña) {
        if ($obj->guardarUsuario($correo, $contraseña) == false) {
            $error .= "<li>No se pudo guardar el usuario</li>";
            header("Location:signup.php?error=" . $error . "&&correo=" . $correo . "&&contraseña=" . $contraseña . "&&confirmarContraseña=" . $confirmarContraseña);
        } else {
            header("Location:login.php");
        }
    } else {
        $error .= "<li>Las credenciales no coinciden</li>";
        header("Location:signup.php?error=" . $error . "&&correo=" . $correo . "&&contraseña=" . $contraseña . "&&confirmarContraseña=" . $confirmarContraseña);
    }
}
