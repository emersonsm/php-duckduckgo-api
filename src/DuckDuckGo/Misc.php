<?php

namespace DuckDuckGo;

class Misc
{
    /**
     * Path of config.php file
     * 
     * @var string
     */
    private string $configPath;

    /**
     * DuckDuckGo Misc constructor.
     */
    public function __construct()
    {
        $this->configPath = realpath(__DIR__ . "/../../config/Config.php") ?: "";
    }

    /**
     * Retrieve information of config.php file based on key parameter.
     * 
     * @param string $key
     * @return string|bool
     */
    public function getConfig($key): string|bool
    {
        if (!file_exists($this->configPath)) {
            return false;
        }

        $config = require($this->configPath);

        return $config[$key] ?? false;
    }
}