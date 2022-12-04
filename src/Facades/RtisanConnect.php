<?php

namespace VendorName\Skeleton\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \VendorName\Skeleton\RtisanConnect
 */
class RtisanConnect extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \VendorName\Skeleton\RtisanConnect::class;
    }
}
