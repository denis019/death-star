<?php

namespace App\Containers\Authentication\UI\API\Controllers;

use App\Containers\Authentication\Actions\LoginPersonalClientAction;
use App\Containers\Authentication\Dto\OauthBearerResponseDto;
use App\Containers\Authentication\Dto\PersonalClientDto;
use App\Containers\Authentication\UI\API\Requests\LoginPersonalClientRequest;
use App\Ship\Parents\Controllers\ApiController;

/**
 * Class Controller
 * @package App\Containers\Authentication\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param LoginPersonalClientRequest $request
     * @return array
     */
    public function loginPersonalClient(LoginPersonalClientRequest $request): array
    {
        $personalClientDto = PersonalClientDto::make($request->toArray());

        /** @var OauthBearerResponseDto $oauthBearerResponseDto */
        $oauthBearerResponseDto = $this->call(LoginPersonalClientAction::class, [$personalClientDto]);

        return $oauthBearerResponseDto->toArraySnakeCase();
    }
}
