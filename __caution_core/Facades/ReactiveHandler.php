<?php

namespace Caution\Core\Facades;

class ReactiveHandler
{
    public static $__ACTIONS;

    public static function for($action, $closure)
    {
        static::$__ACTIONS[$action] = $closure;
    }

    public static function execute()
    {
        if(isset($_POST['action']))
        {
            if(static::$__ACTIONS[$_POST['action']])
            {
                $closure = (static::$__ACTIONS[$_POST['action']]);
                exit($closure($_POST));
            }
        }
    }
}