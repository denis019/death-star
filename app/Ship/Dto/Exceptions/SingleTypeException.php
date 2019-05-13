<?php

namespace App\Ship\Dto\Exceptions;

use App\Ship\Parents\Exceptions\Exception;

/**
 * Class SingleTypeException
 * @package App\Ship\Dto\Exceptions
 */
class SingleTypeException extends Exception
{
    public $message = 'Only Single Type is Allowed';
}
