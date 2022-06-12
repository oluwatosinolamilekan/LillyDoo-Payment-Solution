<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Helpers\Helper;
use Tests\BaseTestCase;

class ShowStockTest extends BaseTestCase
{
    const Row = 2;
    const Column = 10;
    public function test_it_has_negative_headers_count()
    {
        $header = ['1',2,4,5,5];
        $snackMachine = $this->loadMachine(self::Row,self::Column)['header'];
        $this->assertNotEquals($header, $snackMachine);
    }

    public function test_it_has_headers()
    {
        $rows = Helper::generateHeader(self::Column);
        $snackMachine = $this->loadMachine(self::Row,self::Column)['header'];
        $this->assertEquals($rows, $snackMachine);
    }

    public function test_if_header_is_array()
    {
        $snackMachine = $this->loadMachine(self::Row,self::Column)['header'];
        $this->assertIsArray($snackMachine);
    }

    public function test_if_data_is_array()
    {
        $snackMachine = $this->loadMachine(self::Row,self::Column)['data'];
        $this->assertIsArray($snackMachine);
    }

    public function test_count_headers()
    {
        $column = $this->loadMachine(self::Row,self::Column)['header'];
        $this->assertCount(self::Column+1, $column);
    }
}