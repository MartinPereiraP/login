# Sistema_registro_inicio_sesion_PHP_Mysql

## Regitro de errores

- head.php: Ruta de estilos.css, se modifica eliminando de la ruta, el directorio login: `/login/asset/css/estilos.css` por `/asset/css/estilos.css`
- header.php: Correccion rutas `/login/view/home/` por `/view/home/`
- En Login.php, correccion ruta a register `/login.php`por `/view/home/signup.php` tambien etiqueta a `login/index.php`por `/index.php`
- head: descomentar libreria js fontawesome
- footer.php: correcion ruta js `/login/asset/js/main.js`por `/asset/js/main.js`
- signup.php: corrcion ruta `/login/index.php`por `/index.php` etiqueta a dog-icon y ruta `/signup.php` por `/view/home/login.php`
- store.php: Mensaje no coincide con error