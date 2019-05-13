<?php

namespace App\Containers\Reactor\UI\API\Controllers;

use App\Containers\Reactor\Actions\ExhaustReactorByIdAction;
use App\Containers\Reactor\UI\API\Requests\ExhaustReactorRequest;
use App\Ship\Parents\Controllers\ApiController;

/**
 * Class Controller
 * @package App\Containers\Reactor\UI\API\Controllers
 */
class Controller extends ApiController
{

    /**
     * @param ExhaustReactorRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function exhaustReactor(ExhaustReactorRequest $request)
    {
        $torpedos = (int) $request->header('X-Torpedoes', 0);

        $this->call(ExhaustReactorByIdAction::class, [$request->reactorId, $torpedos]);

        return $this->noContent();
    }
}
