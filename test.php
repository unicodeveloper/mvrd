<?php

require 'vendor/autoload.php';

// Import Mvrd 
use Unicodeveloper\Mvrd\Mvrd;

// Instantiate Mvrd and pass a valid plate number
$obj = new Mvrd('xxxxxxx');

// Call the getData method to return an array with the following details:
// plateNumber, Owner Name, Color, Model, Chasis Number, Vehicle Status, License Issue Date and Expiry Date
print_r($obj->getData());