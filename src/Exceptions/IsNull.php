<?php

/*
 * This file is part of the Jusibe PHP library.
 *
 * (c) Prosper Otemuyiwa <prosperotemuyiwa@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Unicodeveloper\Mvrd\Exceptions;

use Exception;

class IsNull extends Exception
{
    public static function create($message)
    {
        return new static("{$message}");
    }
}