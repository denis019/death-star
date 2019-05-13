<?php

namespace App\Containers\Reactor\Actions;

use App\Containers\Reactor\Tasks\ExhaustReactorByIdTask;
use App\Ship\Parents\Actions\Action;

/**
 * Class LoginPersonalClientAction
 * @package App\Containers\Authentication\Actions
 */
class ExhaustReactorByIdAction extends Action
{

    /**
     * @param int $reactorId
     * @return int
     */
    public function run(int $reactorId, int $torpedos)
    {
        return $this->call(ExhaustReactorByIdTask::class, [$reactorId]);
    }
}
