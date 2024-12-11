<?php
// config/app.php
define('BASE_PATH', str_replace('\\', '/', dirname(__DIR__)));

function base_path($path = '')
{
    return BASE_PATH . ($path ? '/' . $path : '');
}
