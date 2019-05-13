<?php

namespace App\Containers\User\Tasks;

use App\Containers\User\Data\Repositories\UserRepository;
use App\Containers\User\Models\User;
use App\Ship\Parents\Tasks\Task;

/**
 * Class FindUserByIdTask
 * @package App\Containers\User\Tasks
 */
class FindUserByIdTask extends Task
{

    /** @var UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param int $id
     * @return User
     */
    public function run(int $id): User
    {
        return $this->userRepository->find($id);
    }
}
