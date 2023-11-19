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

use LaravelLang\LocaleList\Locale;
use LaravelLang\NativeCurrencyNames\Data\CurrencyData;
use LaravelLang\NativeCurrencyNames\Enums\SortBy;
use LaravelLang\NativeCurrencyNames\Helpers\Arr;

/**
 * @param  string  $locale
 * @param  SortBy  $sortBy
 *
 * @return array<CurrencyData>
 */
function sourceLocale(string $locale, SortBy $sortBy = SortBy::Value): array
{
    $items = Arr::sortBy(Arr::file(__DIR__ . '/../../locales/' . $locale . '/json.json'), $sortBy);

    $result = [];

    foreach (Locale::values() as $value) {
        $result[$value] = new CurrencyData(
            locale   : $items[$value . '.locale'],
            country  : $items[$value . '.country'],
            code     : $items[$value . '.code'],
            numeric  : isset($items[$value . '.numeric']) ? (int) $items[$value . '.numeric'] : null,
            name     : $items[$value . '.name'],
            native   : $items[$value . '.native'],
            localized: $items[$value . '.localized'],
        );
    }

    return $result;
}
