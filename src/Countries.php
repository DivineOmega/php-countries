<?php

namespace RapidWeb\Countries;

use RapidWeb\Countries\Country;
use RapidWeb\Countries\Interfaces\DataSourceInterface;
use RapidWeb\Countries\DataSources\MledozeCountriesJson;

class Countries
{
    public $dataSource;

    public function __construct()
    {
        $this->setDataSource(new MledozeCountriesJson);
    }

    public function setDataSource(DataSourceInterface $dataSource)
    {
        $this->dataSource = $dataSource;
    }

    public function all()
    {
        return $this->dataSource->all();
    }

    public function getByName($name)
    {
        foreach($this->all() as $country) {
            if ($country->name == $name || $country->officialName == $name) {
                return $country;
            }
        }
    }

    public function getByIsoCode($code)
    {
        foreach($this->all() as $country) {
            if ($country->isoCodeAlpha2 == $code || $country->isoCodeAlpha3 == $code || $country->isoCodeNumeric == $code) {
                return $country;
            }
        }
    }

    public function getByLanguage($language)
    {
        $countries = [];

        foreach($this->all() as $country) {
            foreach($country->languages as $countryLanguage) {
                if ($countryLanguage == $language) {
                    $countries[] = $country;
                }
            }
            foreach($country->languageCodes as $countryLanguageCode) {
                if ($countryLanguageCode == $language) {
                    $countries[] = $country;
                }
            }
        }

        return $countries;
    }
}