<?php

require_once __DIR__.'/../vendor/autoload.php';

use RapidWeb\Countries\Countries;

$countries = new Countries;

var_dump($countries->all());

var_dump($countries->getByName('United Kingdom'));

var_dump($countries->getByIsoCode('USA'));

var_dump($countries->getByLanguage('German'));

foreach($countries->all() as $country) {
    var_dump($country->name.' - '.$country->officialName);
}