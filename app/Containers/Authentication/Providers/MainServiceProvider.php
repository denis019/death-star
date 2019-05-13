<?php

namespace App\Containers\Authentication\Providers;

use App\Ship\Parents\Providers\MainProvider;
use Laravel\Passport\PassportServiceProvider;

/**
 * Class MainServiceProvider
 * @package App\Containers\Authentication\Providers
 */
class MainServiceProvider extends MainProvider
{

    /**
     * Container Service Providers.
     *
     * @var array
     */
    public $serviceProviders = [
        PassportServiceProvider::class,
        AuthProvider::class,
    ];

    /**
     * Container Aliases
     *
     * @var  array
     */
    public $aliases = [

    ];

}
