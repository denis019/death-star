<?php

namespace App\Containers\Authentication\Dto;

use App\Ship\Dto\AbstractWithDefaultDto;

/**
 * Class OauthBearerResponseDto
 * @package App\Containers\Authentication\Dto
 */
class OauthBearerResponseDto extends AbstractWithDefaultDto
{

    /**
     * @var string
     */
    public $tokenType;

    /**
     * @var int
     */
    public $expiresIn;

    /**
     * @var string
     */
    public $accessToken;

    /**
     * @var string
     */
    public $scope;

    /**
     * @return array
     */
    function getDefaultAttributes(): array
    {
        return [
            'tokenType' => 'Bearer',
            'scope' => PersonalClientDto::FORCE_SCOPE,
        ];
    }
}
