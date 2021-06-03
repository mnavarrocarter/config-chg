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
 * Class ArrayConfig.
 */
final class ArrayConfig implements Config
{
    private array $config;

    /**
     * ArrayConfig constructor.
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * {@inheritDoc}
     */
    public function read(string $entry)
    {
        $data = $this->config;
        if ('' === $entry) {
            return $data;
        }

        if (array_key_exists($entry, $data)) {
            return $data[$entry];
        }

        if (false === strpos($entry, '.')) {
            return null;
        }

        foreach (explode('.', $entry) as $segment) {
            if (!is_array($data) || !array_key_exists($segment, $data)) {
                return null;
            }
            $data = &$data[$segment];
        }

        return $data;
    }
}
