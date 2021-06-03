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
 * Class JsonFsConfigParser allows to specify multiple json files to create a
 * Config instance. Each new json file overrides potential values from the previous
 * json file. Invalid json files are completely ignored and silently skipped.
 */
final class JsonFsConfigParser implements ConfigParser
{
    /**
     * @var string[]
     */
    private array $files;

    /**
     * JsonFsConfigParser constructor.
     *
     * @param string ...$files
     */
    public function __construct(string ...$files)
    {
        $this->files = $files;
    }

    /**
     * {@inheritDoc}
     */
    public function parse(): Config
    {
        $config = [];
        foreach ($this->files as $file) {
            try {
                $config[] = json_decode(file_get_contents($file), true, 512, JSON_THROW_ON_ERROR);
            } catch (\JsonException $e) {
                continue;
            }
        }

        $config = array_merge(...$config);

        return new ArrayConfig($config);
    }
}
