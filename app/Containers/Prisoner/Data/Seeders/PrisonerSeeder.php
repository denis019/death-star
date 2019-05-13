<?php

namespace App\Containers\Prisoner\Data\Seeders;

use App\Containers\Prisoner\Models\Prisoner;
use App\Ship\Parents\Seeders\Seeder;

/**
 * Class PrisonerSeeder
 * @package App\Containers\Prisoner\Data\Seeders
 */
class PrisonerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Prisoner::class, 20)->create();
    }
}
