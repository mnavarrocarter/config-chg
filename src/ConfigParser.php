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

/**
 * Interface ConfigParser.
 */
interface ConfigParser
{
    /**
     * Parses configuration from a a source.
     */
    public function parse(): Config;
}
