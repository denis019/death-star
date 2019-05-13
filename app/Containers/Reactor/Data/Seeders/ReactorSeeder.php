<?php

namespace App\Containers\Reactor\Data\Seeders;

use App\Containers\Reactor\Models\Reactor;
use App\Ship\Parents\Seeders\Seeder;

/**
 * Class ReactorSeeder
 * @package App\Containers\Reactor\Data\Seeders
 */
class ReactorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Reactor::class, 20)->create();
    }
}
