<?php

namespace Tests\Unit;

use Tests\TestCase;

class VehicleTest extends TestCase
{
    public function testSale()
    {
        $sale = [
            'vehicle_id' => '63665ca7ac6e8cc613067dfb',
            'user_id' => '63665ca7ac6e8cc613067df9',
            'qty' => 2
        ];

        $this->post(route('sale'), $sale)
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
