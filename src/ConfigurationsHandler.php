<?php

namespace Curse89\LintersPackage;

class ConfigurationsHandler
{
    public static function initConfigurations(): void
    {
        self::copyFile(
            'grumphp.yml',
            \dirname(__DIR__) . '/configurations/grumphp/grumphp.yml'
        );
        self::copyFile(
            'phpstan.neon',
            \dirname(__DIR__) . '/configurations/phpstan/phpstan.neon'
        );
    }

    protected static function copyFile(string $target, string $packageFile): void
    {
        if (!\file_exists($target)) {
            \copy($packageFile, $target);
        }
    }
}