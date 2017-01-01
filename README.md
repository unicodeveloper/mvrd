# Mvrd library - Grab all the Nigerian Vehicles Data!!!

[![Latest Stable Version](https://poser.pugx.org/unicodeveloper/mvrd/v/stable.svg)](https://packagist.org/packages/unicodeveloper/jusibe-php-lib)
[![License](https://poser.pugx.org/unicodeveloper/mvrd/license.svg)](LICENSE.md)
![](https://img.shields.io/badge/unicodeveloper-approved-brightgreen.svg)
[![Build Status](https://img.shields.io/travis/unicodeveloper/jusibe-php-lib.svg)](https://travis-ci.org/unicodeveloper/jusibe-php-lib)
[![Coveralls](https://img.shields.io/coveralls/unicodeveloper/jusibe-php-lib/master.svg)](https://coveralls.io/github/unicodeveloper/jusibe-php-lib?branch=master)
[![Quality Score](https://img.shields.io/scrutinizer/g/unicodeveloper/jusibe-php-lib.svg?style=flat-square)](https://scrutinizer-ci.com/g/unicodeveloper/jusibe-php-lib)
[![Total Downloads](https://img.shields.io/packagist/dt/unicodeveloper/mvrd.svg?style=flat-square)](https://packagist.org/packages/unicodeveloper/jusibe-php-lib)

> Mvrd Library for PHP

Head over to [lsmvaapvs.org](http://www.lsmvaapvs.org) and input a valid Nigerian Plate Number. Your result would be like so:

![Plate Number Result](https://cloud.githubusercontent.com/assets/2946769/21285119/1e414f42-c430-11e6-98a5-7c6af945f440.png)

## Installation

[PHP](https://php.net) 5.4+ or [HHVM](http://hhvm.com) 3.3+, and [Composer](https://getcomposer.org) are required.

To get the latest version of mvrd, simply add the following line to the require block of your `composer.json` file.

```
"unicodeveloper/mvrd": "1.0.*"
```

You'll then need to run `composer install` or `composer update` to download it and have the autoloader updated.


## Usage

Available methods for use right now are:
```php

/**
 * Get Vehicle Details
 * @param  none
 * @return array
 */
$mvrd->getData();
```

### Grab the Vehicle Details

```php

<?php

// include your composer dependencies
require_once 'vendor/autoload.php';

use Unicodeveloper\Mvrd\Mvrd;

$plateNumber = 'xxxxxxxxxxxxxx';

$mvrd = new Mvrd($plateNumber);
$mvrd->getData();

```

**Response Info for Developer**

![Response](https://cloud.githubusercontent.com/assets/2946769/21230172/5e2a9d54-c2e4-11e6-9456-12b75ca39028.png)


### Grab specific Vehicle Detail

```php

<?php

// include your composer dependencies
require_once 'vendor/autoload.php';

use Unicodeveloper\Mvrd\Mvrd;

$plateNumber = 'xxxxxxxxxxxxxx'; //Use correct vehicle plate number, don't try this at home.

$mvrd = new Mvrd($plateNumber);
$mvrd->getData()['Color'];

```
Vehicle Information that can be acquired are;

 - PlateNumber
 - OwnerName
 - Color
 - Model
 - ChasisNumber
 - VehicleStatus
 - IssueDate
 - ExpiryDate

*Please note that the array keys are case sensitive and can only be used as shown above.* 

**Response Info for Developer**

![mvrd](https://cloud.githubusercontent.com/assets/15154504/21583481/20df1ee6-d083-11e6-9734-a5edd7bd8bcd.PNG)


### Grab the Vehicle Details with Wrong or Invalid Plate Number

```php

<?php

// include your composer dependencies
require_once 'vendor/autoload.php';

use Unicodeveloper\Mvrd\Mvrd;

$plateNumber = 'xxxxxxxxxxxxxx';

$mvrd = new Mvrd($plateNumber);
$mvrd->getData();

```

**Response Info for Developer**

![Check SMS Credits Response](https://cloud.githubusercontent.com/assets/2946769/21229979/bc704824-c2e3-11e6-8562-ec15fa7e2cdb.png)

## Contributing

Please feel free to fork this package and contribute by submitting a pull request to enhance the functionalities.

## How can I thank you?

Why not star the github repo? I'd love the attention! Why not share the link for this repository on Twitter or HackerNews? Spread the word!

Don't forget to [follow me on twitter](https://twitter.com/unicodeveloper)!

Thanks!
Prosper Otemuyiwa.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
