<?php

namespace App\Containers\Prisoner\UI\API\Controllers;

use App\Containers\Prisoner\Actions\FindPrisonerByUsernameAction;
use App\Containers\Prisoner\Models\Prisoner;
use App\Containers\Prisoner\UI\API\Requests\FindPrisonerByUsernameRequest;
use App\Ship\Parents\Controllers\ApiController;

/**
 * Class Controller
 * @package App\Containers\Prisoner\UI\API\Controllers
 */
class Controller extends ApiController
{

    /**
     * @param FindPrisonerByUsernameRequest $request
     * @return array
     */
    public function findPrisonerByUsername(FindPrisonerByUsernameRequest $request)
    {
        /** @var Prisoner $prisoner */
        $prisoner = $this->call(FindPrisonerByUsernameAction::class, [$request->username]);

        return [
            'cell' => bstr2bin($prisoner->cell),
            'block' => bstr2bin($prisoner->block),
        ];
    }
}
