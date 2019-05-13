<?php

use App\Containers\Authentication\Dto\PersonalClientDto;

$router->get('prisoner/{username}', [
    'as' => 'api_find_prisoner_by_username',
    'uses'  => 'Controller@findPrisonerByUsername',
    'middleware' => [
        'auth:api',
        'scopes:' . PersonalClientDto::FORCE_SCOPE
    ]
]);
