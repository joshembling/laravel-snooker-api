<?php

namespace JoshEmbling\Snooker\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \JoshEmbling\Snooker\Snooker
 */
class Snooker extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \JoshEmbling\Snooker\Snooker::class;
    }
}
