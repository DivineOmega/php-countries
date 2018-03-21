<?php

use PHPUnit\Framework\TestCase;
use RapidWeb\Countries\Countries;
use RapidWeb\Countries\Country;

final class ExceptionsTest extends TestCase
{
    public function testRetrievingAllCountriesWithNoDataFile()
    {
        $dataFilePath = __DIR__.'/../../vendor/mledoze/countries/dist/countries.json';

        if (file_exists($dataFilePath)) {
            rename($dataFilePath, $dataFilePath.'_tmp');
        }

        $this->expectException(\Exception::class);
        $countries = (new Countries())->all();

        if (file_exists($dataFilePath.'_tmp')) {
            rename($dataFilePath.'_tmp', $dataFilePath);
        }
    }

}
