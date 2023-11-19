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

namespace LaravelLang\NativeCurrencyNames;

use BackedEnum;
use LaravelLang\LocaleList\Locale;
use LaravelLang\NativeCurrencyNames\Data\CurrencyData;
use LaravelLang\NativeCurrencyNames\Enums\SortBy;
use LaravelLang\NativeCurrencyNames\Helpers\Arr;
use LaravelLang\NativeCurrencyNames\Helpers\Path;

class Native
{
    protected static string $default = '_native';

    public static function get(BackedEnum|string|null $locale = null, SortBy $sortBy = SortBy::Value): array
    {
        if ($locale = static::locale($locale)) {
            return static::map(
                static::forLocale($locale, $sortBy)
            );
        }

        return static::map(
            static::forLocale(static::$default, $sortBy)
        );
    }

    protected static function forLocale(string $locale, SortBy $sortBy): array
    {
        return Arr::sortBy(static::load(static::path($locale)), $sortBy);
    }

    protected static function map(array $items): array
    {
        return array_map(fn (string $locale) => new CurrencyData(
            locale   : $items[$locale . '.locale'],
            country  : $items[$locale . '.country'],
            code     : $items[$locale . '.code'],
            numeric  : isset($items[$locale . '.numeric']) ? (int) $items[$locale . '.numeric'] : null,
            name     : $items[$locale . '.name'],
            native   : $items[$locale . '.native'],
            localized: $items[$locale . '.localized'],
        ), Locale::onlyValues());
    }

    protected static function load(string $path): array
    {
        return Arr::file($path);
    }

    protected static function path(string $locale): bool|string
    {
        return Path::resolve($locale) ?: Path::resolve(static::$default);
    }

    protected static function locale(BackedEnum|string|null $locale): ?string
    {
        if (empty($locale)) {
            return null;
        }

        if ($locale instanceof BackedEnum) {
            $locale = $locale->value;
        }

        return Path::exists((string) $locale) ? $locale : null;
    }
}
