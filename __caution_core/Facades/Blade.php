<?php

namespace Caution\Core\Facades;

use duncan3dc\Laravel\BladeInstance;

use Illuminate\View\Factory;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\Engines\PhpEngine;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Events\Dispatcher;
use Illuminate\View\FileViewFinder;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\Blade as FacadesBlade;
use Illuminate\View\Component;
use Illuminate\View\ComponentAttributeBag;

class Blade
{
    public static function forExtraModule($name, $template = null) : BladeInstance
    {

        $template = $template ?: configs()->template;

        $views = implode("/", [__DIR__, "../../../modules_extra/", $name, "/templates/", $template, 'views']);
        $cache = implode("/", [__DIR__, "../../../cache"]);

        return (new BladeInstance($views, $cache));
    }
}
