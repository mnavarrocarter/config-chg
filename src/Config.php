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
 * Class Config.
 */
interface Config
{
    /**
     * Reads a configuration entry.
     *
     * The entry string can use dot notation to retrieve nested values
     * from a tree structure.
     *
     * If the entry does not exist, null is returned.
     *
     * @return null|mixed
     */
    public function read(string $entry);
}
