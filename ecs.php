<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\Alias\NoAliasLanguageConstructCallFixer;
use PhpCsFixer\Fixer\ControlStructure\YodaStyleFixer;
use PhpCsFixer\Fixer\Import\NoUnusedImportsFixer;
use PhpCsFixer\Fixer\LanguageConstruct\GetClassToClassKeywordFixer;
use PhpCsFixer\Fixer\Operator\IncrementStyleFixer;
use PhpCsFixer\Fixer\StringNotation\SingleQuoteFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;

return ECSConfig::configure()
    // include *.php files in the root directory
    ->withRootFiles()
    ->withPaths([
        __DIR__ . '/src',
        __DIR__ . '/src/usr/sbin/vlogger',
    ])
    ->withSkip([
        __DIR__ . '/vendor',
    ])

    // add a single rule
    ->withRules([
        NoUnusedImportsFixer::class,
        SingleQuoteFixer::class,
        IncrementStyleFixer::class,
        NoAliasLanguageConstructCallFixer::class,
        GetClassToClassKeywordFixer::class,
    ])

    ->withConfiguredRule(
        IncrementStyleFixer::class,
        [
            'style' => 'post',
        ]
    )
    ->withConfiguredRule(
        YodaStyleFixer::class,
        [
            'always_move_variable' => false,
            'equal' => true,
            'identical' => true,
            'less_and_greater' => false,
        ]
    )
    // add sets - group of rules, from easiest to more complex ones
    // uncomment one, apply one, commit, PR, merge and repeat
    ->withPreparedSets(
        spaces: true,
        namespaces: true,
        docblocks: true,
        arrays: true,
        comments: true,
        psr12: true,
    )
;
