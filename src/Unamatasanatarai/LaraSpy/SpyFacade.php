<?php
namespace Unamatasanatarai\LaraSpy;

use Illuminate\Support\Facades\Facade;

class SpyFacade extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'spy';
    }
}
