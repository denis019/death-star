<?php

namespace App\Containers\Prisoner\Data\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface;

class FindPrisonerByUsernameCriteria extends Criteria
{

    /**
     * @var string
     */
    private $username;

    /**
     * FindPrisonerByUsernameCriteria constructor.
     * @param string $username
     */
    public function __construct(string $username)
    {
        $this->username = $username;
    }

    /**
     * @param                     $model
     * @param RepositoryInterface $repository
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->where('username', '=', $this->username);
    }
}
