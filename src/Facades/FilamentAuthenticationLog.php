<?php

namespace FilamentPro\FilamentAuthenticationLog\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \FilamentPro\FilamentAuthenticationLog\FilamentAuthenticationLog
 */
class FilamentAuthenticationLog extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'filament-authentication-log';
    }
}
