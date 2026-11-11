<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Configuration\Parameter\SimpleParameterProvider;
use Rector\Configuration\Option;

SimpleParameterProvider::addParameter(Option::FILES_WITHOUT_EXTENSION, __DIR__ . '/src/usr/sbin/vlogger');

return RectorConfig::configure()
    ->withRootFiles()
    ->withPaths([
        __DIR__ . '/src',
    ])
    ->withSkip([
        __DIR__ . '/vendor',
    ])
    // règles de migration syntaxique jusqu'à PHP 8.2 inclus
    ->withPhpSets(php82: true)
    // optionnel : sets de qualité
    ->withPreparedSets(
        deadCode: true,
        codeQuality: true,
        typeDeclarations: true,
    );
