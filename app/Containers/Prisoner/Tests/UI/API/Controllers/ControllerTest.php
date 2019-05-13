<?php

namespace App\Containers\Prisoner\Tests\UI\API\Controllers;

use App\Containers\Prisoner\Models\Prisoner;
use App\Ship\Tests\ApiTestCase;

class ControllerTest extends ApiTestCase
{

    public function testShouldReturnValidBinaryPrisonerData()
    {
        $prisoner = factory(Prisoner::class)->create();
        $endpoint = route('api_find_prisoner_by_username', [
            'username' => $prisoner->username,
        ]);


        $this->json('GET', $endpoint, [], $this->getAuthHeader())
            ->assertJson([
                'cell' => bstr2bin($prisoner->cell),
                'block' => bstr2bin($prisoner->block),
            ]);
    }

    public function testShouldReturnCorrectStatusCodeForNonExistingPrisoner()
    {
        $endpoint = route('api_find_prisoner_by_username', [
            'username' => 'nonExistUsername',
        ]);

        $this->json('GET', $endpoint, [], $this->getAuthHeader())
            ->assertStatus(422);
    }
}
