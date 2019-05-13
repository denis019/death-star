<?php

namespace App\Containers\Prisoner\Tasks;

use App\Containers\Prisoner\Data\Criterias\FindPrisonerByUsernameCriteria;
use App\Containers\Prisoner\Data\Repositories\PrisonerRepository;
use App\Containers\Prisoner\Models\Prisoner;
use App\Ship\Parents\Tasks\Task;

/**
 * Class BinaryDecodeTask
 * @package App\Containers\Prisoner\Tasks
 */
class FindPrisonerByUsernameTask extends Task
{

    /** @var PrisonerRepository */
    private $prisonerRepository;

    /**
     * FindPrisonerByUsername constructor.
     * @param PrisonerRepository $prisonerRepository
     */
    public function __construct(PrisonerRepository $prisonerRepository)
    {
        $this->prisonerRepository = $prisonerRepository;
    }

    /**
     * @param string $username
     * @return Prisoner|null
     */
    public function run(string $username): ?Prisoner
    {
        $this->prisonerRepository->pushCriteria(new FindPrisonerByUsernameCriteria($username));

        return $this->prisonerRepository->first();
    }
}
