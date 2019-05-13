<?php
namespace App\Containers\Authentication\Dto;

use App\Ship\Dto\AbstractWithDefaultDto;

/**
 * Class PersonalClientDto
 * @package App\Containers\Authentication\Dto
 */
class PersonalClientDto extends AbstractWithDefaultDto
{

    public const FORCE_SCOPE = 'TheForce';

    /**
     * @var string
     */
    public $clientSecret;

    /**
     * @var string
     */
    public $clientId;

    /**
     * @var string
     */
    public $scope;

    /**
     * @var string
     */
    public $grantType;

    /**
     * @return array
     */
    function getDefaultAttributes(): array
    {
        return [
            'scope' => self::FORCE_SCOPE,
            'grantType' => 'client_credentials'
        ];
    }
}
