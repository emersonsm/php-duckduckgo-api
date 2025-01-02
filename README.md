# php-duckduckgo-api
Open-source library for integrating DuckDuckGo's Zero-click Info API with PHP.

## Requirements
- PHP 8.0 or higher
- Composer

You can install this package using Composer:

```
composer require emersonsm/php-duckduckgo-api
```

## Usage
To use the DuckDuckGo API in your application, instantiate the Api class and call the zeroClickQuery method. The method returns an associative array, so you can access the response using array syntax.

```php
<?php
require "vendor/autoload.php";

use DuckDuckGo\Api;

$api = new Api();
$response = $api->zeroClickQuery("What is the meaning of life?");

if (isset($response["AbstractText"])) {
    echo $response["AbstractText"];
} else {
    echo "No abstract text found.";
}
```

## Response Example
The zeroClickQuery method will return a response similar to:

> The meaning of life, or the answer to the question "What is the meaning of life?", pertains to the significance of living or existence in general. Many other related questions include "Why are we here?", "What is life all about?", or "What is the purpose of existence?" There have been a large number of proposed answers to these questions from many different cultural and ideological backgrounds. The search for life's meaning has produced much philosophical, scientific, theological, and metaphysical speculation throughout history. Different people and cultures believe different things for the answer to this question.

## Testing
To run tests, ensure PHPUnit is installed as a development dependency in composer.json. You can then execute the following command:

```
composer test
```

This will run PHPUnit and execute tests.

## Help?
For any questions or issues, please open an issue on the GitHub repository.