# php7-duckduckgo
An unofficial library using the DuckDuckGo API.

## Notes

This API requires PHP v7.0 or higher.

To use the DuckDuckGo API in your application, just use a namespace, instance a class and receive an object response, as displayed in the example.

## Example

```php
<?php

use DuckDuckGo\Api;

$api = new Api();
$response = $api->zeroClickQuery("What is the meaning of life?");
echo $response->AbstractText;
```

This will reproduce:
> The meaning of life, or the answer to the question "What is the meaning of life?", pertains to the significance of living or existence in general. Many other related questions include "Why are we here?", "What is life all about?", or "What is the purpose of existence?" There have been a large number of proposed answers to these questions from many different cultural and ideological backgrounds. The search for life's meaning has produced much philosophical, scientific, theological, and metaphysical speculation throughout history. Different people and cultures believe different things for the answer to this question.

## Help?
Any help, you can use issues system.
