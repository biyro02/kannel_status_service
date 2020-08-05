<?php
// for vendor files
require __DIR__ . '/vendor/autoload.php';

spl_autoload_register('autoLoader');
function autoLoader($className)
{
    $file = str_replace('\\',DIRECTORY_SEPARATOR,$className);
    require_once __DIR__ . DIRECTORY_SEPARATOR . $file . '.php';
}
