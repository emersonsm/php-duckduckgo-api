<?php

use DuckDuckGo\Api;
use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase
{
    private $api;

    protected function setUp(): void
    {
        $this->api = new Api();
    }

    public function testZeroClickQuery()
    {
        $query = "What is the meaning of life?";
        $response = $this->api->zeroClickQuery($query);

        $this->assertNotNull($response);
        $this->assertArrayHasKey("AbstractText", (array) $response);
        $this->assertStringContainsString("The meaning of life", $response["AbstractText"]);
    }
}
