<?php

namespace Mintreu\LaravelLayout\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mintreu\LaravelLayout\LaravelLayout
 */
class LaravelLayout extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Mintreu\LaravelLayout\LaravelLayout::class;
    }
}
