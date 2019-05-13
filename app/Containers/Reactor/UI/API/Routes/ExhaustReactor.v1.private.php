<?php

use App\Containers\Authentication\Dto\PersonalClientDto;

$router->delete('reactor/exhaust/{reactorId}', [
    'as' => 'api_reactor_exhaust',
    'uses'  => 'Controller@exhaustReactor',
    'middleware' => [
        'auth:api',
        'scopes:' . PersonalClientDto::FORCE_SCOPE
    ]
]);
