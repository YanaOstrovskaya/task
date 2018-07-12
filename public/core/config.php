<?php

namespace Core;

class Config
{
    public static function get()
    {
        return [
            'APP_URL' => getenv('URL', 'http://localhost'),
            'DB_HOST' => getenv('DB_HOST', '127.0.0.1'),
            'DB_NAME' => getenv('DB_NAME', 'forge'),
            'DB_USER' => getenv('DB_USER', 'root'),
            'DB_PASSWORD' => getenv('DB_PASSWORD', 'forge'),
        ];
    }
}
