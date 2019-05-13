<?php

namespace App\Containers\Authentication\Tasks;

use App\Ship\Parents\Tasks\Task;
use Laravel\Passport\Client;
use Laravel\Passport\ClientRepository;

/**
 * Class FindOauthClientTask
 * @package App\Containers\Authentication\Tasks
 */
class FindOauthClientTask extends Task
{

    /** @var ClientRepository */
    private $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    /**
     * @param int $id
     * @return Client
     */
    public function run(int $id): Client
    {
        return $this->clientRepository->find($id);
    }
}
