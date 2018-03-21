<?php

use PHPUnit\Framework\TestCase;
use RapidWeb\Countries\Countries;

final class MissingDataFileTest extends TestCase
{
    private $dataFilePath = __DIR__.'/../../vendor/mledoze/countries/dist/countries.json';

    protected function setUp()
    {
        if (file_exists($this->dataFilePath)) {
            rename($this->dataFilePath, $this->dataFilePath.'_tmp');
        }
    }

    protected function tearDown()
    {
        if (file_exists($this->dataFilePath.'_tmp')) {
            rename($this->dataFilePath.'_tmp', $this->dataFilePath);
        }
    }

    public function testRetrievingAllCountriesWithNoDataFile()
    {
        $this->expectException(\Exception::class);
        $countries = (new Countries())->all();
    }
}
