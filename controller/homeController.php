<?php

require_once __DIR__ . '/../config/app.php';
class homeController
{
    private $MODEL;

    public function __construct()
    {
        require_once base_path('model/homeModel.php');
        $this->MODEL = new homeModel();
    }

    public function guardarUsuario($correo, $contraseña, $rut)
    {
        if (!$this->validarRut($rut)) {
            throw new Exception("El RUT ingresado no es válido.");
        }

        // Guardar el usuario
        return $this->MODEL->agregarNuevoUsuario(
            $this->limpiarcorreo($correo),
            $this->encriptarcontraseña($this->limpiarcadena($contraseña)),
            $this->limpiarcadena($rut)
        );
    }

    public function limpiarcadena($campo)
    {
        $campo = strip_tags($campo);
        $campo = filter_var($campo, FILTER_UNSAFE_RAW);
        $campo = htmlspecialchars($campo);
        return $campo;
    }

    public function limpiarcorreo($campo)
    {
        $campo = strip_tags($campo);
        $campo = filter_var($campo, FILTER_SANITIZE_EMAIL);
        $campo = htmlspecialchars($campo);
        return $campo;
    }

    public function encriptarcontraseña($contraseña)
    {
        return password_hash($contraseña, PASSWORD_DEFAULT);
    }

    public function verificarusuario($correo, $contraseña)
    {
        $keydb = $this->MODEL->obtenerclave($correo);
        return (password_verify($contraseña, $keydb)) ? true : false;
    }

    /**
     * Modulo 11
     * Calcula el dígito verificador de un RUT.
     * 
     * @param string $rut RUT sin dígito verificador.
     * @return string Dígito verificador calculado.
     * @throws Exception Si el RUT no es válido.
     * @see https://es.wikipedia.org/wiki/Rol_%C3%9Anico_Tributario#C%C3%A1lculo_del_d%C3%ADgito_verificador
     */
    function calcularDigitoVerificador($rut)
    {
        // Limpiar el RUT, eliminando puntos y guiones
        $rut = preg_replace('/[^0-9]/', '', $rut);

        // Invertir los números del RUT
        $rutInvertido = strrev($rut);
        $factor = 2;
        $suma = 0;

        // Multiplicar cada número por el factor correspondiente
        for ($i = 0; $i < strlen($rutInvertido); $i++) {
            $suma += $rutInvertido[$i] * $factor;
            $factor = $factor == 7 ? 2 : $factor + 1;
        }

        // Calcular el resto de la división por 11
        $resto = $suma % 11;

        // Calcular el dígito verificador
        $digitoVerificador = 11 - $resto;

        if ($digitoVerificador == 11) {
            return '0';
        } elseif ($digitoVerificador == 10) {
            return 'K';
        } else {
            return (string) $digitoVerificador;
        }
    }

    /**
     * Valida un RUT completo (número y dígito verificador).
     * 
     * @param string $rutCompleto RUT completo (número y dígito verificador).
     * @return bool True si el RUT es válido, false si no.
     */
    function validarRut($rutCompleto)
    {
        // Separar el número del dígito verificador
        $rut = preg_replace('/[^0-9kK]/', '', substr($rutCompleto, 0, -1));
        $digitoIngresado = strtoupper(substr($rutCompleto, -1));

        // Calcular el dígito verificador
        $digitoCalculado = $this->calcularDigitoVerificador($rut);

        // Verificar si el dígito calculado coincide con el ingresado
        return $digitoCalculado === $digitoIngresado;
    }
}
