<?php

use DivineOmega\Countries\Countries;
use PHPUnit\Framework\TestCase;

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
        $this->expectExceptionMessage('Unable to retrieve MledozeCountries JSON data file. Have you ran composer update?');

        $countries = (new Countries())->all();
    }
}
