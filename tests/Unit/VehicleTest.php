<?php

namespace Tests\Unit;

use Tests\TestCase;

class VehicleTest extends TestCase
{
    public function testSale()
    {
        $data = [
            "user_id" => "6365f4e705157820610a48b9",
            "vehicle_id" => "6365f4e705157820610a48ba",
            "qty" => 1
        ];

        $this->post(route('sale'), $data)
            ->assertStatus(200);
    }

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
