<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AddressTest extends TestCase
{
    /**
     * Test successfully.
     *
     * @return void
     */
    public function test_enpoint()
    {
        $this->withoutExceptionHandling();

        $response = $this->getJson('api/zip-codes/77519');
        $response->assertStatus(200);
    }

    /**
     * Test error.
     *
     * @return void
     */
    public function test_failed_enpoint()
    {
        $this->withoutExceptionHandling();

        $response = $this->getJson('api/zip-codes/775190');
        $response->assertStatus(400);
    }

    /**
     * Test succes response
     *
     * @return void
     */
    public function test_success_structure_enpoint()
    {
        $this->withoutExceptionHandling();

        $response = $this->getJson('api/zip-codes/77519');
        $response->assertStatus(200)
        ->assertJsonStructure([
            "zip_code",
            "federal_entity" => [
                "key",
                "name",
                "code",
            ],
            "settlements" => [
                [
                    "key",
                    "name",
                    "zone_type",
                    "settlement_type" => [
                        "name"
                    ],
                    "locality" => [
                        "key",
                        "name"
                    ]
                ]
            ],
            "municipality" => [
                "key",
                "name"
            ]
        ]);
    }

    /**
     * Test good response
     *
     * @return void
     */
    public function test_equal_response_enpoint()
    {
        $this->withoutExceptionHandling();

        $response = $this->getJson('api/zip-codes/77519');
        $response->assertStatus(200);

        $this->assertEquals(77519, $response->getData()->zip_code);
    }
}
