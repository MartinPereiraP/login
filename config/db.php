<?php
class db
{
    private $host = "localhost";
    private $dbname = "login";
    private $user = "root";
    private $password = "9884";

    /**
     * Funcion para conectar a la base de datos
     * 
     * @return PDO
     */
    public function conexion()
    {
        try {
            $PDO = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->password);
            return $PDO;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
