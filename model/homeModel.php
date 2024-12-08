<?php

require_once __DIR__ . '/../config/app.php';
class homeModel
{
    private $PDO;
    public function __construct()
    {
        require_once base_path('/config/db.php');
        $pdo = new db();
        $this->PDO = $pdo->conexion();
    }

    /**
     * Agrega un nuevo usuario a la base de datos.
     * 
     * @param string $correo Correo del usuario.
     * @param string $password Contraseña del usuario.
     * @param string $rut RUT del usuario.
     */
    public function agregarNuevoUsuario($correo, $password, $rut)
    {
        $statement = $this->PDO->prepare("INSERT INTO usuarios (correo, password, rut) VALUES (:correo, :password, :rut)");
        $statement->bindParam(":correo", $correo);
        $statement->bindParam(":password", $password);
        $statement->bindParam(":rut", $rut);

        try {
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            error_log("Error al guardar usuario: " . $e->getMessage());
            return false;
        }
    }

    public function obtenerclave($correo)
    {
        $statement = $this->PDO->prepare("SELECT password FROM usuarios WHERE correo = :correo");
        $statement->bindParam(":correo", $correo);
        return ($statement->execute()) ? $statement->fetch()['password'] : false;
    }
}
