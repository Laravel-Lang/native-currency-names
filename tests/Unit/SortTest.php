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

use LaravelLang\NativeCurrencyNames\CurrencyNames;
use LaravelLang\NativeCurrencyNames\Enums\SortBy;

it('checks default sorting', function (string $locale) {
    expect(CurrencyNames::get($locale))
        ->toBeSameCount()
        ->toBeLocale($locale)
        ->not->toBeEmpty();
})->with('locales-string');

it('checks sorting by key', function (string $locale) {
    expect(CurrencyNames::get($locale, SortBy::Key))
        ->toBeSameCount()
        ->toBeLocale($locale, SortBy::Key)
        ->not->toBeEmpty();
})->with('locales-string');

it('checks sorting by value', function (string $locale) {
    expect(CurrencyNames::get($locale, SortBy::Value))
        ->toBeSameCount()
        ->toBeLocale($locale, SortBy::Value)
        ->not->toBeEmpty();
})->with('locales-string');
