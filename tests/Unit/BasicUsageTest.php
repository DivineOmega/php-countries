<?php

use PHPUnit\Framework\TestCase;
use RapidWeb\Countries\Countries;
use RapidWeb\Countries\Country;

final class BasicUsageTest extends TestCase
{
    public function testGetAllCountries()
    {
        $countries = (new Countries())->all();

        $this->assertEquals(248, count($countries));

        foreach ($countries as $country) {
            $this->assertEquals(Country::class, get_class($country));
        }
    }

    public function testGetCountryByName()
    {
        $country = (new Countries())->getByName('United Kingdom');

        $this->assertEquals(Country::class, get_class($country));
        $this->assertEquals('GBR', $country->isoCodeAlpha3);
    }

    public function testGetCountryByIsoCode3Char()
    {
        $country = (new Countries())->getByIsoCode('USA');

        $this->assertEquals(Country::class, get_class($country));
        $this->assertEquals('United States', $country->name);
    }

    public function testGetCountryByIsoCode2Char()
    {
        $country = (new Countries())->getByIsoCode('US');

        $this->assertEquals(Country::class, get_class($country));
        $this->assertEquals('United States', $country->name);
    }

    public function testGetCountriesByLanguages()
    {
        $countries = (new Countries())->getByLanguage('German');

        $this->assertEquals(5, count($countries));

        foreach ($countries as $country) {
            $this->assertEquals(Country::class, get_class($country));
            $this->assertTrue(in_array('German', $country->languages));
        }
    }
}
