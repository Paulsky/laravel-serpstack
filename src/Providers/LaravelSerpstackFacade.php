<?php

namespace WDevs\LaravelSerpstack\Providers;

use Illuminate\Support\Facades\Facade;

/**
 * @see \WDevs\LaravelSerpstack\Skeleton\SkeletonClass
 */
class LaravelSerpstackFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-serpstack';
    }
}
