<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/tests',
        __DIR__ . '/src',
    ]);

    // define sets of rules
    $rectorConfig->rules([
        Rector\TypeDeclaration\Rector\ClassMethod\ReturnTypeFromStrictNativeCallRector::class,
        Rector\TypeDeclaration\Rector\ClassMethod\ReturnTypeFromStrictScalarReturnExprRector::class,
        Rector\TypeDeclaration\Rector\ClassMethod\AddParamTypeDeclarationRector::class,
        Rector\TypeDeclaration\Rector\ClassMethod\AddParamTypeFromPropertyTypeRector::class,
        Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector::class,
        Rector\TypeDeclaration\Rector\ClassMethod\ReturnTypeFromStrictBoolReturnExprRector::class,
        Rector\TypeDeclaration\Rector\ClassMethod\ReturnTypeFromStrictConstantReturnRector::class,
        Rector\TypeDeclaration\Rector\ClassMethod\ReturnTypeFromStrictNewArrayRector::class,
        Rector\TypeDeclaration\Rector\ClassMethod\ReturnTypeFromStrictParamRector::class,
        Rector\TypeDeclaration\Rector\Class_\PropertyTypeFromStrictSetterGetterRector::class,
        Rector\TypeDeclaration\Rector\Property\TypedPropertyFromStrictConstructorRector::class,
        Rector\TypeDeclaration\Rector\Property\TypedPropertyFromStrictSetUpRector::class,
        Rector\TypeDeclaration\Rector\ClassMethod\AddMethodCallBasedStrictParamTypeRector::class,
        Rector\TypeDeclaration\Rector\ClassMethod\ParamTypeByMethodCallTypeRector::class,
    ]);
    $rectorConfig->sets([
        LevelSetList::UP_TO_PHP_83,
        Rector\Set\ValueObject\SetList::TYPE_DECLARATION,
        Rector\Doctrine\Set\DoctrineSetList::ANNOTATIONS_TO_ATTRIBUTES,
        Rector\Symfony\Set\SymfonySetList::ANNOTATIONS_TO_ATTRIBUTES,
        Rector\Symfony\Set\SensiolabsSetList::ANNOTATIONS_TO_ATTRIBUTES,
        Rector\PHPUnit\Set\PHPUnitSetList::PHPUNIT_100,
    ]);
    // use imports instead of FQN: https://github.com/rectorphp/rector/blob/main/docs/auto_import_names.md#auto-import-names
    $rectorConfig->importNames();
    // Do not import Single short classes:
    $rectorConfig->importShortClasses(false);
};
