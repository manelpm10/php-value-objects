ValueObjects
============

A PHP library of immutable objects classes. You can take a look to Wikipedia to have more information about what [value objects](https://en.wikipedia.org/wiki/Value_object) are.

Installation
------------

For install using composer you can run:

`$ composer require manelpm10/php-value-objects` 

Or add to your composer.json file:

```
{
    "require": {
        "manelpm10/php-value-objects": "~2.0"
    },
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/manelpm10/php-value-objects"
        }
    ]
}
```

How to use?
-----------

A basic usage of the Value Objects library is:

```
<?php
 
namespace Module\Book\Domain;
 
use ValueObjects\Number\Natural;
 
/**
 * Class BookId.
 */
final class BookId extends Natural
{
}

```

If you need the value of the Value Object could contain NULL values, you can implement **InterfaceNullable** for this porpouse.


```
<?php
 
namespace Module\Book\Domain;
 
use ValueObjects\String\StringLiteral;
use ValueObjects\InterfaceNullable;
 
/**
 * Class BookTitle.
 */
final class BookTitle extends StringLiteral implements InterfaceNullable
{
}

```
Contributing
------------
You can make a fork of the repo and start helping out, if you have Docker installed,
you can run the `make build` command to start the image, and `make run` to run commands inside it.

The test could also be run with the `make test` command.

License
-------

ValueObjects is released under the MIT License. See the bundled [LICENSE](/LICENSE) file for
details.

