# alfabank-php-client

[![Latest Stable Version](https://poser.pugx.org/kostikpenzin/alfabank-api-acquiring/v/stable?format=plastic)](https://packagist.org/packages/kostikpenzin/alfabank-api-acquiring)
[![Total Downloads](https://poser.pugx.org/kostikpenzin/alfabank-api-acquiring/downloads?format=plastic)](https://packagist.org/packages/kostikpenzin/alfabank-api-acquiring)
[![Latest Unstable Version](https://poser.pugx.org/kostikpenzin/alfabank-api-acquiring/v/unstable?format=plastic)](https://packagist.org/packages/kostikpenzin/alfabank-api-acquiring)
[![License](https://poser.pugx.org/kostikpenzin/alfabank-api-acquiring/license?format=plastic)](https://packagist.org/packages/kostikpenzin/alfabank-api-acquiring)

Api client for Alfabank acquiring

## Installation

``` bash
$ composer require kostikpenzin/alfabank-api-acquiring
```

### Example
```php
<?php

include 'vendor/autoload.php';

$client = new \kostikpenzin\AlfabankApiAcquiring\Client([
    'username' => "name",
    'password' => "password"
]);

$client->register([]);

```
