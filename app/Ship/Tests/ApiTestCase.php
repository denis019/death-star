<?php

namespace App\Ship\Tests;

use Apiato\Core\Traits\CallableTrait;
use App\Containers\Authentication\Actions\CreateOauthPersonalClientAction;
use App\Containers\Authentication\Actions\LoginPersonalClientAction;
use App\Containers\Authentication\Dto\OauthBearerResponseDto;
use App\Containers\Authentication\Dto\PersonalClientDto;
use App\Ship\Parents\Tests\PhpUnit\TestCase;
use Illuminate\Foundation\Testing\Concerns\MakesHttpRequests;
use Laravel\Passport\Client;

class ApiTestCase extends TestCase
{

    use CallableTrait, MakesHttpRequests {
        CallableTrait::call as callClass;
        MakesHttpRequests::call insteadof CallableTrait;
    }

    private $authHeader = [];

    /**
     * @return array
     */
    protected function getAuthHeader(): array
    {
        if($this->authHeader !== [])
        {
            return $this->authHeader;
        }

        /** @var Client $client */
        $client = $this->callClass(CreateOauthPersonalClientAction::class, [
            'testOauth',
        ]);

        $personalClientDto = PersonalClientDto::make([
            'clientSecret' => $client->secret,
            'clientId' => $client->id,
        ]);

        /** @var OauthBearerResponseDto $oauthBearerResponseDto */
        $oauthBearerResponseDto = $this->callClass(LoginPersonalClientAction::class, [$personalClientDto]);

        $this->authHeader['Accept'] = 'application/json';
        $this->authHeader['Content-Type'] = 'application/json';
        $this->authHeader['Authorization'] = 'Bearer ' . $oauthBearerResponseDto->accessToken;

        return $this->authHeader;
    }
}
