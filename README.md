# DaData Client


Почему стоит использовать этот клиент?

| Характеристики                             | vanta/dadata | Другой клиент |
|--------------------------------------------|--------------|---------------|
| PSR-18                                     | ✅            | ❌             |
| Детальное описание схемы (DTO, Vo)         | ✅            | ❌             |
| Расширяемость                              | ✅            | ❌             |
| Возможность использовать коробочную DaData | ✅            | ❌             |


Минимальная версия PHP: 7.4


Запустите команду ```composer require vanta/dadata```
Обязательно установить psr совместимый клиент.


Пример использования:

```php
<?php

declare(strict_types=1);

use GuzzleHttp\Psr7\HttpFactory;
use Symfony\Component\HttpClient\CurlHttpClient;
use Symfony\Component\HttpClient\Psr18Client;
use Vanta\Integration\DaData\RestClientBuilder;

$results = RestClientBuilder::create(new Psr18Client(new CurlHttpClient(), new HttpFactory, new HttpFactory) ,'<Ваш ключ>', '<Ваш секрет>')
    ->createSuggestAddressClient()
    ->findByText( '630039')
;
```



TODO:
 - Тесты
 - Описать остальные методы