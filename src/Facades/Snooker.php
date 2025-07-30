<?php

namespace JoshEmbling\Snooker\Facades;

use Illuminate\Support\Facades\Facade;

class Snooker extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'snooker';  // matches the singleton key in your service provider
    }
}
