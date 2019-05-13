<?php

namespace App\Containers\Authentication\Actions;

use App\Containers\Authentication\Dto\OauthBearerResponseDto;
use App\Containers\Authentication\Dto\PersonalClientDto;
use App\Containers\Authentication\Tasks\FindOauthClientTask;
use App\Containers\User\Models\User;
use App\Containers\User\Tasks\FindUserByIdTask;
use App\Ship\Parents\Actions\Action;
use Laravel\Passport\Client;

/**
 * Class LoginPersonalClientAction
 * @package App\Containers\Authentication\Actions
 */
class LoginPersonalClientAction extends Action
{

    /**
     * @param PersonalClientDto $personalClientDto
     * @return OauthBearerResponseDto
     */
    public function run(PersonalClientDto $personalClientDto): OauthBearerResponseDto
    {
        /** @var Client $oauthClient */
        $oauthClient = $this->call(FindOauthClientTask::class, [$personalClientDto->clientId]);
        /** @var User $user */
        $user = $this->call(FindUserByIdTask::class, [$oauthClient->user_id]);

        $oauthToken = $user->createToken('deathStar', [
            PersonalClientDto::FORCE_SCOPE
        ]);

        $expireDateTime = $oauthToken->token->expires_at->getTimestamp();

        return OauthBearerResponseDto::make([
            'tokenType' => 'Bearer',
            'expiresIn' => $expireDateTime - (new \DateTime())->getTimestamp(),
            'accessToken' => $oauthToken->accessToken,
            'scope' => PersonalClientDto::FORCE_SCOPE,
        ]);
    }
}
