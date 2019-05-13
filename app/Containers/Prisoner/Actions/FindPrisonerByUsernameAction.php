<?php

namespace App\Containers\Prisoner\Actions;

use App\Containers\Prisoner\Models\Prisoner;
use App\Containers\Prisoner\Tasks\FindPrisonerByUsernameTask;
use App\Ship\Parents\Actions\Action;

/**
 * Class LoginPersonalClientAction
 * @package App\Containers\Authentication\Actions
 */
class FindPrisonerByUsernameAction extends Action
{

    /**
     * @param string $username
     * @return Prisoner|null
     */
    public function run(string $username): ?Prisoner
    {
        return $this->call(FindPrisonerByUsernameTask::class, [$username]);
    }
}
