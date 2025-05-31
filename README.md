# PHP клиент для эквайринга Альфа-Банка

[![Latest Stable Version](https://poser.pugx.org/kostikpenzin/alfabank-api-acquiring/v/stable)](https://packagist.org/packages/kostikpenzin/alfabank-api-acquiring)
[![Total Downloads](https://poser.pugx.org/kostikpenzin/alfabank-api-acquiring/downloads)](https://packagist.org/packages/kostikpenzin/alfabank-api-acquiring)
[![Latest Unstable Version](https://poser.pugx.org/kostikpenzin/alfabank-api-acquiring/v/unstable)](https://packagist.org/packages/kostikpenzin/alfabank-api-acquiring)
[![License](https://poser.pugx.org/kostikpenzin/alfabank-api-acquiring/license)](https://packagist.org/packages/kostikpenzin/alfabank-api-acquiring)
[![Monthly Downloads](https://poser.pugx.org/kostikpenzin/alfabank-api-acquiring/d/monthly)](https://packagist.org/packages/kostikpenzin/alfabank-api-acquiring)
[![PHP Version Require](https://poser.pugx.org/kostikpenzin/alfabank-api-acquiring/require/php)](https://packagist.org/packages/kostikpenzin/alfabank-api-acquiring)

Полнофункциональная PHP библиотека для интеграции с API интернет-эквайринга Альфа-Банка. Предоставляет простой и удобный интерфейс для проведения онлайн-платежей, управления заказами и работы с привязанными картами.

## Особенности

- 🚀 **Полная поддержка API** - все методы интернет-эквайринга Альфа-Банка
- 🔐 **Гибкая аутентификация** - поддержка токенов и логин/пароль
- 💳 **Привязанные карты** - полный цикл работы с сохраненными картами
- 🛡️ **Безопасность** - валидация параметров и обработка ошибок
- 📋 **PSR-совместимость** - современные стандарты PHP
- 🔧 **Простая интеграция** - минимум настроек для старта
- 📚 **Подробная документация** - примеры для всех сценариев

## Требования

- PHP 7.4 или выше
- Composer
- Расширения: `curl`, `json`, `mbstring`
- Аккаунт мерчанта в Альфа-Банке

## Установка

```bash
composer require kostikpenzin/alfabank-api-acquiring
```

## Быстрый старт

### Инициализация клиента

```php
<?php

require_once 'vendor/autoload.php';

use kostikpenzin\AlfabankApiAcquiring\Client;

// Аутентификация по токену (рекомендуется)
$client = new Client([
    'baseUrl' => 'https://alfa.rbsuat.com', // тестовая среда
    'token' => 'your-api-token'
]);

// Или аутентификация по логину/паролю
$client = new Client([
    'baseUrl' => 'https://alfa.rbsuat.com',
    'userName' => 'your-username',
    'password' => 'your-password'
]);
```

### Создание заказа

```php
$orderId = 'order_' . time();

$response = $client->register([
    'orderNumber' => $orderId,
    'amount' => 10000, // сумма в копейках (100.00 руб)
    'returnUrl' => 'https://your-site.com/payment/success',
    'failUrl' => 'https://your-site.com/payment/fail',
    'description' => 'Оплата заказа #' . $orderId,
    'language' => 'ru',
    'clientId' => 'customer_123',
    'email' => 'customer@example.com',
]);

if (isset($response['formUrl'])) {
    // Перенаправить клиента на страницу оплаты
    header('Location: ' . $response['formUrl']);
} else {
    // Обработать ошибку
    echo 'Ошибка создания заказа: ' . ($response['errorMessage'] ?? 'Unknown error');
}
```

### Проверка статуса заказа

```php
$status = $client->getOrderStatus([
    'orderId' => $response['orderId'] // ID заказа из предыдущего примера
]);

switch ($status['OrderStatus']) {
    case 0:
        echo 'Заказ зарегистрирован, но не оплачен';
        break;
    case 1:
        echo 'Предавторизованная сумма захолдирована';
        break;
    case 2:
        echo 'Проведена полная авторизация суммы заказа';
        break;
    case 3:
        echo 'Авторизация отменена';
        break;
    case 4:
        echo 'По транзакции была проведена операция возврата';
        break;
    case 5:
        echo 'Инициирована авторизация через ACS банка-эмитента';
        break;
    case 6:
        echo 'Авторизация отклонена';
        break;
}
```

## Подробная документация

### Конфигурация

#### Доступные параметры конфигурации

```php
$client = new Client([
    'baseUrl' => 'https://web.rbsuat.com', // URL API (prod: https://web.rbsuat.com)
    'token' => 'your-token',               // API токен
    'userName' => 'merchant_login',        // Логин мерчанта
    'password' => 'merchant_password',     // Пароль мерчанта
    'timeout' => 30,                       // Таймаут соединения в секундах
    'connect_timeout' => 10,               // Таймаут подключения в секундах
]);
```

#### Переменные окружения

Рекомендуется использовать переменные окружения для хранения конфиденциальных данных:

```php
$client = new Client([
    'baseUrl' => $_ENV['ALFABANK_BASE_URL'] ?? 'https://alfa.rbsuat.com',
    'token' => $_ENV['ALFABANK_TOKEN'],
]);
```

### Основные операции

#### 1. Регистрация заказа

```php
// Базовая регистрация
$response = $client->register([
    'orderNumber' => 'ORDER_001',
    'amount' => 150000, // 1500.00 руб в копейках
    'returnUrl' => 'https://shop.com/success',
    'failUrl' => 'https://shop.com/fail',
    'description' => 'Покупка товара',
]);

// Расширенная регистрация с дополнительными параметрами
$response = $client->register([
    'orderNumber' => 'ORDER_001',
    'amount' => 150000,
    'currency' => 643, // RUB
    'returnUrl' => 'https://shop.com/success',
    'failUrl' => 'https://shop.com/fail',
    'description' => 'Покупка товара',
    'language' => 'ru',
    'pageView' => 'DESKTOP',
    'clientId' => 'client_123',
    'merchantLogin' => 'sub_merchant',
    'jsonParams' => [
        'email' => 'client@example.com',
        'phone' => '+7-900-123-45-67'
    ],
    'sessionTimeoutSecs' => 1200,
    'expirationDate' => '2024-12-31T23:59:59',
    'features' => 'AUTO_PAYMENT'
]);
```

#### 2. Предавторизация

```php
$response = $client->registerPreAuth([
    'orderNumber' => 'PREAUTH_001',
    'amount' => 50000,
    'returnUrl' => 'https://shop.com/success',
    'description' => 'Предавторизация платежа'
]);

// Позже подтвердить платеж
if ($response['orderId']) {
    $depositResponse = $client->deposit([
        'orderId' => $response['orderId'],
        'amount' => 30000 // можно списать меньше
    ]);
}
```

#### 3. Расширенная информация о заказе

```php
$detailedStatus = $client->getOrderStatusExtended([
    'orderId' => 'order-uuid',
    'orderNumber' => 'ORDER_001'
]);

// Получить дополнительную информацию
echo "Номер карты: " . $detailedStatus['Pan'];
echo "Код авторизации: " . $detailedStatus['approvalCode'];
echo "Сумма к списанию: " . $detailedStatus['depositAmount'];
```

### Управление платежами

#### Отмена авторизации

```php
$response = $client->reverse([
    'orderId' => 'order-uuid'
]);

if ($response['errorCode'] === '0') {
    echo 'Авторизация успешно отменена';
}
```

#### Возврат средств

```php
// Полный возврат
$response = $client->refund([
    'orderId' => 'order-uuid',
    'amount' => 150000 // полная сумма заказа
]);

// Частичный возврат
$response = $client->refund([
    'orderId' => 'order-uuid',
    'amount' => 50000 // частичная сумма
]);
```

### Работа с привязанными картами

#### Получение списка привязанных карт

```php
$bindings = $client->getBindings([
    'clientId' => 'client_123'
]);

foreach ($bindings as $binding) {
    echo "Карта: " . $binding['pan'];
    echo "ID привязки: " . $binding['bindingId'];
    echo "Срок действия: " . $binding['expiryDate'];
}
```

#### Оплата привязанной картой

```php
// Сначала создать заказ с привязкой
$order = $client->register([
    'orderNumber' => 'BINDING_ORDER_001',
    'amount' => 75000,
    'returnUrl' => 'https://shop.com/success',
    'bindingId' => 'binding-uuid-here',
    'description' => 'Оплата сохраненной картой'
]);

// Затем провести оплату
$payment = $client->paymentOrderBinding([
    'mdOrder' => $order['orderId'],
    'bindingId' => 'binding-uuid-here',
    'ip' => $_SERVER['REMOTE_ADDR'],
    'cvc' => '123', // опционально
    'email' => 'client@example.com'
]);
```

#### Управление привязками

```php
// Отвязать карту
$client->unBindCard([
    'bindingId' => 'binding-uuid'
]);

// Продлить привязку
$client->extendBinding([
    'bindingId' => 'binding-uuid',
    'newExpiry' => 202512 // YYYYMM
]);

// Найти привязки по номеру карты
$bindings = $client->getBindingsByCardOrId([
    'pan' => 411111111111,
    'showExpired' => false
]);
```

### Дополнительные операции

#### Добавление параметров к заказу

```php
$response = $client->addParams([
    'orderId' => 'order-uuid',
    'params' => [
        'custom_field_1' => 'value1',
        'custom_field_2' => 'value2'
    ]
]);
```

#### Получение списка заказов

```php
$orders = $client->getLastOrdersForMerchants([
    'size' => 20,
    'from' => '2024-01-01T00:00:00',
    'to' => '2024-01-31T23:59:59',
    'transactionStates' => 'DEPOSITED,APPROVED',
    'merchants' => 'merchant_login'
]);
```

#### Проверка участия в 3DS

```php
$enrollment = $client->verifyEnrollment([
    'pan' => 4111111111111111
]);

if ($enrollment['enrolled'] === 'Y') {
    echo 'Карта поддерживает 3D-Secure';
}
```

## Обработка ошибок

### Базовая обработка

```php
try {
    $response = $client->register([
        'orderNumber' => 'ORDER_001',
        'amount' => 100000,
        'returnUrl' => 'https://shop.com/success'
    ]);
    
    if (isset($response['errorCode']) && $response['errorCode'] !== '0') {
        throw new Exception('API Error: ' . $response['errorMessage']);
    }
    
    // Успешная обработка
    $orderId = $response['orderId'];
    $paymentUrl = $response['formUrl'];
    
} catch (Exception $e) {
    error_log('Alfabank API Error: ' . $e->getMessage());
    // Обработка ошибки
}
```

### Коды ошибок

| Код | Описание |
|-----|----------|
| 0 | Обработка прошла без ошибок |
| 1 | Заказ с таким номером уже зарегистрирован |
| 3 | Неизвестная валюта |
| 4 | Отсутствует обязательный параметр |
| 5 | Ошибка значения параметра |
| 6 | Незарегистрированный OrderId |
| 7 | Системная ошибка |

## Тестирование

### Тестовые карты

Для тестирования используйте следующие номера карт:

| Номер карты | Результат |
|-------------|-----------|
| 4111 1111 1111 1111 | Успешная оплата |
| 4111 1111 1111 1112 | Отклонение по недостатку средств |
| 4111 1111 1111 1113 | Отклонение по другим причинам |

**Данные для тестирования:**
- CVV: любые 3 цифры
- Срок действия: любая будущая дата
- Имя держателя: любое

### Настройка тестовой среды

```php
// Конфигурация для тестирования
$testClient = new Client([
    'baseUrl' => 'https://alfa.rbsuat.com', // тестовый сервер
    'token' => 'test-token-from-alfabank',
    'timeout' => 60 // увеличенный таймаут для отладки
]);
```

## Интеграция с фреймворками

### Symfony

```php
// config/services.yaml
services:
    app.alfabank.client:
        class: kostikpenzin\AlfabankApiAcquiring\Client
        arguments:
            - baseUrl: '%env(ALFABANK_BASE_URL)%'
              token: '%env(ALFABANK_TOKEN)%'

// В контроллере
class PaymentController extends AbstractController
{
    public function __construct(
        private Client $alfabankClient
    ) {}
    
    public function createPayment(Request $request): Response
    {
        $response = $this->alfabankClient->register([
            'orderNumber' => $request->get('order_id'),
            'amount' => $request->get('amount'),
            'returnUrl' => $this->generateUrl('payment_success', [], UrlGeneratorInterface::ABSOLUTE_URL),
            'failUrl' => $this->generateUrl('payment_fail', [], UrlGeneratorInterface::ABSOLUTE_URL),
        ]);
        
        return $this->redirect($response['formUrl']);
    }
}
```

### Laravel

```php
// config/alfabank.php
return [
    'base_url' => env('ALFABANK_BASE_URL', 'https://alfa.rbsuat.com'),
    'token' => env('ALFABANK_TOKEN'),
];

// В сервис-провайдере
$this->app->singleton(Client::class, function () {
    return new Client(config('alfabank'));
});

// В контроллере
class PaymentController extends Controller
{
    public function create(Request $request, Client $alfabank)
    {
        $response = $alfabank->register([
            'orderNumber' => $request->order_id,
            'amount' => $request->amount,
            'returnUrl' => route('payment.success'),
            'failUrl' => route('payment.fail'),
        ]);
        
        return redirect($response['formUrl']);
    }
}
```

## Webhooks и уведомления

### Обработка callback-уведомлений

```php
// callback.php
$orderId = $_POST['orderId'] ?? null;

if ($orderId) {
    $status = $client->getOrderStatus(['orderId' => $orderId]);
    
    switch ($status['OrderStatus']) {
        case 2: // Оплачено
            // Обновить статус заказа в БД
            updateOrderStatus($orderId, 'paid');
            // Отправить уведомление клиенту
            sendPaymentConfirmation($status['clientId']);
            break;
            
        case 6: // Отклонено
            updateOrderStatus($orderId, 'failed');
            break;
    }
}

// Ответ банку
http_response_code(200);
echo 'OK';
```

## Безопасность

### Рекомендации по безопасности

1. **Никогда не храните токены в коде** - используйте переменные окружения
2. **Валидируйте callback-уведомления** - проверяйте подпись запросов
3. **Используйте HTTPS** - для всех взаимодействий с API
4. **Логируйте операции** - для аудита и отладки
5. **Ограничивайте доступ** - используйте IP-ограничения

### Пример безопасной конфигурации

```php
// .env
ALFABANK_BASE_URL="https://web.rbsuat.com"
ALFABANK_TOKEN="your-production-token"
ALFABANK_CALLBACK_SECRET="your-callback-secret"

// Валидация callback
function validateCallback($data, $signature) {
    $expectedSignature = hash_hmac('sha256', 
        json_encode($data), 
        $_ENV['ALFABANK_CALLBACK_SECRET']
    );
    
    return hash_equals($expectedSignature, $signature);
}
```

## Логирование и мониторинг

### Добавление логирования

```php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$logger = new Logger('alfabank');
$logger->pushHandler(new StreamHandler('logs/alfabank.log', Logger::INFO));

// При выполнении операций
$logger->info('Creating payment order', [
    'order_id' => $orderId,
    'amount' => $amount,
    'client_id' => $clientId
]);

try {
    $response = $client->register($params);
    $logger->info('Payment order created successfully', [
        'alfabank_order_id' => $response['orderId']
    ]);
} catch (Exception $e) {
    $logger->error('Failed to create payment order', [
        'error' => $e->getMessage(),
        'params' => $params
    ]);
}
```

## Поддержка и сообщество

- **Документация Альфа-Банка**: [alfabank.ru/sme/payservice/internet-acquiring/docs/](https://alfabank.ru/sme/payservice/internet-acquiring/docs/)
- **GitHub Issues**: [Сообщить о проблеме](https://github.com/kostikpenzin/alfabank-api-acquiring/issues)
- **Email**: penzin85@gmail.com

## Лицензия

Данный проект распространяется под лицензией MIT. Подробности в файле [LICENSE](LICENSE).

## Changelog

### v1.2.0
- Добавлена поддержка всех методов API
- Улучшена обработка ошибок
- Добавлены примеры интеграции с фреймворками

### v1.1.0
- Добавлена работа с привязанными картами
- Улучшена документация
- Исправлены мелкие баги

### v1.0.0
- Первый стабильный релиз
- Базовая функциональность эквайринга

---

**Создано с ❤️ для PHP-сообщества**



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
