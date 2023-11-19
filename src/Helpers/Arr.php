<?php

/**
 * This file is part of the "laravel-lang/native-currency-names" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 * @copyright 2023 Laravel Lang Team
 * @license MIT
 *
 * @see https://laravel-lang.com
 */

declare(strict_types=1);

namespace LaravelLang\NativeCurrencyNames\Helpers;

use DragonCode\Support\Facades\Helpers\Arr as DragonArray;
use LaravelLang\NativeCurrencyNames\Enums\SortBy;

class Arr
{
    public static function file(string $path): array
    {
        return DragonArray::ofFile($path)->toArray();
    }

    public static function sortBy(array $array, SortBy $sortBy): array
    {
        return $sortBy === SortBy::Key ? static::ksort($array) : static::sort($array);
    }

    public static function sort(array $array): array
    {
        asort($array);

        return $array;
    }

    public static function ksort(array $array): array
    {
        ksort($array);

        return $array;
    }

    public static function renameKeys(array $array): array
    {
        return DragonArray::renameKeys($array, fn (array $item) => $item['locale']);
    }
}
