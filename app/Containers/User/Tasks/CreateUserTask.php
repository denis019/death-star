<?php

namespace App\Containers\User\Tasks;

use App\Containers\User\Data\Repositories\UserRepository;
use App\Containers\User\Models\User;
use App\Ship\Parents\Tasks\Task;

/**
 * Class CreateUserTask
 * @package App\Containers\User\Tasks
 */
class CreateUserTask extends Task
{

    /** @var UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return User
     */
    public function run(): User
    {
        return $this->userRepository->create([]);
    }
}
