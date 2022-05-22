<?php

namespace ToneflixCode\AdfLy;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Toneflix\AdfLy\Skeleton\SkeletonClass
 */
class AdfLyFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'adf-ly';
    }
}