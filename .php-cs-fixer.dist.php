<?php

$finder = PhpCsFixer\Finder::create()->in([
    './src',
    './tests',
]);

return (new PhpCsFixer\Config())
    ->setFinder($finder)
    ->setCacheFile('var/cache/.php_cs.cache')
    ->setRules([
        '@PSR1' => true,
        '@PSR12' => true,
        '@PhpCsFixer' => true,
    ]);