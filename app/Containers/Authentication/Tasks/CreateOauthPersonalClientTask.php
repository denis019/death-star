<?php

namespace App\Containers\Authentication\Tasks;

use App\Ship\Parents\Tasks\Task;
use Laravel\Passport\Client;
use Laravel\Passport\ClientRepository;

/**
 * Class CallOAuthServerTask
 * @package App\Containers\Authentication\Tasks
 */
class CreateOauthPersonalClientTask extends Task
{

    /** @var ClientRepository */
    private $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    /**
     * @param string   $name
     * @param int|null $userId
     * @param string   $redirect
     * @return Client
     */
    public function run(string $name, ?int $userId, string $redirect): Client
    {
        return $this->clientRepository->createPersonalAccessClient(
            $userId, $name, $redirect
        );
    }
}
