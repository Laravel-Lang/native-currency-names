<?php

/**
 * This file is part of the "laravel-lang/native-currency-names" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 * @copyright 2024 Laravel Lang Team
 * @license MIT
 *
 * @see https://laravel-lang.com
 */

declare(strict_types=1);

namespace LaravelLang\NativeCurrencyNames\Services;

use RuntimeException;

class Filesystem
{
    public static function load(string $path): array
    {
        if (! is_file($path)) {
            return [];
        }

        return json_decode(file_get_contents($path), true, 512, JSON_THROW_ON_ERROR);
    }

    public static function store(string $path, array $content): void
    {
        $directory = dirname($path);

        if (! is_dir($directory) && ! mkdir($directory, 0o755, true) && ! is_dir($directory)) {
            throw new RuntimeException(sprintf('Directory "%s" was not created', $directory));
        }

        if (file_put_contents($path, json_encode($content, static::flags()) . PHP_EOL) === false) {
            throw new RuntimeException(sprintf('File "%s" could not be written', $path));
        }
    }

    protected static function flags(): int
    {
        return env('PRETTY_JSON') === true
            ? JSON_UNESCAPED_UNICODE ^ JSON_UNESCAPED_SLASHES ^ JSON_PRETTY_PRINT
            : JSON_UNESCAPED_UNICODE ^ JSON_UNESCAPED_SLASHES;
    }
}
