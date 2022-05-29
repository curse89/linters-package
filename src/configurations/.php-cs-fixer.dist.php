<?php

$finder = (new PhpCsFixer\Finder())
    ->in('.')
    ->exclude(['var', 'vendor'])
;

return (new PhpCsFixer\Config())
    ->setRules([
        '@Symfony' => true,
        'concat_space' => ['spacing' => 'one'],
    ])
    ->setRiskyAllowed(false)
    ->setFinder($finder)
    ->setCacheFile('var/cache/.php-cs-fixer.cache') // forward compatibility with 3.x line
;
