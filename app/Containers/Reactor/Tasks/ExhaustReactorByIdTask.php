<?php

namespace App\Containers\Reactor\Tasks;

use App\Containers\Reactor\Data\Repositories\ReactorRepository;
use App\Ship\Parents\Tasks\Task;

/**
 * Class FindOauthClientTask
 * @package App\Containers\Authentication\Tasks
 */
class ExhaustReactorByIdTask extends Task
{

    /** @var ReactorRepository */
    private $reactorRepository;

    public function __construct(ReactorRepository $reactorRepository)
    {
        $this->reactorRepository = $reactorRepository;
    }

    /**
     * @param int $id
     * @return int
     */
    public function run(int $id)
    {
        return $this->reactorRepository->delete($id);
    }
}
