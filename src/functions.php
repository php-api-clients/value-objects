<?php declare(strict_types=1);

namespace ApiClients\Foundation\ValueObjects;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

function preheat()
{
    $directory = new RecursiveDirectoryIterator(__DIR__);
    $directory = new RecursiveIteratorIterator($directory);

    foreach ($directory as $node) {
        if (!is_file($node->getPathname())) {
            continue;
        }

        $file = substr($node->getPathname(), strlen(__DIR__));
        $file = ltrim($file, DIRECTORY_SEPARATOR);
        $file = rtrim($file, '.php');

        if (substr($file, 0, 10) === 'functions') {
            continue;
        }

        $class = __NAMESPACE__ . '\\' . str_replace(DIRECTORY_SEPARATOR, '\\', $file);

        /** Autoload class */
        class_exists(
            $class,
            true /** yes this true is optional but explicitly marking this as autoloading */
        );

        /** Autoload interface */
        interface_exists(
            $class,
            true /** yes this true is optional but explicitly marking this as autoloading */
        );
    }
}
