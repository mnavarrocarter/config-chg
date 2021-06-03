<?php

$header = <<<EOF
@project Divido Coding Test (Config Parser)
@link https://github.com/mnavarrocarter/config-chg
@package divido/config-parser
@author Matias Navarro-Carter mnavarrocarter@gmail.com
@license Propietary
@copyright 2021 Divido
For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
EOF;

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@PhpCsFixer' => true,
        'declare_strict_types' => true,
        'header_comment' => ['header' => $header, 'comment_type' => 'PHPDoc'],
    ])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in(__DIR__.'/src')
            ->in(__DIR__.'/tests')
    )
    ;
