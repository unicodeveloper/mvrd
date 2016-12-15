<?php

require 'vendor/autoload.php';

use Unicodeveloper\Mvrd\Mvrd;


$obj = new Mvrd('KSF354EF');

print_r($obj->getData()[0]);