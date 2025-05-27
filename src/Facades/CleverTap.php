<?php

namespace BilalBaraz\LaravelCleverTap\Facades;

use Illuminate\Support\Facades\Facade;

class CleverTap extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'clevertap';
    }
}