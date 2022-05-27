<?php

namespace Curse89\LintersPackage;

class ConfigurationsHandler
{
    public static function initConfigurations(): void
    {
        $projectDir = \mb_stristr(__DIR__, '/vendor', true);

        if ($projectDir) {
            self::copyFile(
                $projectDir . '/grumphp.yml',
                __DIR__ . '/configurations/grumphp/grumphp.yml'
            );
            self::copyFile(
                $projectDir . '/phpstan.neon',
                __DIR__ . '/configurations/phpstan/phpstan.neon'
            );
        }
    }

    protected static function copyFile(string $target, string $packageFile): void
    {
        if (!\file_exists($target)) {
            \copy($packageFile, $target);
        }
    }
}