# PHP Enum

> This package provides you a class named Enum. It is designed to help you to structure
> your Enum classes easily and get rid of the most boilerplate code.

## Usage

### Installation

Install via composer:

```
composer require codebot/phpenum
```

### How to use

All your Enum classes should extend the abstract `Enum` class.
All constants in your class, which extends `Enum`, will be converted to enum options.

```php
<?php

namespace App;

use Enum\Enum;

class Status extends Enum
{
    const ACTIVE   = 'active';
    const INACTIVE = 'inactive';
    const BLOCKED  = 'blocked';
}

$status = new Status();

$status->toArray(); // will return [ 'active' => 'active', 'inactive' => 'inactive', 'blocked' => 'blocked' ]
$status->hasValue('active'); // will return boolean
$status->hasKey('blocked'); // will return boolean
```