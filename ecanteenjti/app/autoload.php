<?php 

function autoloadClasses($className) {
    $classFile = __DIR__ . '/../' . str_replace('\\', '/', $className) . '.php';

    if (file_exists($classFile)) {
        include_once $classFile;
    }
}

spl_autoload_register('autoloadClasses');

?>