<?php

declare(strict_types=1);

/**
 * @project Divido Coding Test (Config Parser)
 * @link https://github.com/mnavarrocarter/config-chg
 * @package divido/config-parser
 * @author Matias Navarro-Carter mnavarrocarter@gmail.com
 * @license Propietary
 * @copyright 2021 Divido
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Divido;

use PHPUnit\Framework\TestCase;

/**
 * Class ArrayConfigTest.
 *
 * @internal
 * @coversNothing
 */
class ArrayConfigTest extends TestCase
{
    public function testItCanReadUsingDotNotation(): void
    {
        $data = [
            'some' => [
                'deeply' => [
                    'nested' => 'value',
                ],
            ],
            'another' => [
                'value' => 31,
            ],
        ];

        $config = new ArrayConfig($data);
        self::assertSame('value', $config->read('some.deeply.nested'));
        self::assertSame(31, $config->read('another.value'));
        self::assertSame(['nested' => 'value'], $config->read('some.deeply'));
    }
}
