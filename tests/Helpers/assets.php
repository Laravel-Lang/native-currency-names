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
use PHPUnit\Framework\Assert;

expect()->extend('toBeSameCount', function () {
    Assert::assertCount(count(Locale::values()), $this->value);

    return $this;
});

expect()->extend('toBeLocale', function (Locale|string $locale, SortBy $sortBy = SortBy::Value) {
    $values = sourceLocale($locale->value ?? $locale, $sortBy);

    Assert::assertSame(
        flatten($values),
        flatten($this->value)
    );

    return $this;
});

expect()->extend('toBeCompileLocales', function (SortBy $sortBy = SortBy::Value) {
    $result = [];

    /** @var CurrencyData $item */
    foreach ($this->value as $item) {
        $result[$item->locale] = sourceLocale($item->locale, $sortBy)[$item->locale]->native;
    }

    Assert::assertSame(
        Arr::sortBy($result, $sortBy),
        Arr::sortBy(flatten($this->value), $sortBy)
    );

    return $this;
});
