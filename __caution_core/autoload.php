<?php

require_once __DIR__ . '/../../inc/start.php';
require_once __DIR__ . '/../../inc/protect.php';

require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/db.php';


spl_autoload_register(function ($class) {
    $class = ltrim($class, '\\');

    if (strpos($class, 'Caution\\Core\\') === 0) {
        $relativeClass = substr($class, strlen('Caution\\Core\\'));

        $file = __DIR__ . '/' . str_replace('\\', '/', $relativeClass) . '.php';

        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }

    $baseDir = (__DIR__ . "/.."); // modules_extra
    
    if (is_dir($baseDir)) {
        $modules = scandir($baseDir);
        foreach ($modules as $module) {
            if ($module === '.' || $module === '..') continue;
            
            $srcDir = $baseDir . '/' . $module . '/src';
            if (!is_dir($srcDir)) continue;
            
            $file = $srcDir . '/' . str_replace('\\', '/', $class) . '.php';
            if (file_exists($file)) {
                require_once $file;
                return;
            }
        }
    }
});
