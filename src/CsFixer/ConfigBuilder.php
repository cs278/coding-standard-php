<?php

namespace Cs278\CsFixer;

use Symfony\CS\Config\Config;
use Symfony\CS\FixerInterface;

/**
 * Constructs PHP-CS-Fixer Config object.
 */
final class ConfigBuilder
{
    /** @var \Traversable */
    private $finder;

    /**
     * @param \Traversable $finder
     *
     * @return $this
     */
    public function finder(\Traversable $finder)
    {
        $this->finder = $finder;

        return $this;
    }

    /**
     * @return Config
     */
    public function build()
    {
        $config = new Config('cs278', 'Chris Smith\'s personal coding standard.');
        $config->level(FixerInterface::SYMFONY_LEVEL);
        $config->fixers([
            'newline_after_open_tag',
            'ordered_use',
            'phpdoc_order',
            'short_array_syntax',
        ]);

        $config->finder($this->finder);

        return $config;
    }
}
