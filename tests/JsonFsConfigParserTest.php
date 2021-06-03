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
 * Class JsonFsConfigParserTest.
 *
 * @internal
 * @coversNothing
 */
class JsonFsConfigParserTest extends TestCase
{
    public function testItParsesJsonFiles(): void
    {
        $parser = new JsonFsConfigParser(
            __DIR__.'/../fixtures/config.invalid.json',
            __DIR__.'/../fixtures/config.also_invalid.json',
            __DIR__.'/../fixtures/config.local.json',
            __DIR__.'/../fixtures/config.json',
        );

        $config = $parser->parse();
        self::assertSame('production', $config->read('environment'));
        self::assertSame('mysql', $config->read('database.host'));
        self::assertSame('redis', $config->read('cache.redis.host'));
    }
}
