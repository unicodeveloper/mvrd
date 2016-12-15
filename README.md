# Mvrd library - Grab all the Nigerian Vehicles Data!!!

[![Latest Stable Version](https://poser.pugx.org/unicodeveloper/jusibe-php-lib/v/stable.svg)](https://packagist.org/packages/unicodeveloper/jusibe-php-lib)
[![License](https://poser.pugx.org/unicodeveloper/jusibe-php-lib/license.svg)](LICENSE.md)
![](https://img.shields.io/badge/unicodeveloper-approved-brightgreen.svg)
[![Build Status](https://img.shields.io/travis/unicodeveloper/jusibe-php-lib.svg)](https://travis-ci.org/unicodeveloper/jusibe-php-lib)
[![Coveralls](https://img.shields.io/coveralls/unicodeveloper/jusibe-php-lib/master.svg)](https://coveralls.io/github/unicodeveloper/jusibe-php-lib?branch=master)
[![Quality Score](https://img.shields.io/scrutinizer/g/unicodeveloper/jusibe-php-lib.svg?style=flat-square)](https://scrutinizer-ci.com/g/unicodeveloper/jusibe-php-lib)
[![Total Downloads](https://img.shields.io/packagist/dt/unicodeveloper/jusibe-php-lib.svg?style=flat-square)](https://packagist.org/packages/unicodeveloper/jusibe-php-lib)

> Jusibe Library for PHP

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

### Send an SMS

```php

<?php

// include your composer dependencies
require_once 'vendor/autoload.php';

use Unicodeveloper\Mvrd\Mvrd;

$plateNumber = 'xxxxxxxxxxxxxx';

$mvrd = new Mvrd($plateNumber);
$mvrd->getData();

```

**Response**

![SendSMS Response](https://cloud.githubusercontent.com/assets/2946769/14465033/451179c4-00c9-11e6-881e-bcc92665fa7c.png)

### Check SMS Credits

```php

<?php

// include your composer dependencies
require_once 'vendor/autoload.php';

use Unicodeveloper\Jusibe\Jusibe;

$publicKey = 'xxxxxxxxxxxxxx';
$accessToken = 'xxxxxxxxxxxxxx';

$jusibe = new Jusibe($publicKey, $accessToken);

try {
   $response = $jusibe->checkAvailableCredits()->getResponse();
   print_r($response);
} catch(Exception $e) {
    echo $e->getMessage();
}

```

**Response Info for Developer**

![Check SMS Credits Response](https://cloud.githubusercontent.com/assets/2946769/14465412/d15361f8-00ca-11e6-8145-7cb8cd2b46d0.png)

### Check Delivery Status

```php

<?php

// include your composer dependencies
require_once 'vendor/autoload.php';

use Unicodeveloper\Jusibe\Jusibe;

$publicKey = 'xxxxxxxxxxxxxx';
$accessToken = 'xxxxxxxxxxxxxx';

$jusibe = new Jusibe($publicKey, $accessToken);

try {
    $response = $jusibe->checkDeliveryStatus('8nb1wrgdjw')->getResponse();
    print_r($response);
} catch(Exception $e) {
    echo $e->getMessage();
}

```

**Response Info for Developer**

![Check Delivery Status Response](https://cloud.githubusercontent.com/assets/2946769/14465686/bb61e3d2-00cb-11e6-9164-ec73665408f3.png)

## Contributing

Please feel free to fork this package and contribute by submitting a pull request to enhance the functionalities.

## How can I thank you?

Why not star the github repo? I'd love the attention! Why not share the link for this repository on Twitter or HackerNews? Spread the word!

Don't forget to [follow me on twitter](https://twitter.com/unicodeveloper)!

Thanks!
Prosper Otemuyiwa.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
