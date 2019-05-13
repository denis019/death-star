<?php

$router->post('token', [
    'as' => 'api_personal_client_token',
    'uses'  => 'Controller@loginPersonalClient',
]);

