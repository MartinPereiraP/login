<?php

require_once __DIR__ . '/../../config/app.php';
require_once base_path('controller/homeController.php');

$obj = new homeController();
$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];
$confirmarContraseña = $_POST['confirmarContraseña'];
$rut = $_POST['rut'];
$error = "";

// Validar campos
if (empty($correo) || empty($contraseña) || empty($confirmarContraseña) || empty($rut)) {
    $error .= "<li>Todos los campos son obligatorios</li>";
    header("Location:signup.php?error=" . urlencode($error) . "&correo=" . urlencode($correo) . "&rut=" . urlencode($rut));
    exit();
}

// Validar contraseñas
if ($contraseña !== $confirmarContraseña) {
    $error .= "<li>Las contraseñas no coinciden</li>";
    header("Location:signup.php?error=" . urlencode($error) . "&correo=" . urlencode($correo) . "&rut=" . urlencode($rut));
    exit();
}

// Guardar usuario
try {
    if ($obj->guardarUsuario($correo, $contraseña, $rut)) {
        header("Location:login.php");
        exit();
    } else {
        $error .= "<li>No se pudo guardar el usuario</li>";
        header("Location:signup.php?error=" . urlencode($error) . "&correo=" . urlencode($correo) . "&rut=" . urlencode($rut));
        exit();
    }
} catch (Exception $e) {
    $error .= "<li>" . $e->getMessage() . "</li>";
    header("Location:signup.php?error=" . urlencode($error) . "&correo=" . urlencode($correo) . "&rut=" . urlencode($rut));
    exit();
}
