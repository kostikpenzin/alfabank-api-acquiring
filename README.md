# Api client for Alfabank acquiring

[![Latest Stable Version](https://poser.pugx.org/kostikpenzin/alfabank-api-acquiring/v/stable)](https://packagist.org/packages/kostikpenzin/alfabank-api-acquiring)
[![Total Downloads](https://poser.pugx.org/kostikpenzin/alfabank-api-acquiring/downloads)](https://packagist.org/packages/kostikpenzin/alfabank-api-acquiring)
[![Latest Unstable Version](https://poser.pugx.org/kostikpenzin/alfabank-api-acquiring/v/unstable)](https://packagist.org/packages/kostikpenzin/alfabank-api-acquiring)
[![License](https://poser.pugx.org/kostikpenzin/alfabank-api-acquiring/license)](https://packagist.org/packages/kostikpenzin/alfabank-api-acquiring)
[![Monthly Downloads](https://poser.pugx.org/kostikpenzin/alfabank-api-acquiring/d/monthly)](https://packagist.org/packages/kostikpenzin/alfabank-api-acquiring)

API connection with the payment page on the bank's side.

## Installation

```bash
$ composer require kostikpenzin/alfabank-api-acquiring
```

### Example

```php
<?php

include 'vendor/autoload.php';

$client = new \kostikpenzin\AlfabankApiAcquiring\Client([
    'baseUrl' => 'https://alfa.rbsuat.com',
    'token' => "token", // or token
    'userName' => "name", // or userName and password
    'password' => "password"
]);

$orderId = "test" . rand();

// create order for pay
// https://alfabank.ru/sme/payservice/internet-acquiring/docs/connection-options/api/rest/#zapros_registratsii_zakaza
$response = $client->register([
            'orderNumber' => $orderId,
            'amount' => 10000,
            'returnUrl' => "https://returnUrl",
            'failUrl' => "https://failUrl",
            'description' => "description order",
            'language' => "ru",
            'clientId' => rand(),
            'email' => "penzin85@gmail.com",
]);

print_r($response);
/* response:
{
    "orderId":"70906e55-7114-41d6-8332-4609dc6590f4",
    "formUrl":"https://alfa.rbsuat.com/payment/merchants/test/payment_ru.html?mdOrder=70906e55-7114-41d6-8332-4609dc6590f4"
}
*/



// check status order
// https://alfabank.ru/sme/payservice/internet-acquiring/docs/connection-options/api/rest/#zapros_sostojanija_zakaza
$response = $client->getOrderStatus([
    'orderId' => $orderId
]);
print_r($response);
/* response:
{
    "expiration":"201512",
    "cardholderName":"tr tr",
    "depositAmount": 789789,
    "currency":"810",
    "approvalCode":"123456",
    "authCode": 2,
    "clientId":"666",
    "bindingId":"07a90a5d-cc60-4d1b-a9e6-ffd15974a74f",
    "ErrorCode":"0",
    "ErrorMessage":"Успешно",
    "OrderStatus": 2,
    "OrderNumber":"23asdafaf",
    Pan":"411111**1111",
    "Amount": 789789
}
*/


```

### Test cards for check integration

https://pay.alfabank.ru/ecommerce/faq/index.html
