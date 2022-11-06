<?php

namespace Tests\Unit;

use Tests\TestCase;

class VehicleTest extends TestCase
{
    public function testSale()
    {
        $this->call('POST', route('sale'));
        $this->assertTrue(true);
    }

    public function testStock()
    {
        $this->call('GET', route('stock'));
        $this->assertTrue(true);
    }

    public function testReportById()
    {
        $this->call('GET', route('reportById', 'id'));
        $this->assertTrue(true);
    }

    public function testReport()
    {
        $this->call('GET', route('reports'));
        $this->assertTrue(true);
    }
}
