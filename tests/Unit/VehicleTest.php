<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VehicleTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    /* @test */
    public function testSell()
    {
        $data = [
            "user_id" => "6365f4e705157820610a48b9",
            "vehicle_id" => "6365f4e705157820610a48ba",
            "qty" => 1
        ];

        $this->post(route('sale'), $data)
            ->assertStatus(201);
    }

    /* @test */
    public function testStock()
    {
        $this->get(route('stock'))
            ->assertStatus(200);
    }

    public function testReportById()
    {
        $this->get(route('reportById'))
            ->assertStatus(200);
    }

    public function testReport()
    {
        $this->get(route('reports'))
            ->assertStatus(200);
    }
}
