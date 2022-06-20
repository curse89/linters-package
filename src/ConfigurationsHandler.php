<?php

namespace Curse89\LintersPackage;

class ConfigurationsHandler
{
    public static function initConfigurations(): void
    {
        $projectDir = \mb_stristr(__DIR__, '/vendor', true);

        if ($projectDir) {
            self::copyFile(
                $projectDir . '/.php-cs-fixer.dist.php',
                __DIR__ . '/configurations/.php-cs-fixer.dist.php'
            );
            self::copyFile(
                $projectDir . '/phpcs.xml.dist',
                __DIR__ . '/configurations/phpcs.xml.dist'
            );
            self::copyFile(
                $projectDir . '/phpmd.xml.dist',
                __DIR__ . '/configurations/phpmd.xml.dist'
            );
            self::copyFile(
                $projectDir . '/grumphp.yml',
                __DIR__ . '/configurations/grumphp/grumphp.yml'
            );
            self::copyFile(
                $projectDir . '/rector.php',
                __DIR__ . '/configurations/rector.php'
            );
            self::copyFile(
                $projectDir . '/phpstan.neon',
                __DIR__ . '/configurations/phpstan/phpstan.neon'
            );
            self::copyFile(
                $projectDir . '/tests/bootstrap.php',
                __DIR__ . '/configurations/phpstan/bootstrap.php'
            );
            self::copyFile(
                $projectDir . '/tests/console-application.php',
                __DIR__ . '/configurations/phpstan/console-application.php'
            );
            self::copyFile(
                $projectDir . '/tests/object-manager.php',
                __DIR__ . '/configurations/phpstan/object-manager.php'
            );
        }
    }

    protected static function copyFile(string $target, string $packageFile): void
    {
        \copy($packageFile, $target);
    }
}