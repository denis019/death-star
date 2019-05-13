<?php

namespace App\Containers\Authentication\Actions;

use App\Containers\Authentication\Tasks\CreateOauthPersonalClientTask;
use App\Containers\User\Models\User;
use App\Containers\User\Tasks\CreateUserTask;
use App\Ship\Parents\Actions\Action;
use Laravel\Passport\Client;

/**
 * Class CreateOauthPersonalClientAction
 * @package App\Containers\Authentication\Actions
 */
class CreateOauthPersonalClientAction extends Action
{

    /**
     * @param string $name
     * @return Client
     */
    public function run(string $name): Client
    {
        /** @var User $user */
        $user = $this->call(CreateUserTask::class);

        return $this->call(CreateOauthPersonalClientTask::class, [
            $name,
            $user->id,
            'http://localhost',
        ]);
    }
}
